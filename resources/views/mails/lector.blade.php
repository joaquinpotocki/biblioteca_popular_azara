<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Biblioteca</title>
</head>
<body>
    <p>
        Hola {{$nombre}} queriamos informarle que el/los siguientes libros deben ser entregados pronto:
    </p>
    @foreach ($movimientos as $mov)
        <p>
            @foreach ($mov->libro as $libro)
                {{$libro->nombre}}
            @endforeach
            <br>
        </p>
        <p>http://127.0.0.1:8000/movimientos/{{$mov->id}}/confirmacion</p>
    @endforeach
    
</body>
</html>