<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Freshwork\ChileanBundle\Rut;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Seo;
use App\Cms;
use App\Category;
use App\ProductMain;
use App\Config;
use App\Product;
use App\User;
use App\Payment;
use App\Order;
use App\OrderProduct;
use App\OrderHistory;
use App\Zone;

class WebController extends Controller
{
  /* Generales */
  public function configs()
  {
    $configs = Config::all();
    $c = [];
    foreach ($configs as $config) {
      $c[$config->name] = $config->value;
    }
    return $c;
  }
  /* Generales */

  public function index()
  {
    $seo = Seo::where('url', '/')->first();
    $categories = Category::where('active', true)->orderBy('name', 'asc')->get();
    return view('home', [
      'seo' => $seo,
      'categories' => $categories,
      'configs' => $this->configs(),
      'cart' => $this->getCart()
    ]);
  }

  public function shop(Request $request)
  {
    $seo = Seo::where('url', '/tienda')->first();
    $items  = ProductMain::with('images')->orderBy('name')->paginate(12);
    if (isset($request->orderBy)) {
      $order = explode(':', $request['orderBy']);
      $items  = ProductMain::with('images')->orderBy($order[0], $order[1])
        ->paginate(12);
    }
    if (isset($request->search)) {
      $items  = ProductMain::with('images')->where('name', 'like', "%$request->search%")
        ->orWhere('description', 'like', "%$request->search%")
        ->paginate(12);
    }
    $categories = Category::where('active', true)
      ->orderBy('name', 'asc')
      ->get();

    return view('shop.index', [
      'seo' => $seo,
      'categories' => $categories,
      'products' => $items,
      'configs' => $this->configs(),
      'cart' => $this->getCart()
    ]);
  }

  public function shopCategory($url)
  {
    $seo = Category::where('url', $url)->first();
    $items  = Category::find($seo['id'])->productMain()->orderBy('name', 'asc')->paginate(12);
    $categories = Category::where('active', true)->orderBy('name', 'asc')->get();
    return view('shop.category', [
      'seo' => $seo,
      'categories' => $categories,
      'products' => $items,
      'configs' => $this->configs(),
      'cart' => $this->getCart()

    ]);
  }

  public function shopProduct($url)
  {
    $categories = Category::where('active', true)->orderBy('name', 'asc')->get();
    $seo = ProductMain::with(['categories', 'images'])->where('url', $url)->first();
    $products = Product::with('features')->where('product_main_id', $seo['id'])->get();
    $relateds = [];
    if ($seo['categories'][0]['id'] > 0) {
      $relateds = Category::find($seo['categories'][0]['id'])->productMain()->with('images')->orderBy('name', 'asc')->get();
    }
    return view('shop.product', [
      'configs' => $this->configs(),
      'seo' => $seo,
      'categories' => $categories,
      'products' => $products,
      'relateds' => $relateds,
      'cart' => $this->getCart()
    ]);
  }

  public function addCart(Request $request)
  {
    $cart = (session('cart')) ? session('cart') : [];
    $product = Product::find($request->id);
    $cart[] = [
      'id' => $product['id'],
      'name' => $product['name'],
      'price' => ($product['sale']) ? $product['price_sale'] : $product['price'],
      'sale' => $product['sale'],
      'old' => $product['price'],
      'quantity' => $request->quantity
    ];
    session(['cart' => $cart]);
    return back()->with('status', 'Producto agregado al carro');
  }

  public function updateCart(Request $request)
  {
    $cart = (session('cart')) ? session('cart') : [];
    $cantidades = $request->quantity;
    foreach ($cantidades as $key => $cantidad) {
      $cart[$key]['quantity'] = $cantidad;
    }
    session(['cart' => $cart]);
    return redirect()->route('cart')->with('status', 'Carro actualizado');
  }
  public function deleteCart($i)
  {
    $cart = session('cart');
    array_splice($cart, $i, 1);
    session(['cart' => $cart]);
    return back()->withInput();
  }

  public function cart(Request $request)
  {
    $seo = Seo::where('url', '/carro-de-compra')->first();
    $categories = Category::where('active', true)->orderBy('name', 'asc')->get();

    return view('checkout.cart', [
      'seo' => $seo,
      'categories' => $categories,
      'configs' => $this->configs(),
      'cart' => $this->getCart()
    ]);
  }

  public function checkout()
  {
    $seo = Seo::where('url', '/proceso-de-compra')->first();
    $categories = Category::where('active', true)->orderBy('name', 'asc')->get();
    $payments = Payment::where('status', true)->orderBy('name', 'asc')->get();
    $zones = Zone::where('status', true)->orderBy('name', 'asc')->get();

    return view('checkout.index', [
      'seo' => $seo,
      'categories' => $categories,
      'configs' => $this->configs(),
      'cart' => $this->getCart(),
      'payments' => $payments,
      'zones' => $zones
    ]);
  }

  public function success($code)
  {
    $seo = Seo::where('url', '/gracias-por-su-compra')->first();
    $categories = Category::where('active', true)->orderBy('name', 'asc')->get();
    $order = Order::with(['products', 'user', 'status', 'zone', 'payment'])->where('code_uniq', $code)->first();
    return view('checkout.success', [
      'seo' => $seo,
      'categories' => $categories,
      'configs' => $this->configs(),
      'cart' => $this->getCart(),
      'order' => $order
    ]);
  }

  public function account()
  {
    $seo = Seo::where('url', '/mi-cuenta')->first();
    $categories = Category::where('active', true)->orderBy('name', 'asc')->get();
    $user = Auth::user();
    return view('account.index', [
      'seo' => $seo,
      'categories' => $categories,
      'configs' => $this->configs(),
      'cart' => $this->getCart(),
      'user' => $user
    ]);
  }

  public function accountPass()
  {
    $seo = Seo::where('url', '/mi-cuenta/pedidos')->first();
    $categories = Category::where('active', true)->orderBy('name', 'asc')->get();
    $user = Auth::user();
    return view('account.pass', [
      'seo' => $seo,
      'categories' => $categories,
      'configs' => $this->configs(),
      'cart' => $this->getCart(),
      'user' => $user
    ]);
  }

  public function accountOrders()
  {
    $user = Auth::user();
    $seo = Seo::where('url', '/mi-cuenta/pedidos')->first();
    $categories = Category::where('active', true)->orderBy('name', 'asc')->get();
    $orders = Order::where('id_user', $user->id)->get();
    return view('account.orders', [
      'seo' => $seo,
      'categories' => $categories,
      'configs' => $this->configs(),
      'cart' => $this->getCart(),
      'orders' => $orders
    ]);
  }

  public function contactUs()
  {
    $seo = Seo::where('url', '/contacto')->first();
    $categories = Category::where('active', true)->orderBy('name', 'asc')->get();
    return view('contact', [
      'seo' => $seo,
      'categories' => $categories,
      'configs' => $this->configs(),
      'cart' => $this->getCart()
    ]);
  }

  public function createOrder(Request $req)
  {
    // Validar si usuario esta logueado
    $configs = $this->configs();
    $user = Auth::user();
    $validator = Validator::make(
      $req->all(),
      [
        'name' => (!$user) ? 'required|min:5|max:255' : '',
        'rut' => 'required|cl_rut',
        'email' => (!$user) ? 'required|email:rfc,dns|unique:users' : '',
        'phone' => (!$user) ? 'required|max:14' : '',
        'shipping_name' => (intval($req->shipping_type) === 1) ? 'required|min:5|max:255' : '',
        'shipping_address' => (intval($req->shipping_type) === 1) ? 'required|min:5|max:255' : '',
        'shipping_zone' => (intval($req->shipping_type) === 1) ? 'required' : ''
      ],
      [
        'name.required' => 'El nombre es obligatorio',
        'name.min' => 'Minimo 5 caracteres',
        'name.max' => 'Maximo 255 caracteres',
        'rut.cl_rut' => 'Rut no valido',
        'rut.required' => 'Rut es requerido',
        'email.required' => 'El email es obligatorio',
        'email.email' => 'Debe tener format email',
        'phone.required' => 'El telefono es obligatorio',
        'phone.max' => 'Minimo 14 caracteres',
        'shipping_name.required' => 'El nombre que recibe es obligatorio',
        'shipping_name.min' => 'Minimo 5 caracteres',
        'shipping_name.max' => 'Maximo 255 caracteres',
        'shipping_address.required' => 'La dirección es obligatorio',
        'shipping_address.min' => 'Minimo 5 caracteres',
        'shipping_address.max' => 'Maximo 255 caracteres',
        'shipping_zone.required' => 'La comuna es obligatoria'
      ]
    );
    if ($validator->fails()) {
      return redirect()->route('checkout')
        ->withErrors($validator)
        ->withInput();
    }

    $cart = $this->getCart();
    $shipping = 0;
    $code_uniq = Str::uuid();
    // Create Order
    $zone = Zone::find($req->shipping_zone);
    $order = new Order();
    $order->id_user = $user['id'];
    $order->id_order_status = 1;
    $order->id_zone = (intval($req->shipping_type) === 1) ? $req->shipping_zone : 0;
    $order->id_payment = $req->payment_method;
    $order->name = $req->name;
    $order->email = $req->email;
    $order->method = $req->shipping_type;
    $order->shipping_name = $req->shipping_name;
    $order->shipping_address = $req->shipping_address;
    $order->shipping_info = $req->shipping_info;
    $order->billing = false;
    $order->phone = $req->phone;
    $order->total_pay = $cart['total'] + $shipping;
    $order->total_shipping = (intval($req->shipping_type) === 1 && (intval($cart['total']) < intval($configs['MAX_BUY']))) ? $zone['price'] : 0;
    $order->code_uniq = $code_uniq;
    $order->pay = false;
    $order->save();

    // Create Order product
    foreach ($cart['products'] as $product) {
      $orderProduct = new OrderProduct();
      $orderProduct->id_order = $order->id;
      $orderProduct->id_product = $product['id'];
      $orderProduct->name = $product['name'];
      $orderProduct->value = $product['price'];
      $orderProduct->quantity = $product['quantity'];
      $orderProduct->save();
    }

    $orderHistory = new OrderHistory();
    $orderHistory->id_order_status = 1;
    $orderHistory->id_order = $order->id;
    $orderHistory->message = 'Pedido en pago pendiente';
    $orderHistory->notify = 1;
    $orderHistory->save();

    // Enviar correo


    // Al final crear el usuario
    // $validarRut = Rut::parse($rutFormat)->isValid();
    // Redireccionar segun medios de pago
    if (intval($req->payment_method) === 1) {
      return redirect()->route('success', ['code' => $code_uniq]);
    }
    // return view('cart');
  }

  public function cms($id)
  {
    $seo = Cms::where('url', $id)->first();
    $categories = Category::where('active', true)->orderBy('name', 'asc')->get();
    if ($seo) {
      return view('cms', [
        'seo' => $seo,
        'categories' => $categories,
        'configs' => $this->configs(),
        'cart' => $this->getCart()

      ]);
    }
    return view(404, [
      'seo' => $seo,
      'categories' => $categories,
      'configs' => $this->configs(),
      'cart' => $this->getCart()
    ]);
  }

  public function getCart()
  {
    $cart = (session('cart')) ? session('cart') : [];
    $total = 0;
    foreach ($cart as $product) {
      $total += intval($product['quantity']) * intval($product['price']);
    }
    return [
      'products' => $cart,
      'total' => $total
    ];
  }

  public function updateAccount(Request $req)
  {
    $user = Auth::user();
    $validator = Validator::make(
      $req->all(),
      [
        'name' => 'required|min:5|max:255',
        'rut' => 'required|cl_rut',
        'email' => ($req->email !== $user->email) ? 'required|email:rfc,dns|unique:users' : '',
        'phone' => 'required|max:14'
      ],
      [
        'name.required' => 'El nombre es obligatorio',
        'name.min' => 'Minimo 5 caracteres',
        'name.max' => 'Maximo 255 caracteres',
        'rut.cl_rut' => 'Rut no valido',
        'rut.required' => 'Rut es requerido',
        'email.required' => 'El email es obligatorio',
        'email.email' => 'Debe tener format email',
        'phone.required' => 'El telefono es obligatorio',
        'phone.max' => 'Minimo 14 caracteres'
      ]
    );
    if ($validator->fails()) {
      return redirect()->route('account')
        ->withErrors($validator)
        ->withInput();
    }

    $user = User::find($user->id);
    $user->name = $req->name;
    $user->email = $req->email;
    $user->rut = Rut::parse(Rut::parse($req->rut)->format())->number();
    $user->phone = $req->phone;
    $user->save();
    return redirect()->route('account')->with('status', 'Actualizado');
  }

  public function updatePass(Request $req)
  {
    $user = Auth::user();
    $validator = Validator::make(
      $req->all(),
      [
        'password' => 'password:web',
        'pass_new' => 'required|in:' . $req->pass_new2,
        'pass_new2' => 'required'
      ],
      [
        'password.password' => 'La contraseña no es correcta',
        'pass_new.required' => 'La nueva contraseña es obligatoria',
        'pass_new.in' => 'Las contraseñas deben ser iguales',
        'pass_new2.required' => 'La nueva contraseña es obligatoria'
      ]
    );
    if ($validator->fails()) {
      return redirect()->route('account-pass')
        ->withErrors($validator)
        ->withInput();
    }
    $user = User::find($user->id);
    $user->password = bcrypt($req->pass_new);
    $user->save();
    return redirect()->route('account-pass')->with('status', 'Actualizado');
  }
}
