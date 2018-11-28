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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware' => 'auth'], function(){

    Route::get('/', ['as' => 'mainpage', 'uses'=>'MainController@index']);




    //Route::get('/', ['as' => 'home', 'uses' => 'ObjectController@allObjects']);


    Route::get('test1', ['as' => 'test', 'uses' => 'TestController@test1']);
    Route::get('test2', ['as' => 'test', 'uses' => 'TestController@test2']);
    //Route::get('testaddroles', ['as' => 'testAddRoles', 'uses' => 'TestController@testAddRoles']);
    //Route::get('addPermissionTest', ['as' => 'addPermissionTest', 'uses' => 'TestController@addPermissionTest']);
    Route::get('/view/objects', ['as' => 'view.all', 'uses' => 'ObjectController@allObjects']);
    Route::get('/view/object/{id}', ['as' => 'view.object', 'uses' => 'ObjectController@viewOne']);
    /*Показать детально комнату у объекта*/
    Route::get('/view/room/{id}/{sale}', ['as' => 'view.room', 'uses' => 'RoomController@viewOne']);













    /*Только для администраторов*/
    Route::group(['middleware' => 'onlyAdmin'], function () {
        Route::get('/admin', ['as' => 'admin', 'uses' => 'Admin\AdminController@viewAdminPanel']);
        // Работа с пользователями
        Route::get('/user/{id}/delete', ['as' => 'users.delete', 'uses' => 'Admin\UserController@destroy']);
        Route::resource('/admin/users', 'Admin\UserController');
        //Работа с ролями
        Route::resource('/admin/roles', 'Admin\RoleController');
        Route::get('/role/{id}/delete', ['as' => 'roles.delete', 'uses' => 'Admin\RoleController@destroy']);
        //Работа с Permission
        Route::resource('/admin/permissions', 'Admin\PermissionController');
        Route::get('/permissions/{id}/delete', ['as' => 'permissions.delete', 'uses' => 'Admin\PermissionController@destroy']);
    });
});



