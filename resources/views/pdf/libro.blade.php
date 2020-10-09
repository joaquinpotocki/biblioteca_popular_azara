@extends('layouts.pdf2')

@section('logo')
<a><img id="imagen" class="float-left rounded " src="{{public_path('img/').$config->logo}}"> </a>
@endsection

@section('datos')
<p id="encabezado">
    <b>{{$config->nombre}}</b><br>
    {{$config->direccion}}<br>
    Telefono:{{$config->telefono}}<br>
    Email:{{$config->email}}
</p>
@endsection

@section('content')
@section('content')

<div>
    <table id="titulo">
        <thead>
            <tr>
                <th id="fac">Listado de Libros</th>
            </tr>
        </thead>
        <tbody>
            {{--
            <tr>

                <th><p id="cliente"> Desde: <br>

                Hasta: </p></th>

            </tr> --}}

        </tbody>
    </table>
</div>
</section>
<br>
<section>
    <div>



    </div>
</section>
<br>
<section>
    <div>
        <table id="lista">
            <thead>
                <tr id="fa">
                    <th>Numero de serie</th>
                    <th>Nombre</th>
                    <th>Autor</th>
                    <th>Editorial</th>
                    <th>Cantidad</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($libros as $libro)
                <tr>
                    <td  style="">{{$libro->numero_serie}}</td>
                    <td  style="">{{$libro->nombre}}</td>
                    <td  style="">{{$libro->autor->nombre_autor}} {{$libro->autor->apellido_autor}}</td>
                    <td  style=""> {{$libro->editoriales->nombre_editorial}}</td>
                    <td  style="text-align: center">{{$libro->stock_libro}}</td>
                    
                </tr>
                @endforeach
            </tbody>
           
        </table>
    </div>
</section>
@section('cantidad')
{{$cant}}
@endsection
@stop
