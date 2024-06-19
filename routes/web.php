<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserAuth;
use App\Http\Middleware\PermissionMiddleware;
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


Route::get('/','App\Http\Controllers\Authentication\RegisterController@view');
Route::post('/doreg','App\Http\Controllers\Authentication\RegisterController@register');
Route::post('/dologin','App\Http\Controllers\Authentication\LoginController@login'); // login & register on same  view page

Route::get('/logout','App\Http\Controllers\Authentication\LogOutController@logout');



Route::middleware([ UserAuth::class])->group(function(){

    Route::middleware([PermissionMiddleware::class])->group(function(){

    Route::get('/home','App\Http\Controllers\Authentication\HomeController@home')->name('home');

    Route::get('/accountantslist','App\Http\Controllers\Accounts\AccountantController@index')->name('list_accountants');

    Route::get('/add_accountants','App\Http\Controllers\Accounts\AccountantController@createview')->name('add_accountants');
    Route::post('/addaccountants','App\Http\Controllers\Accounts\AccountantController@create')->name('postaddaccountants');
    Route::get('/edit_accountants/{id}','App\Http\Controllers\Accounts\AccountantController@edit')->name('edit_accountants');
    Route::post('/update_accountants/{id}','App\Http\Controllers\Accounts\AccountantController@update')->name('update_accountants');
    Route::get('/delete_accountants/{id}','App\Http\Controllers\Accounts\AccountantController@delete')->name('delete_accountants');

    Route::get('/accountslist','App\Http\Controllers\Accounts\AccountsController@index')->name('list_accounts');

    Route::get('/add_accounts','App\Http\Controllers\Accounts\AccountsController@createview')->name('add_accounts');
    Route::post('/addaccounts','App\Http\Controllers\Accounts\AccountsController@create')->name('post_add_accounts');
    Route::get('/edit_accounts/{id}','App\Http\Controllers\Accounts\AccountsController@edit')->name('edit_accounts');
    Route::post('/update_accounts/{id}','App\Http\Controllers\Accounts\AccountsController@update')->name('update_accounts');
    Route::get('/delete_accounts/{id}','App\Http\Controllers\Accounts\AccountsController@delete')->name('delete_accounts');

    Route::get('/roles_list','App\Http\Controllers\Permission\PermissionController@rolelist')->name('roles_list');
    // Route::get('/add_roles','App\Http\Controllers\Permission\PermissionController@createview')->name('add_role');
    // Route::post('/addrole','App\Http\Controllers\Permission\PermissionController@create')->name('post_add_role');
    // Route::get('/delete_roles/{id}','App\Http\Controllers\Permission\PermissionControllerr@delete')->name('delete_roles');

    Route::get('/permission_list','App\Http\Controllers\Permission\PermissionController@permissionlist')->name('permission_list');
    Route::get('/add_permission','App\Http\Controllers\Permission\PermissionController@createviewpermission')->name('add_permission');
    Route::post('/addpermission','App\Http\Controllers\Permission\PermissionController@createpermission')->name('post_add_permission');
    Route::get('/edit_permission/{id}','App\Http\Controllers\Permission\PermissionController@editpermission')->name('edit_permission');
    Route::post('/update_permission/{id}','App\Http\Controllers\Permission\PermissionController@updatepermission')->name('update_permission');
    Route::get('/delete_permission/{id}','App\Http\Controllers\Permission\PermissionControllerr@deletepermission')->name('delete_permission');


    Route::get('/menu_list','App\Http\Controllers\Permission\PermissionController@menulist')->name('menu_list');
    // Route::get('/add_menu','App\Http\Controllers\Permission\PermissionController@createview')->name('add_role');
    // Route::post('/addmenu','App\Http\Controllers\Permission\PermissionController@create')->name('post_add_role');
    // Route::get('/delete_menu/{id}','App\Http\Controllers\Permission\PermissionControllerr@delete')->name('delete_roles');

    Route::get('/change_userrole_list','App\Http\Controllers\Permission\PermissionController@menulist')->name('change_userrole_list');

});

});