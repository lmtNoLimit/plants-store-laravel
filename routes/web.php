<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::prefix('/admin')->middleware('auth', 'is_admin')->group(function() {
    Route::get('/', function() {
        return Redirect::to('/admin/dashboard');
    });
    Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::resource('customers', 'CustomerController');
    Route::resource('products', 'ProductController');
    Route::resource('categories', 'CategoryController');
    Route::resource('orders', 'OrderController');
    Route::resource('blogs', 'BlogController');
    Route::resource('contacts', 'ContactController')->only([
        'index', 'destroy'
    ]);
});

Route::get('/', 'HomeController@index')->name('homepage');
Route::get('/shop', 'Client\ShopController@index')->name('client_shop');
Route::get('/products/{id}', 'Client\ShopController@show')->name('client_product_detail');
Route::get('/blogs', 'Client\BlogController@index')->name('client_blogs');
Route::get('/blogs/{id}', 'Client\BlogController@show')->name('client_blog_detail');
Route::get('/contact', 'Client\ContactController@index')->name('client_contact_form');
Route::post('/contact', 'ContactController@store');

Route::get('/cart', 'Client\CartController@index')->name('client_cart')->middleware('auth');
Route::post('/addToCart/{productId}', 'Client\CartController@addToCart')
    ->name('client_add_to_cart')
    ->middleware('auth');
Route::put('/cart', 'Client\CartController@updateCart')->middleware('auth');
Route::delete('/cart/{productId}', 'Client\CartController@removeItemFromCart')->middleware('auth');

