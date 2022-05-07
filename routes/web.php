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

Route::get('/', 'PagesController@home');

Route::group(['prefix' => 'super_admin',
 'namespace' => 'SuperAdmin',
  'middleware' => 'superadmin'],
   function()
{
    Route::get('users','UsersController@index')->name('super_admin.users.index');
    Route::get('users/crate','UsersController@create')->name('super_admin.users.create');
    Route::post('users','UsersController@store')->name('super_admin.users.store');
    Route::get('users/{user}','UsersController@edit')->name('super_admin.users.edit');
    Route::put('users/{user}','UsersController@update')->name('super_admin.users.update');
    Route::delete('users/{user}','UsersController@destroy')->name('super_admin.users.delete');    

});


Route::group(['prefix' => 'admin',
 'namespace' => 'Admin',
  'middleware' => 'admin'],
   function()
{   

    Route::get('categorias','CategoriasController@index')->name('admin.categorias.index');
    Route::get('categorias/crate','CategoriasController@create')->name('admin.categorias.create');
    Route::post('categorias','CategoriasController@store')->name('admin.categorias.store');
    Route::get('categorias/{categoria}','CategoriasController@edit')->name('admin.categorias.edit');
    Route::put('categorias/{categoria}','CategoriasController@update')->name('admin.categorias.update');
    Route::delete('categorias/{categoria}','CategoriasController@destroy')->name('admin.categorias.delete');

    Route::get('actividades','ActividadesController@index')->name('admin.actividades.index');
    Route::get('actividades/crate','ActividadesController@create')->name('admin.actividades.create');
    Route::post('actividades','ActividadesController@store')->name('admin.actividades.store');
    Route::get('actividades/{actividad}','ActividadesController@edit')->name('admin.actividades.edit');
    Route::put('actividades/{actividad}','ActividadesController@update')->name('admin.actividades.update');
    Route::delete('actividades/{actividad}','ActividadesController@destroy')->name('admin.actividades.delete');  
});




Route::get('home',function(){
	return view ('admin.dashboard');
})->middleware('auth');

		Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        //Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        //Route::post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');

