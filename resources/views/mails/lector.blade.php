<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Biblioteca</title>
</head>

{{-- @section('datos')

@endsection --}}
<body>
    <p id="encabezado">
        <b>Biblioteca Popular de Azara</b><br>
        Calle Independencia y Maria de Haubier<br>
        Telefono: +54 3758 558877<br>
        Email: bibliotecaazara@gmail.com
    </p>
    <hr>
    <p>
        Hola queriamos informarle que el/los siguientes libros deben ser entregados pronto:
    </p>
    @foreach ($movimientos as $mov)
        <p>
            <p>Tienen tiempo a devolver hasta: {{$mov->fecha_devolucion}} </p>
            @foreach ($mov->libro as $libro)
                {{$libro->nombre}}
            @endforeach
            <br>
        </p>
        
        
        <p>http://127.0.0.1:8000/movimientos/{{$mov->slug}}/confirmacion</p>
    @endforeach
    <div class="center">

        <br>
        <br>

    </div>   
</body>
</html>