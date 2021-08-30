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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','ClientController@index')->name('index');
Route::get('about','ClientController@about')->name('about');
Route::get('laporan','ClientController@laporan')->name('laporan');
Route::get('contact','ClientController@contact')->name('contact');
Route::get('statistik','ClientController@statistik')->name('statistik');
Route::get('cara','ClientController@cara')->name('cara');
Auth::routes();

Route::group(['prefix' => 'user',  'middleware' => ['role:member']], function(){
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('lapor', 'LaporController@lapor_client')->name('lapor.client');
    // Route::get('lapor/cancel/{id}', 'HomeController@lapor_can')->name('lapor.cancel');
    Route::post('lapor/cancel/{id}', 'HomeController@lapor_can')->name('lapor.cancel');
    Route::get('lapor/view/{id}', 'LaporController@lapor_client_view')->name('lapor.client.view');
    Route::post('/lapor/store','LaporController@store')->name('lapor.store');
});

Route::group(['prefix' => 'admin',  'middleware' => ['role:admin']], function(){
    Route::get('dashboard','AdminController@index')->name('dashboard');
    Route::get('users','AdminController@users')->name('users');
    Route::get('users/view/{id}','AdminController@users_view')->name('users.view');
    // Route::post('users/edit/update/{id}','AdminController@users_update')->name('users.update');
    Route::get('lapor','LaporController@lapor')->name('lapor.index');
    Route::get('lapor/map','LaporController@lapor_map')->name('lapor.map');
    Route::get('lapor/view/{id}','LaporController@lapor_view')->name('lapor.show');
    Route::post('lapor/edit/update/{id}','LaporController@lapor_update')->name('lapor.update');
});