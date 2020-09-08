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
   Route::get('/admin/update', 'AdminController@updateinfo')->name('admin.update');
   Route::post('/admin/update', 'AdminController@updateadmininfo');
   Route::get('/admin/register', 'AdminController@register')->name('admin.register');
   Route::post('/admin/register', 'AdminController@registeremployee');
 	 Route::get('/admin/update/employee/{id}', 'AdminController@update');
   Route::post('/admin/update/employee/{id}', 'AdminController@updateemployee');
   Route::get('/admin/delete/employee/{id}', 'AdminController@deleteemployee');
	// Route::get('/home/delete/{id}', 'HomeController@delete');
	// Route::post('/home/delete/{id}', 'HomeController@destroy');

});
Route::middleware(['sessionForEmployee'])->group(function(){
	 Route::get('/employee/index', 'EmployeeController@index')->name('employee.index');
   Route::get('/employee/update', 'EmployeeController@updateinfo')->name('employee.update');
   Route::post('/employee/update', 'EmployeeController@updateadmininfo');// Route::post('/home/edit/{id}', 'HomeController@update');
	// Route::get('/home/delete/{id}', 'HomeController@delete');
	// Route::post('/home/delete/{id}', 'HomeController@destroy');

});
