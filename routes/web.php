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

Route::group(['middleware' => 'web'], function(){
    Auth::routes();
    Route::match(['get', 'post'],'/', 'IndexController@expens')->name('home');

    Route::get('/page/{page}', 'IndexController@read')->name('read');
});

//admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/', 'Admin\AdminController@expens')->name('admin');

    //admin/pages
    Route::group(['prefix' => 'pages'], function(){
        Route::get('/', 'Admin\AdminPagesController@expens')->name('pages');
        Route::match(['post', 'get'], '/add', 'Admin\AdminAddPageController@expens')->name('page_add');
        Route::match(['post', 'get', 'delete'], '/edit/{page}', 'Admin\AdminEditPageController@expens')->name('page_edit');
    });

    //admin/portfolios
    Route::group(['prefix' => 'portfolios'], function(){
        Route::get('/', 'Admin\AdminPortfoliosController@expens')->name('portfolios');
        Route::match(['post', 'get'], '/add', 'Admin\AdminAddPortfoliosController@expens')->name('portfolio_add');
        Route::match(['post', 'get', 'delete'], '/edit/{portfolio}', 'Admin\AdminEditPortfoliosController@expens')->name('portfolio_edit');
    });

    //admin/services
    Route::group(['prefix' => 'services'], function(){
        Route::get('/', 'Admin\AdminServicesController@expens')->name('services');
        Route::match(['post', 'get'], '/add', 'Admin\AdminAddServicesController@expens')->name('service_add');
        Route::match(['post', 'get', 'delete'], '/edit/{service}', 'Admin\AdminEditServicesController@expens')->name('service_edit');
    });
});

