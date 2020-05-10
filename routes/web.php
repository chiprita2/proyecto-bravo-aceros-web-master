<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\Test;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* Routes Auth */

Route::get('iniciar-sesion', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('iniciar-sesion', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('registro', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('registro', 'Auth\RegisterController@register');

/* Routes Password Reset */
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('password/reset', 'Auth\ForgotPasswordController@passwordReset')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/* Inicio */
Route::get('/', 'WebController@index')->name('home');

/* Tienda */
Route::get('/tienda', 'WebController@shop')->name('shop');
Route::get('/tienda/{url?}', 'WebController@shopCategory')->name('shop-category');
Route::get('/proveedores-de-acero/{url?}', 'WebController@shopProduct')->name('shop-product');

/* Proceso de compra */
Route::post('/agregar-al-carro', 'WebController@addCart')->name('add-cart');
Route::post('/actualizar-carro', 'WebController@updateCart')->name('update-cart');
Route::get('/eliminar-producto/{i?}', 'WebController@deleteCart')->name('delete-cart');
Route::get('/carro-de-compra', 'WebController@cart')->name('cart');
Route::get('/proceso-de-compra', 'WebController@checkout')->name('checkout');
Route::post('/proceso-de-compra', 'WebController@createOrder')->name('create-order');
Route::get('/gracias-por-su-compra/{code?}', 'WebController@success')->name('success');

/* Mi cuenta */
Route::get('/mi-cuenta', 'WebController@account')->name('account')->middleware('auth');
Route::get('/mi-cuenta/contrasena', 'WebController@accountPass')->name('account-pass')->middleware('auth');
Route::get('/mi-cuenta/pedidos', 'WebController@accountOrders')->name('account-orders')->middleware('auth');
Route::get('/mi-cuenta/personal', 'WebController@accountPersonal')->name('account-personal')->middleware('auth');
Route::post('/mi-cuenta', 'WebController@updateAccount')->name('update-user')->middleware('auth');
Route::post('/mi-cuenta/contrasena', 'WebController@updatePass')->name('update-pass')->middleware('auth');

/*Excel*/
Route::get('/prueba-2', 'Api\StockMovementController@export');
Route::get('/prueba-3', 'Api\StockController@export');
Route::get('/prueba-4', 'Api\StockMovementController@prueba');
Route::get('/prueba-5', 'Api\StockController@prueba');
Route::post('/price/import', 'Api\ProductController@import');
Route::get('/menu', 'Api\ProductController@menu');

/* Otras */
Route::get('/contacto', 'WebController@contactUs')->name('contact-us');
Route::get('/prueba', function () {
  Mail::to('hola@gabrielvargas.dev')->send(new Test());
});
Route::get('/{id?}', 'WebController@cms')->name('cms');

Route::fallback(function () {
  return view('404');
});
