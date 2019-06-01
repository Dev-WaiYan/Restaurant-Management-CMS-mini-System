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

//For Customer View

Route::get('/','AppController@index');
Route::get('menu','AppController@showMenu');
Route::get('booking',function() {
    return view('cms.booking',['active'=>'booking']);
});

Route::get('bookingSuccess',function() {
    return view('cms.booking',['active'=>'booking','bookingSuccess'=>'Booking Success. We will contact you soon. Thank you.']);
});

Route::get('bookingTryAgain',function() {
    return view('cms.booking',['active'=>'booking','error'=>'You have table field error. Try again.']);
});

Route::post('registerBooking','AppController@registerBooking');


//For Admin View
Route::get('restaurant-admin',function() {
    return view('cms.admin.login');
});
Route::get('login','AdminController@login');
Route::get('bookinglist','AdminController@showBookingList');
Route::get('addmenu','AdminController@addMenu');
Route::get('editmenu','AdminController@editMenu');
Route::get('setting','AdminController@adminSetting');
Route::get('bookingDelete','AdminController@bookingDelete');

Route::post('login','AdminController@login');
Route::post('addmenu','AdminController@addMenu');
Route::post('editmenu','AdminController@editMenu');
Route::post('setting','AdminController@adminSetting');
Route::post('bookingDelete','AdminController@bookingDelete');