<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// estas rutas se pueden acceder sin proveer de un token válido.
// estas rutas requiren de un token válido para poder accederse.
Route::group(['prefix' => 'v1'], function () {
  Route::get('/search-product/{search}', 'Api\ProductController@searchInsertStock');
  Route::post('/login', 'AuthController@login');
  Route::post('/register', 'AuthController@register');
  Route::post('/product-main/insert-category/{id}', 'Api\ProductMainController@addCategories');
  Route::post('/product-main/insert-image/{id}', 'Api\ProductMainController@addImage');
  Route::post('/product/{id}/addFeature', 'Api\ProductController@addFeature');
  Route::post('/product/{id}/updateFeature', 'Api\ProductController@updateFeature');
  Route::delete('/deleteImage/{id}', 'Api\ProductMainController@deleteImage');
  Route::get('/logout', 'AuthController@logout')->middleware('auth:api');
  Route::get('/admin-login', 'AuthController@user')->middleware('auth:api');
  Route::resources([
    'category' => 'Api\CategoryController',
    'cms' => 'Api\CMSController',
    'config' => 'Api\ConfigController',
    'feature' => 'Api\FeatureController',
    'order-billing' => 'Api\OrderBillingController',
    'order' => 'Api\OrderController',
    'order-status' => 'Api\OrderStatusController',
    'product' => 'Api\ProductController',
    'product-main' => 'Api\ProductMainController',
    'provider' => 'Api\ProviderController',
    'seo' => 'Api\SeoController',
    'stock' => 'Api\StockController',
    'stock-movement' => 'Api\StockMovementController',
    'store' => 'Api\StoreController',
    'user' => 'Api\UserController',
    'zone' => 'Api\ZoneController',
    'admin' => 'Api\AdminController'
  ]);
});
