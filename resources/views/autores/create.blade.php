@extends('admin-lte.index')

@section('content')
<form class="form-group " method="POST" action="{{route("autores.store")}}">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5>
                Agregar un nuevo autor
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="form-group ">
                        <label for="apellido_autor">Apellido del autor</label>
                        <input type="text" class="form-control  @error('apellido_autor') is-invalid @enderror" id="apellido_autor"
                            name="apellido_autor" value="{{ old('apellido_autor') }}" placeholder="Especifique el apellido de su numero de serie" required>
                        @error('apellido_autor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group ">
                        <label for="nombre_autor">Nombre del autor</label>
                        <input type="text" class="form-control  @error('nombre_autor') is-invalid @enderror" id="nombre_autor"
                            name="nombre_autor" value="{{ old('nombre_autor') }}" placeholder="Especifique el nombre de su numero de serie" required>
                        @error('nombre_autor')
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
