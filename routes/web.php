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
Route::get('/', 'LoginController@index')->name('login.index');
Route::get('/login', 'LoginController@index')->name('login.index');
Route::post('/login', 'LoginController@verify')->name('login.index');
Route::get('/logout', ['as'=>'logout.index', 'uses'=>'logoutController@index']);

Route::middleware(['sessionForAdmin'])->group(function(){
	 Route::get('/admin/index', 'AdminController@index')->name('admin.index');
   Route::get('/admin/register', 'AdminController@register')->name('admin.register');
   Route::post('/admin/register', 'AdminController@registeremployee');
 	 // Route::post('/home/edit/{id}', 'HomeController@update');
	// Route::get('/home/delete/{id}', 'HomeController@delete');
	// Route::post('/home/delete/{id}', 'HomeController@destroy');

});
Route::middleware(['sessionForEmployee'])->group(function(){
	 Route::get('/employee/index', 'AdminController@index')->name('employee.index');
 	 // Route::post('/home/edit/{id}', 'HomeController@update');
	// Route::get('/home/delete/{id}', 'HomeController@delete');
	// Route::post('/home/delete/{id}', 'HomeController@destroy');

});
