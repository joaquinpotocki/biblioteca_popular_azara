@extends('admin-lte.index')

@section('content')
<form class="form-group " method="POST" action="{{route("proveedores.update",$proveedor->id)}}">
    @method("PUT")
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5>
                Edicion de proveedor
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="form-group ">
                        <label for="cuit">Cuit</label>
                        <input type="text" class="form-control  @error('cuit') is-invalid @enderror" id="cuit"
                            name="cuit" value="{{ old('cuit') ?? $proveedor->cuit}}" placeholder="Especifique el nombre de su cuit" required>
                        @error('cuit')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group ">
                        <label for="empresa">Empresa</label>
                        <input type="text" class="form-control  @error('empresa') is-invalid @enderror" id="empresa"
                            name="empresa" value="{{ old('empresa') ?? $proveedor->empresa}}" placeholder="Especifique el nombre de su empresa" required>
                        @error('empresa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group ">
                        <label for="nombre_persona_contacto">Nombre persona contacto</label>
                        <input type="text" class="form-control  @error('nombre_persona_contacto') is-invalid @enderror" id="nombre_persona_contacto"
                            name="nombre_persona_contacto" value="{{ old('nombre_persona_contacto') ?? $proveedor->nombre_persona_contacto}}" placeholder="Especifique su nombre de persona de contacto" required>
                        @error('nombre_persona_contacto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group ">
                        <label for="apellido_persona_contacto">Apellido persona contacto</label>
                        <input type="text" class="form-control  @error('apellido_persona_contacto') is-invalid @enderror" id="apellido_persona_contacto"
                            name="apellido_persona_contacto" value="{{ old('apellido_persona_contacto') ?? $proveedor->apellido_persona_contacto}}" placeholder="Especifique su apellido de persona de contacto" required>
                        @error('apellido_persona_contacto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group ">
                        <label for="telefono">Telefono</label>
                        <input type="number" class="form-control  @error('telefono') is-invalid @enderror"
                            id="telefono" name="telefono" value="{{ old('telefono') ?? $proveedor->telefono}}"
                            placeholder="Especifique su telefono" required>
                        @error('telefono')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group ">
                        <label for="email">Email</label>
                        <input type="email" class="form-control  @error('email') is-invalid @enderror"
                            id="email" name="email" value="{{ old('email') ?? $proveedor->email}}"
                            placeholder="Especifique su email" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group ">
                        <label for="direccion_postal">Direccion postal</label>
                        <input type="number" class="form-control  @error('direccion_postal') is-invalid @enderror" id="direccion_postal"
                            name="direccion_postal" min="0" value="{{ old('direccion_postal') ?? $proveedor->direccion_postal}}" placeholder="Especifique su direccion postal"
                            required>
                        @error('direccion_postal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="form-group ">
                        <label for="nombre">Notas generales</label>
                        <textarea name="notas_generales" id="notas_generales" cols="30" rows="5" class="form-control"
                            placeholder="Ingrese las notas generales">{{ old('notas_generales') ?? $proveedor->notas_generales}}</textarea>
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
