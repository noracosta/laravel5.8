<?php

Route::get('/', 'HomeController@index')->name('home');

 /* Login */

Route::get('authentication/login', 'Authentication\LoginController@index')->name('login');

Route::post('authentication/login', 'Authentication\LoginController@login')->name('login_post');

Route::get('authentication/logout', 'Authentication\LoginController@logout')->name('logout');

/* Recuperar contraseña */

Route::get('password/reset', 'Authentication\ForgotPasswordController@showLinkRequestForm')->name('password.request');

Route::post('password/email', 'Authentication\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::get('password/reset/{token}', 'Authentication\ResetPasswordController@showResetForm')->name('password.reset');

Route::post('password/reset', 'Authentication\ResetPasswordController@reset')->name('password.update');


/* Registrarse */

Route::get('register', 'Authentication\RegisterController@showRegistrationForm')->name('register');

Route::post('register', 'Authentication\RegisterController@register');


Route::post('ajax-sesion', 'AjaxController@setSession')->name('ajax')->middleware('auth');

 /* Admin */

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

     /* Permisos Roles */
     
     Route::resource('permissions_roles','PermissionRoleController');

     /* Usuarios */

     Route::put('users/{user}/update_password', 'UserController@update_password')->name('users.update_password');

     Route::get('users/{user}/edit_password', 'UserController@edit_password')->name('users.edit_password');

     Route::get('users/{user}/delete', 'UserController@delete')->name('users.delete');
 
     Route::get('users/index_data', 'UserController@index_data')->name('users.index_data');
     
     Route::resource('users','UserController');

     /* Banners */

     Route::get('banners/{banner}/delete', 'BannerController@delete')->name('banners.delete');
 
     Route::get('banners/index_data', 'BannerController@index_data')->name('banners.index_data');
     
     Route::resource('banners','BannerController');

});