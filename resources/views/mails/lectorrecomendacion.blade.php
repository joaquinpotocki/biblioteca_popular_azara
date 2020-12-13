<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Biblioteca</title>
</head>
<body>
    <p>
        Hola {{$nombre}} queriamos informarle que el/los siguientes libros del genero {{$generolibro}} ingresaron:
    </p>
    {{-- @foreach ($libros as $lib) --}}
        <p>
            
                {{$libros->nombre}}   
            
            <br>
        </p>
    {{-- @endforeach --}}
    
</body>
</html>