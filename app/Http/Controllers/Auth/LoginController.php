<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Seo;
use App\Category;
use App\Config;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
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

    public function configs () {
        $configs = Config::all();
        $c=[];
        foreach ($configs as $config) {
            $c[$config->name] = $config->value;
        }
        
        return $c;
    }

    public function showLoginForm()
    {
        $seo = Seo::where('url', '/iniciar-sesion')->first();
        $categories = Category::where('active', true)->get();
        return view('auth.login', [
            'seo' => $seo,
            'categories' => $categories,
            'configs' => $this->configs(),
            'cart' => $this->getCart()
            ]);
    }
    
}
