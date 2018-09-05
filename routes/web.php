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
    return view('display');
})->name('main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'admin', 'as' => 'admin.'], function (){
    Route::resource('/admin/users', 'AdminUsersController');
    Route::resource('/admin/society', 'AdminSocietyController');
    Route::resource('/admin/guests', 'AdminGuestsController');
    Route::get('/admin', function (){
        return view('admin.index');
    })->name('admin');
});

Route::group(['middleware'=>'manager', 'as' => 'manager.'], function (){
    Route::resource('/manager', 'ManagerController')->except(['show', 'store']);
    Route::resource('/manager/owners', 'ManagerOwnersController');
    Route::resource('/manager/security', 'ManagerSecurityController');
    Route::resource('/manager/notifications', 'SocietyNotificationsController');
});

Route::group(['middleware'=>'owner'], function (){
    Route::resource('/owner', 'OwnerController')->except(['show', 'store']);
    Route::get('/owner/approve/{id}', 'OwnerController@approve');
});

Route::group(['middleware'=>'security'], function (){
    Route::resource('/security', 'SecurityController');
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

Route::get('/demo', function (){
    return view('demo');
});

// OAuth Routes
Route::get('callback/{provider}', 'SocialAuthController@callback');
Route::get('login/{provider}', 'SocialAuthController@redirect');
Route::get('logout', 'SocialAuthController@logout');
