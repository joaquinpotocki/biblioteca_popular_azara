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
                    <th>Fecha Prestamo</th>
                    <th>Lector</th>
                    <th></th> 
                    <th>Libro</th>
                    <th>Estado</th>
                    <th>Fecha de devolucion</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($movimiento as $mov)
                <tr>
                    <td>{{$mov->fecha_prestamo}}</td>
                    <td align='center'>{{$mov->lector->nombres}} {{$mov->lector->apellidos}}</td>
                    <td align='center'>
                        <td>
                            @foreach ($mov->libro as $p)
                                <span class="badge badge-pill">
                                    {{$p->nombre}}
                                </span>
                            @endforeach
                        </td>
                    </td>
                    <td align='center'>{{$mov->estado->nombre}}</td>
                    <td align='center'>{{$mov->fecha_devolucion}}</td>
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
