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


Route::group(['middleware' => 'guest'],function(){
	// ROUTES THAT GUEST CAN ACCESS
	Route::get('login', [
			'uses' => 'userController@login',
			'as' => 'login'

		]);
	Route::get('register', [
			'uses' => 'userController@register',
			'as' => 'register'

		]);

	Route::post('/signin', [
			'uses' => 'UserController@postSignin',
			'as' => 'signin'

		]);
	Route::post('/signup', [
			'uses' => 'UserController@postSignup',
			'as' => 'signup'

		]);





});
	


	



Route::group(['middleware' => 'auth'],function(){
	// ROUTESS THAT ONLY AUTH USERS CAN USE

	// ROUTESS THAT ONLY ADMIN USERS CAN USE
	Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
	{
	   Route::get('/admin/home', [
			'uses' => 'AdminController@home',
			'as' => 'adminhome'

		]); 

	   Route::get('/admin/manageusers', [
			'uses' => 'AdminController@ManageUsers',
			'as' => 'manageusers'

		]);

	 Route::get('/admin/profile', [
				'uses' => 'AdminController@profile',
				'as' => 'adminprofile'

			]);
	 Route::get('/admin/managecategories', [
				'uses' => 'AdminController@ManageCategories',
				'as' => 'managecategories'

			]);
	 Route::get('/admin/managebooks', [
				'uses' => 'AdminController@ManageBooks',
				'as' => 'managebooks'

			]);
	 // POST ROUTES FOR THE ADMIN
	   Route::post('admin/deleteuser/{id}', [
	   		'uses' => 'AdminController@deleteuser',
	   		'as' => 'deleteUser'

	   	]);

	   	Route::post('admin/update/{id}', [
	   		'uses' => 'AdminController@updatePassword',
	   		'as' => 'updatePassword'

	   	]);

	   	Route::post('admin/addCategory', [
	   		'uses' => 'AdminController@addCategory',
	   		'as' => 'addCategory'

	   	]);

	   	Route::post('admin/editCategory/{id}', [
	   		'uses' => 'AdminController@editCategory',
	   		'as' => 'editCategory'

	   	]);

	   	Route::post('admin/addbook', [
	   		'uses' => 'AdminController@addBook',
	   		'as' => 'addBook'

	   	]);

	   	Route::post('admin/editbook/{id}', [
	   		'uses' => 'AdminController@editBook',
	   		'as' => 'editBook'

	   	]);

	   Route::post('admin/managecategories/deleteCategory/{id}', 'AdminController@deleteCategory');
	   Route::post('admin/manageboks/deleteBook/{id}', 'AdminController@deleteBook');
	   


	});
	//END OF ADMIN AUTH

	/* ------ */


	// auth routes for users

	Route::get('/users/home', [
		'uses' => 'userController@home',
		'as' => 'home'

	]);

	Route::get('/users/profile', [
		'uses' => 'userController@Profile',
		'as' => 'profile'

	]);

	Route::get('/users/search', [
		'uses' => 'userController@Search',
		'as' => 'search'

	]);

	Route::get('/users/wishlist', [
		'uses' => 'WishlistController@Wish',
		'as' => 'wishlist'

	]);

	Route::get('logout', [
			'uses' => 'userController@getLogout',
			'as' => 'user.logout'

	]);

	Route::post('users/deleteWish/{id}', [
			'uses' => 'WishlistController@deleteWish',
			'as' => 'deleteWish'

	]);


	Route::post('users/update/{id}', [
	   	'uses' => 'UserController@updatePassword',
	   	'as' => 'userupdatePassword'

	]);
//////////////////////////////////////////////////////////////

  Route::post('/addwish', 'WishlistController@addWish');
  Route::post('/removeWish', 'WishlistController@removeWish');
  Route::get('/searchbook', 'BookController@searchBook');

});



