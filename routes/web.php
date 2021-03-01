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
Route::get('/gracias', 'MovimientoController@gracias')->name('gracias');

Route::middleware(['auth'])->group(function () {

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

//TipoLibro
Route::get('/tipo_libros', 'TipoLibroController@index')->name('tipo_libros.index'); //para mostrar todos los tipo_libros
Route::get('/tipo_libros/create', 'TipoLibroController@create')->name('tipo_libros.create'); //renderizar la vista de creacion
Route::post('/tipo_libros', 'TipoLibroController@store')->name('tipo_libros.store'); //guardar el form (crear una direccion)
Route::get('/tipo_libros/{tipo_libro}', 'TipoLibroController@show')->name('tipo_libros.show'); //ver datos de un solo tipo_libro
Route::get('/tipo_libros/{tipo_libro}/edit', 'TipoLibroController@edit')->name('tipo_libros.edit'); //renderizar el form para editar un tipo_libro
Route::put('/tipo_libros/{tipo_libro}', 'TipoLibroController@update')->name('tipo_libros.update'); //guardar lo que modificamos en el form de edicion
Route::delete('tipo_libros/{tipo_libro}', 'TipoLibroController@destroy')->name('tipo_libros.destroy'); //eliminar una autor

//IngresoLibro
Route::get('/ingreso_libros', 'IngresoLibroController@index')->name('ingreso_libros.index'); //para mostrar todos los ingreso
Route::get('/ingreso_libros/create', 'IngresoLibroController@create')->name('ingreso_libros.create'); //renderizar la vista de creacion
Route::post('/ingreso_libros', 'IngresoLibroController@store')->name('ingreso_libros.store'); //guardar el form (crear una direccion)
Route::get('/ingreso_libros/{ingreso_libro}', 'IngresoLibroController@show')->name('ingreso_libros.show'); //ver datos de un solo ingreso_libro
Route::get('/ingreso_libros/{ingreso_libro}/edit', 'IngresoLibroController@edit')->name('ingreso_libros.edit'); //renderizar el form para editar un ingreso_libro
Route::put('/ingreso_libros/{ingreso_libro}', 'IngresoLibroController@update')->name('ingreso_libros.update'); //guardar lo que modificamos en el form de edicion
Route::delete('ingreso_libros/{ingreso_libro}', 'IngresoLibroController@destroy')->name('ingreso_libros.destroy'); //eliminar una autor

//TipoIngreso
Route::get('/tipo_ingresos', 'TipoIngresoController@index')->name('tipo_ingresos.index'); //para mostrar todos los tipo_ingresos
Route::get('/tipo_ingresos/create', 'TipoIngresoController@create')->name('tipo_ingresos.create'); //renderizar la vista de creacion
Route::post('/tipo_ingresos', 'TipoIngresoController@store')->name('tipo_ingresos.store'); //guardar el form (crear una direccion)
Route::get('/tipo_ingresos/{tipo_ingreso}', 'TipoIngresoController@show')->name('tipo_ingresos.show'); //ver datos de un solo tipo_ingreso
Route::get('/tipo_ingresos/{tipo_ingreso}/edit', 'TipoIngresoController@edit')->name('tipo_ingresos.edit'); //renderizar el form para editar un tipo_ingreso
Route::put('/tipo_ingresos/{tipo_ingreso}', 'TipoIngresoController@update')->name('tipo_ingresos.update'); //guardar lo que modificamos en el form de edicion
Route::delete('tipo_ingresos/{tipo_ingreso}', 'TipoIngresoController@destroy')->name('tipo_ingresos.destroy'); //eliminar una autor

//Lectores
Route::get('/lectores', 'LectorController@index')->name('lectores.index'); //para mostrar todos los lectores
Route::get('/lectores/create', 'LectorController@create')->name('lectores.create'); //renderizar la vista de creacion
Route::post('/lectores', 'LectorController@store')->name('lectores.store'); //guardar el form (crear una direccion)
Route::post('lectores/{lector}', 'LectorController@perdonar')->name('lectores.perdonar'); //
Route::get('/lectores/{lector}', 'LectorController@show')->name('lectores.show'); //ver datos de un solo lector
Route::get('/lectores/{lector}/edit', 'LectorController@edit')->name('lectores.edit'); //renderizar el form para editar un lector
Route::put('/lectores/{lector}', 'LectorController@update')->name('lectores.update'); //guardar lo que modificamos en el form de edicion
Route::delete('lectores/{lector}', 'LectorController@destroy')->name('lectores.destroy'); //eliminar una autor


//TipoBaja
Route::get('/tipo_bajas', 'TipoBajaController@index')->name('tipo_bajas.index'); //para mostrar todos los tipo_bajas
Route::get('/tipo_bajas/create', 'TipoBajaController@create')->name('tipo_bajas.create'); //renderizar la vista de creacion
Route::post('/tipo_bajas', 'TipoBajaController@store')->name('tipo_bajas.store'); //guardar el form (crear una direccion)
Route::get('/tipo_bajas/{tipo_baja}', 'TipoBajaController@show')->name('tipo_bajas.show'); //ver datos de un solo tipo_baja
Route::get('/tipo_bajas/{tipo_baja}/edit', 'TipoBajaController@edit')->name('tipo_bajas.edit'); //renderizar el form para editar un tipo_baja
Route::put('/tipo_bajas/{tipo_baja}', 'TipoBajaController@update')->name('tipo_bajas.update'); //guardar lo que modificamos en el form de edicion
Route::delete('tipo_bajas/{tipo_baja}', 'TipoBajaController@destroy')->name('tipo_bajas.destroy'); //eliminar una autor

//BajaLibros
Route::get('/baja_libros', 'BajaLibroController@index')->name('baja_libros.index'); //para mostrar todos los ingreso
Route::get('/baja_libros/create', 'BajaLibroController@create')->name('baja_libros.create'); //renderizar la vista de creacion
Route::post('/baja_libros', 'BajaLibroController@store')->name('baja_libros.store'); //guardar el form (crear una direccion)
Route::get('/baja_libros/{baja_libro}', 'BajaLibroController@show')->name('baja_libros.show'); //ver datos de un solo baja_libro
Route::get('/baja_libros/{baja_libro}/edit', 'BajaLibroController@edit')->name('baja_libros.edit'); //renderizar el form para editar un baja_libro
Route::put('/baja_libros/{baja_libro}', 'BajaLibroController@update')->name('baja_libros.update'); //guardar lo que modificamos en el form de edicion
Route::delete('baja_libros/{baja_libro}', 'BajaLibroController@destroy')->name('baja_libros.destroy');

//Estado
Route::get('/estados', 'EstadoController@index')->name('estados.index'); //para mostrar todos los estados
Route::get('/estados/create', 'EstadoController@create')->name('estados.create'); //renderizar la vista de creacion
Route::post('/estados', 'EstadoController@store')->name('estados.store'); //guardar el form (crear un Estado)
Route::get('/estados/{estado}', 'EstadoController@show')->name('estados.show'); //ver datos de un solo Estado
Route::get('/estados/{estado}/edit', 'EstadoController@edit')->name('estados.edit'); //renderizar el form para editar un Estado
Route::put('/estados/{estado}', 'EstadoController@update')->name('estados.update'); //guardar lo que modificamos en el form de edicion
Route::delete('estados/{estado}', 'EstadoController@destroy')->name('estados.destroy'); //eliminar un Libro

//Estado
Route::get('/movimientos', 'MovimientoController@index')->name('movimientos.index'); //para mostrar todos los movimientos
Route::get('/movimientos/create', 'MovimientoController@create')->name('movimientos.create'); //renderizar la vista de creacion
Route::get('/movimientos/entrega', 'MovimientoController@entrega')->name('movimientos.entrega'); //renderizar la vista de creacion
Route::post('/movimientos', 'MovimientoController@store')->name('movimientos.store'); //guardar el form (crear un movimiento)
Route::get('/movimientos/{movimiento}', 'MovimientoController@show')->name('movimientos.show'); //ver datos de un solo movimiento
Route::get('/movimientos/{movimiento}/edit', 'MovimientoController@edit')->name('movimientos.edit'); //renderizar el form para editar un movimiento
Route::put('/movimientos/{movimiento}', 'MovimientoController@update')->name('movimientos.update'); //guardar lo que modificamos en el form de edicion
Route::delete('movimientos/{movimiento}', 'MovimientoController@destroy')->name('movimientos.destroy'); //eliminar un Libro


Route::get('/movimientos/{movimiento}', 'MovimientoController@confirmo')->name('movimientos.confirmo'); //guardar lo que modificamos en el form de edicion
Route::get('/movimientos/{movimiento}/confirmacion', 'MovimientoController@confirmacion')->name('movimientos.confirmacion'); //renderizar la vista de confirmacion.
//Route::get('/movimientos/{id}/getlibro', 'MovimientoController@getlibro')->name('movimientos.getlibro'); //renderizar el form para editar un movimiento

//Estado
Route::get('/estado_devolucions', 'EstadoDevolucionController@index')->name('estado_devolucions.index'); //para mostrar todos los estado_devolucions
Route::get('/estado_devolucions/create', 'EstadoDevolucionController@create')->name('estado_devolucions.create'); //renderizar la vista de creacion
Route::post('/estado_devolucions', 'EstadoDevolucionController@store')->name('estado_devolucions.store'); //guardar el form (crear un Estado)
Route::get('/estado_devolucions/{estado_devolucion}', 'EstadoDevolucionController@show')->name('estado_devolucions.show'); //ver datos de un solo Estado
Route::get('/estado_devolucions/{estado_devolucion}/edit', 'EstadoDevolucionController@edit')->name('estado_devolucions.edit'); //renderizar el form para editar un Estado
Route::put('/estado_devolucions/{estado_devolucion}', 'EstadoDevolucionController@update')->name('estado_devolucions.update'); //guardar lo que modificamos en el form de edicion
Route::delete('estado_devolucions/{estado_devolucion}', 'EstadoDevolucionController@destroy')->name('estado_devolucions.destroy'); //eliminar un Libro


//IngresoLibro
Route::get('/perdons', 'PerdonController@index')->name('perdons.index'); //para mostrar todos los ingreso
Route::get('/perdons/create', 'PerdonController@create')->name('perdons.create'); //renderizar la vista de creacion
Route::post('/perdons', 'PerdonController@store')->name('perdons.store'); //guardar el form (crear una direccion)
Route::get('/perdons/{perdon}', 'PerdonController@show')->name('perdons.show'); //ver datos de un solo perdon
Route::get('/perdons/{perdon}/edit', 'PerdonController@edit')->name('perdons.edit'); //renderizar el form para editar un perdon
Route::put('/perdons/{perdon}', 'PerdonController@update')->name('perdons.update'); //guardar lo que modificamos en el form de edicion
Route::delete('perdons/{perdon}', 'PerdonController@destroy')->name('perdons.destroy'); //eliminar una autor

//estadisticas
Route::get('/estadisticas', 'EstadisticaController@index')->name('estadistica.index');

//carga de provincias con ajax
Route::get('paises/{pais}', 'DireccionController@obtenerProvincias')->name('paises.obtenerProvincias');

//carga de localidades con ajax
Route::get('provincias/{provincia}', 'DireccionController@obtenerLocalidades')->name('provincias.obtenerLocalidades');

//configuracion
Route::get('configuracion', 'ConfiguracionController@index')->name('configuracion.index');
Route::put('configuracion/update', 'ConfiguracionController@update')->name('configuracion.update');

//pdfs
Route::get('/proveedorPDF', 'PdfController@proveedorPDF')->name('proveedor.pdf');
Route::get('/libroPDF', 'PdfController@libroPDF')->name('libro.pdf');
Route::get('/ingresoPDF', 'PdfController@ingresoPDF')->name('ingreso.pdf');
Route::get('/devueltoPDF', 'PdfController@devueltoPDF')->name('devuelto.pdf');

    //Registro completo
    Route::get('/usuarios/registro_completo', function () {
        return view('registro_completo');
    })->name('usuarios.registro_completo');

    //Usuarios
    Route::get('/usuarios/administrar/', 'UserController@index')->name('usuarios.administrar');

    Route::get('/usuarios/{usuario}/edit', 'UserController@edit')->name('usuarios.edit');

    Route::patch('/usuarios/{usuario}', 'UserController@update')->name('usuarios.update');

    Route::get('/usuarios/create', 'UserController@create')->name('usuarios.create'); //renderizar la vista de creacion
    
    Route::get('/usuarios', 'UserController@store')->name('usuarios.store'); //guardar el form (crear un Estado)

    Route::get('auditoria', 'AuditoriaController@index')->name('auditoria.index');
    Route::get('auditoria/prestamos/{auditoria}-{id}', 'AuditoriaController@showPrestamo')->name('auditoria.showPrestamo');
    Route::get('auditoria/bajas/{auditoria}-{id}', 'AuditoriaController@showBaja')->name('auditoria.showBaja') ;
    Route::get('auditoria/ingresos/{auditoria}-{id}', 'AuditoriaController@showIngreso')->name('auditoria.showIngreso');
    Route::get('auditoria/libros/{auditoria}-{id}', 'AuditoriaController@showLibro')->name('auditoria.showLibro');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


