@extends('admin-lte.index')

@section('content')
<form class="form-group " method="POST" enctype="multipart/form-data" action="{{route("libros.update",$libro->id)}}" >
    @csrf
    @method("PUT")
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5>
                Editar un libro
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <div class="form-group ">
                        <label for="numero_serie">ISBN</label>
                        <input type="text" class="form-control  @error('numero_serie') is-invalid @enderror" id="isbn"
                            name="numero_serie" value="{{ old('numero_serie') ?? $libro->numero_serie}}" placeholder="Especifique el numero_serie de su libro" required>
                        @error('numero_serie')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group ">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control  @error('nombre') is-invalid @enderror" id="nombre"
                            name="nombre" value="{{old('nombre') ?? $libro->nombre}}" placeholder="Especifique el nombre de su libro" required>
                        @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group ">
                        <label for="edicion">Edicion</label>
                        <input type="text" class="form-control  @error('edicion') is-invalid @enderror" id="edicion"
                            name="edicion" value="{{ old('edicion') ?? $libro->edicion}}" placeholder="Especifique su nombre de persona de contacto" required>
                        @error('edicion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                
                <div class="col-4">
                    <div class="form-group ">
                        <label for="genero_libros" class="">Genero</label>
                        <label for="genero_libros">
                            <a role="button" type="button" href="{{route('genero_libros.create')}}" title="Nuevo genero"><i class="fas fa-plus-circle fa-md"></i></a>
                        </label>
                        <select class="seleccion form-control mi-selector" type="hidden" name="genero_id" id="genero_libros" required>
                            <option value="" disabled selected>--Seleccione un genero--</option>
                            @foreach($genero_libros as $genero_libro)
                            <option value="{{$genero_libro->id}}" @if($genero_libro != null)
                                @if($genero_libro->id==$genero_libro->id) selected
                                @endif @endif>{{$genero_libro->genero_libros}}</option>
                            @endforeach
                        </select>
                        {{-- DE ACA ME GUIE PARA EL FOREACH ANTERIOR --}}
                        {{-- <option value="{{$tecnico->id}}" @if($incidencia->tecnico != null)
                            @if($incidencia->tecnico->id==$tecnico->id) selected
                            @endif @endif >{{$tecnico->apellidos . ' ' . $tecnico->nombres}} - {{$tecnico->cuil}}
                        </option> --}}
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group ">
                        <label for="autores" class="">Autor</label>
                        <label for="autores">
                            <a role="button" type="button" href="{{route('autores.create')}}" title="Nuevo autor"><i
                                    class="fas fa-plus-circle fa-md"></i></a>
                        </label>
                        <select class="form-control mi-selector" name="autor_id" id="autor" required>
                            <option value="" disabled selected>--Seleccione un autor--</option>
                            
                            @foreach($autores as $autor)
                            <option value="{{$autor->id}}" @if($autor != null)
                                @if($autor->id==$autor->id) selected
                                @endif @endif>{{$autor->nombre_autor}} {{$autor->apellido_autor}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group ">
                        <label for="editorials" class="">Editorial</label>
                        <label for="editorials">
                            <a role="button" type="button" href="{{route('editorials.create')}}" title="Nuevo editorials"><i
                                    class="fas fa-plus-circle fa-md"></i></a>
                        </label>
                        <select class="form-control mi-selector" name="editorial_id" id="editorials" required>
                            <option value="" disabled selected>--Seleccione un editorials--</option>
                            
                            @foreach($editorials as $editorials)
                            <option value="{{$editorials->id}}" @if($editorials != null)
                                @if($editorials->id==$editorials->id) selected
                                @endif @endif>{{$editorials->nombre_editorial}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group ">
                        <label for="tipo_libros" class="">Tipo de libro</label>
                        <label for="tipo_libros">
                            <a role="button" type="button" href="{{route('tipo_libros.create')}}" title="Nuevo genero"><i
                                    class="fas fa-plus-circle fa-md"></i></a>
                        </label>

                        <select class="form-control mi-selector" name="tipo_libro_id" id="tipo_libro" required>
                            <option value="" disabled selected>--Seleccione un tipo--</option>
                            @foreach($tipo_libros as $tipo_libro)
                            <option value="{{$tipo_libro->id}}" @if($tipo_libro != null)
                                @if($tipo_libro->id==$tipo_libro->id) selected
                                @endif @endif>{{$tipo_libro->nombre_tipo}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>                
                <div class="col-4">
                    <div class="form-group ">
                        <label for="stock_libro">Stock</label>
                        <input type="text" class="form-control  @error('stock_libro') is-invalid @enderror" id="stock_libro"
                            name="stock_libro" value="{{ old('stock_libro') ?? $libro->stock_libro}}" placeholder="Especifique su nombre de persona de contacto" disabled>
                        @error('stock_libro')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group ">
                        <label for="imagen">Imagen</label>
                        <input type="file" class="form-control  @error('imagen') is-invalid @enderror" id="imagen"
                            name="imagen" accept="image/*" value="{{ old('imagen') }}" placeholder="Especifique su nombre de persona de contacto" required>
                        @error('imagen')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer float">
            <div class="float-right">
                <a href="javascript:history.back()" class="btn btn-dark"><i class="fa fa-times"></i> Cancelar </a>
                <button type="submit" class="btn btn-primary "><i class="fa fa-check"></i> Guardar</button>
            </div>
        </div>
    </div>
    @csrf
</form>
@endsection
@push('scripts')

<script>
    jQuery(document).ready(function($){
        $(document).ready(function() {
            $('.mi-selector').select2();
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('#isbn').mask('000-0-00-000000-0');
        $('#cuit-number').mask('00-00000000-0');
    });
</script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js')}}"></script>

@endpush
