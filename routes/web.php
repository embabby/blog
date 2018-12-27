<?php



Route::get('/', ['as'=>'blog.index', 'uses'=>'Blog\BlogController@getIndex']);
Route::get('/{id}', ['as' => 'blog.show', 'uses' => 'Blog\BlogController@getBlog']);
Route::get('/category/{id}', ['as' => 'categoryPosts.show', 'uses' => 'Blog\BlogController@categoryPosts']);



//ADMIN ROUTES
Route::group(['prefix' => 'admin'], function () {

  Route::get('login', ['as' => 'admin.login', 'uses' => 'Admin\AdminController@getLogin']);
  Route::post('login', ['as' => 'admin.login.post', 'uses' => 'Admin\AdminController@postLogin']);
  Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'Admin\AdminController@getDashboard'])->middleware('admin');
  Route::get('logout', ['as' => 'admin.logout', 'uses' => 'Admin\AdminController@getLogout']);

  Route::group(['middleware' => 'admin'], function () {

  	//Categories
	 Route::resource('/category', 'Admin\CategoryController');
	 Route::get('/category/delete/{id}', ['as' => 'category.delete', 'uses' => 'Admin\CategoryController@getDelete']);

   //Posts
   Route::resource('/post', 'Admin\PostController');
   Route::get('/post/delete/{id}', ['as' => 'post.delete', 'uses' => 'Admin\PostController@getDelete']);


  	});


 });
