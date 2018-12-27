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



//ADMIN ROUTES
Route::group(['prefix' => 'admin'], function () {

  Route::get('login', ['as' => 'admin.login', 'uses' => 'Admin\AdminController@getLogin']);
  Route::post('login', ['as' => 'admin.login.post', 'uses' => 'Admin\AdminController@postLogin']);
  Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'Admin\AdminController@getDashboard'])->middleware('admin');
  Route::get('logout', ['as' => 'admin.logout', 'uses' => 'Admin\AdminController@getLogout']);


  Route::group(['middleware' => 'admin'], function () {

  	//Categories and Subcategories
	 Route::resource('/category', 'Admin\CategoryController');
	 Route::get('/category/delete/{id}', ['as' => 'category.delete', 'uses' => 'Admin\CategoryController@getDelete']);


  	});







 });
