<?php

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/','LandingPageController@index')->name('landing-page');

Route::get('shop','ShopController@index')->name('shop.index');
Route::get('/shop/{product}','ShopController@show')->name('shop.show');

Route::get('cart','CartController@index')->name('cart.index');
Route::post('cart','CartController@store')->name('cart.store');
Route::patch('cart/{product}','CartController@update')->name('cart.update');
Route::delete('cart/{product}','CartController@destroy')->name('cart.destroy');
Route::post('cart/switchToSaveForLater/{product}','CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

Route::delete('saveForLater/{product}','SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('saveForLater/switchToCart/{product}','SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');
Route::post('saveForLater','SaveForLaterController@store')->name('saveForLater.store');

Route::get('checkout','CheckoutController@index')->name('checkout.index');
Route::post('checkout','CheckoutController@store')->name('checkout.store');

Route::get('thankyou','ConfirmationController@index')->name('confirmation.index');