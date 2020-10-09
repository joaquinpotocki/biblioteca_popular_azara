@extends('admin-lte.index')

@section('content')
<form class="form-group " method="POST" action="{{route("libros.store")}}">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5>
                Agregar un nuevo libro
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <div class="form-group ">
                        <label for="numero_serie">Numero de serie</label>
                        <input type="number" class="form-control  @error('numero_serie') is-invalid @enderror" id="numero_serie"
                            name="numero_serie" value="{{ old('numero_serie') }}" placeholder="Especifique el nombre de su numero de serie" required>
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
                            name="nombre" value="{{ old('nombre') }}" placeholder="Especifique el nombre de su libro" required>
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
                        <input type="number" class="form-control  @error('edicion') is-invalid @enderror" id="edicion"
                            name="edicion" value="{{ old('edicion') }}" placeholder="Especifique su nombre de persona de contacto" required>
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
                            <a role="button" type="button" href="{{route('genero_libros.create')}}" title="Nuevo genero"><i
                                    class="fas fa-plus-circle fa-md"></i></a>
                        </label>

                        <select class="form-control" name="genero_id" id="genero_libros" required>
                            <option value="" disabled selected>--Seleccione un genero_libros--</option>
                            @foreach($genero_libros as $genero_libro)
                            <option value="{{$genero_libro->id}}" @if(old('genero_id')==$genero_libro->id) selected
                                @endif>{{$genero_libro->genero_libros}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group ">
                        <label for="autores" class="">Autor</label>
                        <label for="autores">
                            <a role="button" type="button" href="{{route('autores.create')}}" title="Nuevo genero"><i
                                    class="fas fa-plus-circle fa-md"></i></a>
                        </label>

                        <select class="form-control" name="autor_id" id="autor" required>
                            <option value="" disabled selected>--Seleccione un autor--</option>
                            @foreach($autores as $autor)
                            <option value="{{$autor->id}}" @if(old('autor_id')==$autor->id) selected
                                @endif>{{$autor->nombre_autor}} {{$autor->apellido_autor}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group ">
                        <label for="editorials" class="">Editorial</label>
                        <label for="editorials">
                            <a role="button" type="button" href="{{route('editorials.create')}}" title="Nuevo genero"><i
                                    class="fas fa-plus-circle fa-md"></i></a>
                        </label>

                        <select class="form-control" name="editorial_id" id="editorial" required>
                            <option value="" disabled selected>--Seleccione un editorial--</option>
                            @foreach($editorials as $editorial)
                            <option value="{{$editorial->id}}" @if(old('editorial_id')==$editorial->id) selected
                                @endif>{{$editorial->nombre_editorial}}</option>
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

                        <select class="form-control" name="tipo_libro_id" id="tipo_libro" required>
                            <option value="" disabled selected>--Seleccione un tipo--</option>
                            @foreach($tipo_libros as $tipo_libro)
                            <option value="{{$tipo_libro->id}}" @if(old('tipo_libro_id')==$tipo_libro->id) selected
                                @endif>{{$tipo_libro->nombre_tipo}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group ">
                        <label for="stock_libro">Stock Inicial</label>
                        <input type="number" class="form-control  @error('stock_libro') is-invalid @enderror" id="stock_libro"
                            name="stock_libro" value="{{ old('stock_libro') }}" placeholder="Especifique su nombre de persona de contacto" required>
                        @error('stock_libro')
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
@endpush
