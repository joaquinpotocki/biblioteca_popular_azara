<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Biblioteca</title>
</head>
<body>
    <p id="encabezado">
        <b>Biblioteca Popular de Azara</b><br>
        Calle Independencia y Maria de Haubier<br>
        Telefono: +54 3758 558877<br>
        Email: bibliotecaazara@gmail.com
    </p>
    <hr>
    <p>
        Hola {{$nombre}} queriamos informarle que el/los siguientes libros del genero <b>{{$generolibro}}</b> ingresaron:
    </p>
    {{-- @foreach ($libros as $lib) --}}
        <p>
            
                {{$libros->nombre}}   
            
            <br>
        </p>
    {{-- @endforeach --}} 
</body>
</html>