<?php

Route::get('/', 'HomeController@index')->name('home');

Route::get('authentication/login', 'Authentication\LoginController@index')->name('login');

Route::post('authentication/login', 'Authentication\LoginController@login')->name('login_post');

Route::get('authentication/logout', 'Authentication\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function () {
    
    Route::get('/', 'HomeController@index');

    /* Permissions */

    Route::get('permissions/{permission}/delete', 'PermissionController@delete')->name('permissions.delete');

    Route::get('permissions/index_data', 'PermissionController@index_data')->name('permissions.index_data');
    
    Route::resource('permissions','PermissionController');

    /* Menus */

    Route::post('menus/update_order', 'MenuController@update_order')->name('menus.update_order');

    Route::get('menus/{menu}/delete', 'MenuController@delete')->name('menus.delete');

    Route::get('menus/list', 'MenuController@list')->name('menus.list');

    Route::get('menus/index_data', 'MenuController@index_data')->name('menus.index_data');
    
    Route::resource('menus','MenuController');

     /* Roles */

     Route::get('roles/{role}/delete', 'RoleController@delete')->name('roles.delete');
 
     Route::get('roles/index_data', 'RoleController@index_data')->name('roles.index_data');
     
     Route::resource('roles','RoleController');

     /* Menus Roles */
     
     Route::resource('menus_roles','MenuRoleController');

});