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
Route::get('/welcome', 'AppBaseController@welcome')->name('welcome');
Route::get('/contactus', 'AppBaseController@contactus')->name('contactus');
Route::get('/productos/products', 'AppBaseController@products');
Route::get('/categorias/index','CategoriaController@index');
Route::get('/categorias/create','CategoriaController@create');
Route::get('/categorias/edit/{id}','CategoriaController@edit');
Route::post('/categorias/destroy/{id}','CategoriaController@destroy')->name('eliminarCategoria');
Route::post('/categorias/update/','CategoriaController@update')->name('actualizarCategoria');
Route::post('/categorias/store', 'categoriasIndex@store');
Route::resource('categorias', 'CategoriaController');


Route::group(['middleware' => 'auth'],function () {
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/home', 'HomeController@index')->name('home');
	
	Route::post('/users/activarUsuario', 'UserController@destroy')->name('activarUsuario');

	//cargar datatable del lado del servidor
	Route::get('/users/usersIndex','UserController@usersIndex')->name('usersIndex');
	Route::get('/permisos/permissionsIndex','PermissionController@permissionsIndex')->name('permissionsIndex');
	Route::get('/productos/productosIndex','ProductoController@productosIndex')->name('productosIndex');
	Route::get('/categorias/categoriasIndex','CategoriaController@categoriasIndex')->name('categoriasIndex');

	//resource
	Route::resource('users', 'UserController');
	Route::resource('roles', 'RoleController');
	Route::resource('permisos', 'PermissionController');
	// Route::resource('categorias', 'CategoriaController');
});