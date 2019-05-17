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

//Important Note::

//If Rename Controller And Found Error Then Do this Code

//php artisan config:cache
//php artisan view:clear
//composer dump-autoload

/*====================================================================================================================================================================================================================*/

/* Product Routes [All The Routes For Our Product For Fornt End] */

Route::get('/', 'Frontend\PagesController@index')->name('index');
Route::get('/contact', 'Frontend\PagesController@contact')->name('contact');

//Product Routes Group
Route::group(['prefix' => '/products'], function(){
	Route::get('/', 'Frontend\ProductsController@index')->name('products');
	Route::get('/slug', 'Frontend\ProductsController@show')->name('products.show');
	
});

/*====================================================================================================================================================================================================================*/


/* Product Routes  [All The Routes For Our Product For Back End] */

//Admin Routes Group
Route::group(['prefix' => 'admin'], function(){

	Route::get('/', 'Backend\PagesController@index')->name('admin.index');

		//Product Routes Group
		Route::group(['prefix' => '/product'], function(){
			//Get Method
			Route::get('/', 'Backend\ProductsController@index')->name('admin.products');
			Route::get('/create', 'Backend\ProductsController@create')->name('admin.product.create');
			Route::get('/edit/{id}', 'Backend\ProductsController@edit')->name('admin.product.edit');
			
			
			//Post Method
			Route::post('/update/{id}', 'ProductsController@update')->name('admin.product.update');
			Route::post('/store', 'ProductsController@store')->name('admin.product.store');
			Route::post('/delete/{id}', 'ProductsController@delete')->name('admin.product.delete');

		});



		//Category Routes Group
		Route::group(['prefix' => '/category'], function(){

			//Get Method
			Route::get('/', 'Backend\CategoriesController@index')->name('admin.categories');
			Route::get('/create', 'Backend\CategoriesController@create')->name('admin.category.create');
			Route::get('/edit/{id}', 'Backend\CategoriesController@edit')->name('admin.category.edit');
			
			
			//Post Method
			Route::post('/update/{id}', 'Backend\CategoriesController@update')->name('admin.category.update');
			Route::post('/store', 'Backend\CategoriesController@store')->name('admin.category.store');
			Route::post('/delete/{id}', 'Backend\CategoriesController@delete')->name('admin.category.delete');

		});
	
});


