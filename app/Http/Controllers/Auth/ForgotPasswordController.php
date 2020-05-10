<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Seo;
use App\Category;
use App\Config;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;


    
    public function configs()
    {
        $configs = Config::all();
        $c = [];
        foreach ($configs as $config) {
            $c[$config->name] = $config->value;
        }
        return $c;
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

    public function passwordReset()
    {
        $seo = Seo::where('url', '/password/reset')->first();
        $categories = Category::where('active', true)->get();
        return view('auth.passwords.email', [
            'seo' => $seo,
            'categories' => $categories,
            'configs' => $this->configs(),
            'cart' => $this->getCart()
        ]);
    }
}
