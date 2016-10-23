<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/**
 * 登录模块路由
 */
Route::group(['namespace'=>'Admin','prefix'=>'admin'],function(){
    Route::get('login',[
        'as' => 'admin.to_login',
        'uses' => 'AuthController@toLogin'
    ]);

    Route::post('login',[
        'as' => 'admin.post_login',
        'uses' => 'AuthController@postLogin'
    ]);

});

////首页
//Route::get('/',[
//    'as' => 'admin.index',
//    'uses' => 'Admin\IndexController@index'
//]);

/**
 * 后台管理界面
 */
Route::group(['middleware'=>'auth:admin','namespace'=>'Admin','prefix'=>'admin'],function(){

    Route::get('logout',[
        'as' => 'admin.logout',
        'uses' => 'AuthController@logout'
    ]);

    //首页
    Route::get('/',[
        'as' => 'admin.index',
        'uses' => 'IndexController@index'
    ]);

    Route::get('permission_list',[
        'as' => 'admin.permission_list',
        'uses' => 'UserController@permissionList'
    ]);

    Route::post('permission_add',[
        'as' => 'admin.permission_add',
        'uses' => 'UserController@permissionAdd'
    ]);

    Route::get('permission_del',[
        'as' => 'admin.permission_del',
        'uses' => 'UserController@permissionDel'
    ]);


});

//
//
//
//Route::get('/', function () {
//    return view('index');
//});
//
//Route::get('/home', 'HomeController@index');
