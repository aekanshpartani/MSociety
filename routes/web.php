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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'admin', 'as' => 'admin.'], function (){
    Route::resource('/admin/users', 'AdminUsersController');
    Route::resource('/admin/society', 'AdminSocietyController');
    Route::get('/admin', function (){
        return view('admin.index');
    })->name('admin');
});

Route::group(['middleware'=>'owner'], function (){
    Route::resource('/owner', 'OwnerController')->except(['show', 'store']);
});

Route::get('/society-register', function (){
    return view('society-register');
});

Route::post('sign-up-user', [
    'uses' => 'OwnerController@store'
]);

Route::get('sign-up', [
    'uses' => 'OwnerController@show'
]);