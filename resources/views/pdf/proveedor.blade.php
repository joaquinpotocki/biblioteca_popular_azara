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
                <th id="fac">Listado de Proveedores</th>
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
                    <th>Nr</th>
                    <th>Nombre</th>
                    <th>Cuit</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Editoriales</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($proveedores as $prov)
                <tr>
                    <td>{{$prov->id}}</td>
                    <td>{{$prov->empresa}}</td>
                    <td width="15%">{{$prov->cuit}}</td>
                    <td>{{$prov->email}}</td>
                    <td>{{$prov->telefono}}</td>
                    <td>
                        @foreach ($prov->editoriales as $e)
                            {{$e->nombre_editorial}} <br>
                        @endforeach
                        <br>
                    </td>

                </tr>
                @endforeach
            </tbody>
            <tbody>
            </tbody>

        </table>
    </div>
</section>
@section('cantidad')
{{$cant}}
@endsection
@stop
