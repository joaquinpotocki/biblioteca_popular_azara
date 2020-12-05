@extends('layouts.pdf2')

@section('logo')
<a><img id="imagen" class="float-left rounded " src="{{public_path('images/'.$config->logo)}}"> </a>
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
{{-- <style>
    #fac {
        /*position: relative;*/
        float: right;
        margin-top: 1%;
        margin-left: -19%;
        margin-right: 0%;
        font-size: 10px;
    }
</style> --}}
<div>
    <table id="titulo">
        <thead>
            <tr>
                <th id="fac" align='center'>Listado de Ingresos a la Biblioteca </th>
            </tr>
            <tr>
                <th id="filtros">
                    {{$filtro}}
                </th>
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
                    <th>Fecha Ingreso</th>
                    <th>Libro/Editorial/Edicion</th>
                    <th>Cantidad</th>
                    <th>Proveedor</th>
                    <th>Tipo de Ingreso</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($ingreso as $ingre)
                <tr>
                    <td>{{$ingre->fecha_ingreso}}</td>
                    <td width="25%">{{$ingre->libro->nombre}} - {{$ingre->libro->editoriales->nombre_editorial}} - {{$ingre->libro->edicion}}</td>
                    <td align='center'>{{$ingre->cantidad}}</td>
                    <td align='center'>{{$ingre->proveedor->empresa}}</td>
                    <td align='center'>{{$ingre->tipo_ingresos->nombre_ingreso}}</td>
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
