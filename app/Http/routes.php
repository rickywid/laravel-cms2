<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Auth;

//root
Route::get('/', ['uses'=>'PostsController@index']);

Route::auth();

//posts routes
Route::resource('/post', 'PostsController');
Route::resource('/post/comment', 'RepliesController');



//admin routes
Route::group(['middleware'=>'admin'], function(){
	
	Route::get('/admin', function(){

		return view('admin.index');
	});

	Route::resource('/admin/media', 'AdminMediasController');

	Route::resource('/admin/posts', 'AdminPostsController');
	Route::resource('/admin/users', 'AdminUsersController');
	Route::resource('/admin/categories', 'AdminCategoriesController');

	Route::resource('/admin/comments', 'AdminCommentsController');
	Route::resource('/admin/replies', 'RepliesController');



});
