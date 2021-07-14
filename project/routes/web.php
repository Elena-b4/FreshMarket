<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'ProductsController@index')->name('products.index');
Route::get('/products', 'ProductsController@products')->name('products.products');
Route::get('/product-cart', 'ProductsController@productCart')->name('products.cart');
Route::get('/product-checkout', 'ProductsController@checkout')->name('products.checkout');
Route::get('/products/{product}', 'ProductsController@productShow')->name('products.show');
Route::get('/search', 'ProductsController@search')->name('search');
Route::get('/add-to-cart/{id}', 'ProductsController@addToCart')->name('products.add');
Route::post('/update-cart/{id}', 'ProductsController@updateCart')->name('products.update');
Route::delete('/remove-from-cart/{id}', 'ProductsController@deleteFromCart')->name('products.remove');


Route::get('/user-details', 'UsersController@showUserDetails')->name('users.showUserDetails');
Route::patch('/user-details/{user}', 'UsersController@updateUserDetails')->name('user.updateUserDetails');
Route::post('/order', 'UsersController@storeOrder')->name('order.store');
Route::get('/user-login', 'UsersController@login')->name('login.login');


Route::get('/user-register', 'UsersController@registerUser')->name('register.index');


Route::get('/wishlists', 'AdminProductsController@showWishlists')->name('wishlists.index');
Route::get('/add-to-wishlists/{id}', 'AdminProductsController@addToWishlists')->name('wishlists.add');
Route::delete('/remove-from-wishlists/{id}', 'AdminProductsController@deleteFromWishlist')->name('wishlists.remove');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
