@extends('admin-lte.index')

@section('content')
<form class="form-group " method="POST" action="{{route("genero_libros.update",$genero_libro->id)}}">
    @method("PUT")
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5>
                Editar un genero
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="form-group ">
                        <label for="genero_libros">Genero</label>
                        <input type="text" class="form-control  @error('genero_libros') is-invalid @enderror" id="genero_libros"
                            name="genero_libros" value="{{ old('genero_libros') ?? $genero_libro->genero_libros}}" placeholder="Especifique el nombre de su numero de serie" required>
                        @error('genero_libros')
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
