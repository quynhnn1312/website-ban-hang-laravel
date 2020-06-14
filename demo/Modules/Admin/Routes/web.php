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

Route::prefix('authenticate')->group(function (){
    Route::get('/login', 'AdminAuthController@getLogin')->name('admin.login');
    Route::post('/login', 'AdminAuthController@postLogin');
});

Route::prefix('admin')->middleware('check.login.admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::group(['prefix' => 'category'], function (){
        Route::get('/', 'AdminCategoryController@index')->name('admin.get.list.category');
        Route::get('/create', 'AdminCategoryController@create')->name('admin.get.create.category');
        Route::post('/create', 'AdminCategoryController@store');
        Route::get('/update/{id}', 'AdminCategoryController@edit')->name('admin.get.update.category');
        Route::post('/update/{id}', 'AdminCategoryController@update');
        Route::get('/{action}/{id}', 'AdminCategoryController@action')->name('admin.get.action.category');
    });

    Route::group(['prefix' => 'product'], function (){
        Route::get('/', 'AdminProductController@index')->name('admin.get.list.product');
        Route::get('/create', 'AdminProductController@create')->name('admin.get.create.product');
        Route::post('/create', 'AdminProductController@store');
        Route::get('/update/{id}', 'AdminProductController@edit')->name('admin.get.update.product');
        Route::post('/update/{id}', 'AdminProductController@update');
        Route::get('/{action}/{id}', 'AdminProductController@action')->name('admin.get.action.product');
    });

    Route::group(['prefix' => 'article'], function (){
        Route::get('/', 'AdminArticleController@index')->name('admin.get.list.article');
        Route::get('/create', 'AdminArticleController@create')->name('admin.get.create.article');
        Route::post('/create', 'AdminArticleController@store');
        Route::get('/update/{id}', 'AdminArticleController@edit')->name('admin.get.update.article');
        Route::post('/update/{id}', 'AdminArticleController@update');
        Route::get('/{action}/{id}', 'AdminArticleController@action')->name('admin.get.action.article');
    });

    //quan ly đơn hàng
    Route::group(['prefix' => 'transaction'], function (){
        Route::get('/', 'AdminTransactionController@index')->name('admin.get.list.transaction');
        Route::get('/delete/{id}', 'AdminTransactionController@action')->name('admin.get.action.transaction');
        Route::post('/view/{id}', 'AdminTransactionController@viewOrder')->name('admin.get.view.order');
        Route::get('/active/{id}', 'AdminTransactionController@actionTransaction')->name('admin.get.active.transaction');
    });

    //quan ly user
    Route::group(['prefix' => 'user'], function (){
        Route::get('/', 'AdminUserController@index')->name('admin.get.list.user');
    });

    //quan ly rating
    Route::group(['prefix' => 'rating'], function (){
        Route::get('/', 'RatingController@index')->name('admin.get.list.rating');
        Route::get('delete/{id}', 'RatingController@destroy')->name('admin.delete.rating');
    });

    //quan ly lien he
    Route::group(['prefix' => 'contact'], function (){
        Route::get('/', 'AdminContactController@index')->name('admin.get.list.contact');
        Route::get('update/{id}', 'AdminContactController@update')->name('admin.update.contact');
        Route::get('{action}/{id}', 'AdminContactController@action')->name('admin.action.contact');
    });

});
