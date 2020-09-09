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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

//Libros

Route::get('/libros', 'LibroController@index')->name('libros.index'); //para mostrar todos los libros
Route::get('/libros/create', 'LibroController@create')->name('libros.create'); //renderizar la vista de creacion
Route::post('/libros', 'LibroController@store')->name('libros.store'); //guardar el form (crear un Libro)
Route::get('/libros/{libro}', 'LibroController@show')->name('libros.show'); //ver datos de un solo Libro
Route::get('/libros/{libro}/edit', 'LibroController@edit')->name('libros.edit'); //renderizar el form para editar un Libro
Route::put('/libros/{libro}', 'LibroController@update')->name('libros.update'); //guardar lo que modificamos en el form de edicion
Route::delete('libros/{libro}', 'LibroController@destroy')->name('libros.destroy'); //eliminar un Libro

//Genero de Libros
Route::get('/genero_libros', 'GeneroLibroController@index')->name('genero_libros.index'); //para mostrar todos los genero_libros
Route::get('/genero_libros/create', 'GeneroLibroController@create')->name('genero_libros.create'); //renderizar la vista de creacion
Route::post('/genero_libros', 'GeneroLibroController@store')->name('genero_libros.store'); //guardar el form (crear un Libro)
Route::get('/genero_libros/{genero_libro}', 'GeneroLibroController@show')->name('genero_libros.show'); //ver datos de un solo Libro
Route::get('/genero_libros/{genero_libro}/edit', 'GeneroLibroController@edit')->name('genero_libros.edit'); //renderizar el form para editar un Libro
Route::put('/genero_libros/{genero_libro}', 'GeneroLibroController@update')->name('genero_libros.update'); //guardar lo que modificamos en el form de edicion
Route::delete('genero_libros/{genero_libro}', 'GeneroLibroController@destroy')->name('genero_libros.destroy'); //eliminar un Libro

//Proveedores
Route::get('/proveedores', 'ProveedorController@index')->name('proveedores.index'); //para mostrar todos los proveedores
Route::get('/proveedores/create', 'ProveedorController@create')->name('proveedores.create'); //renderizar la vista de creacion
Route::post('/proveedores', 'ProveedorController@store')->name('proveedores.store'); //guardar el form (crear una direccion)
Route::get('/proveedores/{proveedor}', 'ProveedorController@show')->name('proveedores.show'); //ver datos de un solo proveedor
Route::get('/proveedores/{proveedor}/edit', 'ProveedorController@edit')->name('proveedores.edit'); //renderizar el form para editar un proveedor
Route::put('/proveedores/{proveedor}', 'ProveedorController@update')->name('proveedores.update'); //guardar lo que modificamos en el form de edicion
Route::delete('proveedores/{proveedor}', 'ProveedorController@destroy')->name('proveedores.destroy'); //eliminar una proveedor

//Autores
Route::get('/autores', 'AutorController@index')->name('autores.index'); //para mostrar todos los autores
Route::get('/autores/create', 'AutorController@create')->name('autores.create'); //renderizar la vista de creacion
Route::post('/autores', 'AutorController@store')->name('autores.store'); //guardar el form (crear una direccion)
Route::get('/autores/{autor}', 'AutorController@show')->name('autores.show'); //ver datos de un solo autor
Route::get('/autores/{autor}/edit', 'AutorController@edit')->name('autores.edit'); //renderizar el form para editar un autor
Route::put('/autores/{autor}', 'AutorController@update')->name('autores.update'); //guardar lo que modificamos en el form de edicion
Route::delete('autores/{autor}', 'AutorController@destroy')->name('autores.destroy'); //eliminar una autor

//Editoriales
Route::get('/editorials', 'EditorialController@index')->name('editorials.index'); //para mostrar todos los editorials
Route::get('/editorials/create', 'EditorialController@create')->name('editorials.create'); //renderizar la vista de creacion
Route::post('/editorials', 'EditorialController@store')->name('editorials.store'); //guardar el form (crear una direccion)
Route::get('/editorials/{editorial}', 'EditorialController@show')->name('editorials.show'); //ver datos de un solo editorial
Route::get('/editorials/{editorial}/edit', 'EditorialController@edit')->name('editorials.edit'); //renderizar el form para editar un editorial
Route::put('/editorials/{editorial}', 'EditorialController@update')->name('editorials.update'); //guardar lo que modificamos en el form de edicion
Route::delete('editorials/{editorial}', 'EditorialController@destroy')->name('editorials.destroy'); //eliminar una autor

