<?php
/**
 * Route front
 */
if(sc_config_global('PasswordWebsite')) {
Route::group(
    [
        'prefix'    => 'plugin/passwordwebsite',
        'namespace' => 'App\Plugins\Other\PasswordWebsite\Controllers',
    ],
    function () {
        Route::get('', 'FrontController@index')
        ->name('passwordwebsite.index');
        Route::post('', 'FrontController@processPassword')
        ->name('passwordwebsite.index');
    }
);
}
/**
 * Route admin
 */
Route::group(
    [
        'prefix' => SC_ADMIN_PREFIX.'/passwordwebsite',
        'middleware' => SC_ADMIN_MIDDLEWARE,
        'namespace' => 'App\Plugins\Other\PasswordWebsite\Admin',
    ], 
    function () {
        Route::get('/', 'AdminController@index')
        ->name('admin_passwordwebsite.index');
    }
);
