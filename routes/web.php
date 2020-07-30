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
});

Route::get('/', 'HomeController@index')->name('homepage');
Route::get('/shop', 'Client\ShopController@index')->name('client_shop');
Route::get('/blogs', 'Client\BlogController@index')->name('client_blogs');
Route::get('/blogs/{id}', 'Client\BlogController@show')->name('client_blog_detail');
Route::get('/contact', 'Client\ContactController@index')->name('client_contact_form');

