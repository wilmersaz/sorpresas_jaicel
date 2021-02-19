<?php

Auth::routes();
Route::get('/productos/products','ProductoController@listado')->name('listadoProductos');
Route::get('/welcome', 'AppBaseController@welcome')->name('welcome');
Route::get('/contactus', 'AppBaseController@contactus')->name('contactus');


Route::resource('/contacto', 'ContactoController');

// *********************************************************************************

Route::group(['middleware' => 'auth'],function () 
{
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/home', 'HomeController@index')->name('home');
	
	Route::post('/users/activarUsuario', 'UserController@destroy')->name('activarUsuario');

	//cargar datatable del lado del servidor
	Route::get('/users/usersIndex','UserController@usersIndex')->name('usersIndex');
	Route::get('/permisos/permissionsIndex','PermissionController@permissionsIndex')->name('permissionsIndex');

	//Categorías
	Route::post('/categorias/update/','CategoriaController@update')->name('actualizarCategoria');
	Route::post('/categorias/destroy/{id}','CategoriaController@destroy')->name('eliminarCategoria');

	//productos
	Route::post('/productos/update/','ProductoController@update')->name('actualizarProducto');
	Route::post('/productos/bloquear/','ProductoController@bloquear')->name('bloquearProducto');

	//resource
	Route::resource('users', 'UserController');
	Route::resource('roles', 'RoleController');
	Route::resource('permisos', 'PermissionController');
	Route::resource('categorias', 'CategoriaController');
	Route::resource('productos', 'ProductoController');
});