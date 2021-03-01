<?php

use Illuminate\Database\Seeder;
use App\Editorial;
use App\GeneroLibro;
use App\TipoLibro;
use App\Autor;
use App\Configuracion;
use App\User;
use App\Estado;
use App\TipoIngreso;
use App\TipoBaja;
use App\EstadoDevolucion;
use App\Direccion;



class GeneralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Editorial::create([
            'nombre_editorial'          => 'BookEdit',
        ]);

        Editorial::create([
            'nombre_editorial'          => 'Austral',
        ]);

        Editorial::create([
            'nombre_editorial'          => 'Pascal Book',
        ]);

        Editorial::create([
            'nombre_editorial'          => 'Tigger Books',
        ]);

        Editorial::create([
            'nombre_editorial'          => 'BOOKET',
        ]);

        Editorial::create([
            'nombre_editorial'          => 'DIANA',
        ]);

        Editorial::create([
            'nombre_editorial'          => 'Alienta Editorial',
        ]);

        Editorial::create([
            'nombre_editorial'          => 'Deustro',
        ]);

        Editorial::create([
            'nombre_editorial'          => 'Destino',
        ]);
        
        GeneroLibro::create([
            'genero_libros'          => 'Terror',
        ]);

        GeneroLibro::create([
            'genero_libros'          => 'Fantasia',
        ]);

        GeneroLibro::create([
            'genero_libros'          => 'Comedia',
        ]);

        GeneroLibro::create([
            'genero_libros'          => 'Ciencia Ficcion',
        ]);

        GeneroLibro::create([
            'genero_libros'          => 'Ficcion',
        ]);

        GeneroLibro::create([
            'genero_libros'          => 'Educativo',
        ]);

        TipoLibro::create([
            'nombre_tipo'          => 'Enciclopedia',
        ]);

        TipoLibro::create([
            'nombre_tipo'          => 'Biografia',
        ]);
        
        TipoLibro::create([
            'nombre_tipo'          => 'Poesia',
        ]);

        TipoLibro::create([
            'nombre_tipo'          => 'Novela',
        ]);

        TipoLibro::create([
            'nombre_tipo'          => 'Monografías',
        ]);
        TipoLibro::create([
            'nombre_tipo'          => 'Biografías',
        ]);
        TipoLibro::create([
            'nombre_tipo'          => 'De consulta o referencia',
        ]);
        TipoLibro::create([
            'nombre_tipo'          => 'Recreativos',
        ]);
        
        Autor::create([
            'nombre_autor'          => 'Gabriel ',
            'apellido_autor'        => 'García Márquez',
        ]);
        Autor::create([
            'nombre_autor'          => 'Nikolai ',
            'apellido_autor'        => 'Gogol',
        ]);

        Autor::create([
            'nombre_autor'          => 'Anonimo ',
            'apellido_autor'        => ' ',
        ]);

        Autor::create([
            'nombre_autor'          => 'Chinua Achebe',
            'apellido_autor'        => 'Achebe',
        ]);

        Autor::create([
            'nombre_autor'          => 'Hans Christian',
            'apellido_autor'        => 'Andersen',
        ]);

        Autor::create([
            'nombre_autor'          => 'Joanne',
            'apellido_autor'        => 'Rowling',
        ]);

        Configuracion::create([
            'id'          => '1',
            'logo'        => 'Sin título-2-02',
            'nombre'        => 'Biblioteca Popular de Azara',
            'direccion'        => 'Calle Independencia y Maria de Haubier',
            'telefono'        => '+54 3758 558877',
            'email'        => 'bibliotecaazara@gmail.com',
            'semana_prestamo'        => '1',
            'control_prestamo'        => '1',
            'dia_mail'        =>  3,
        ]);
        
        Direccion::create([
            'calle'          => 'aa',
            'altura'          => 11,
            'pais_id'          => 1,
            'provincia_id'          => 1,
            'localidad_id'          => 1,
        ]);

        User::create([
            'name'        => 'admin',
            'apellido'        => 'admin',
            'dni'        => '41419543',
            'direccion_id'        => 1,
            'fecha_ingreso'        => '2020-11-26',
            'telefono'        => 543758558877,
            'email'        => 'admin@admin.com',
            'password'        => Hash::make('123456789'),
        ]);

        Estado::create([
            'nombre'          => 'prestado',
            'descripcion'        => 'El libro se encuentra prestado a un Lector miembro de la biblioteca!.',
        ]);
        
        Estado::create([
            'nombre'          => 'devuelto',
            'descripcion'        => 'El libro se encuentra devuelto por un Lector miembro de la biblioteca!.',
        ]);

        EstadoDevolucion::create([
            'nombre'          => 'bueno',
            'descripcion'        => 'El libro se entrego en un estado responsable y bien cuidado!.',
        ]);

        EstadoDevolucion::create([
            'nombre'          => 'medio',
            'descripcion'        => 'El libro se entrego de una manera un poco notoria!.',
        ]);

        EstadoDevolucion::create([
            'nombre'          => 'malo',
            'descripcion'        => 'La entrega del libro no muestra ningun tipo de responsabilidad!.',
        ]);
        
        TipoBaja::create([
            'nombre_baja'          => 'Desaparicion',
            'descripcion'        => 'El libro se encuentra desaparecido, no se sabe el responsable, por lo cual se descuenta del stock!.',
        ]);

        TipoBaja::create([
            'nombre_baja'          => 'Problema ambiental',
            'descripcion'        => 'Por problemas ambientales, se generaron perdidadas en ejemplares!.',
        ]);

        TipoBaja::create([
            'nombre_baja'          => 'Urto',
            'descripcion'        => 'Se generaron perdidas por un urto de una persona desconocida!.',
        ]);
        
        TipoIngreso::create([
            'nombre_ingreso'          => 'Compra',
            'descripcion'        => 'Se realizo una compra de material a un proveedor!.',
        ]);

        TipoIngreso::create([
            'nombre_ingreso'          => 'Donacion',
            'descripcion'        => 'Se reciben donaciones por parte de entidades!.',
        ]);

    }   
}
