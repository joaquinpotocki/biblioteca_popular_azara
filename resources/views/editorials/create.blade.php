@extends('admin-lte.index')

@section('content')
<form class="form-group " method="POST" action="{{route("editorials.store")}}">
    @csrf
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5>
                Agregar una nueva editorial
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="form-group ">
                        <label for="nombre_editorial">Editorial</label>
                        <input type="text" class="form-control  @error('nombre_editorial') is-invalid @enderror" id="nombre_editorial"
                            name="nombre_editorial" value="{{ old('nombre_editorial') }}" placeholder="Especifique el nombre de la editorial" required>
                        @error('nombre_editorial')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                {{-- <div class="col-3">
                    <div class="form-group ">
                        <label for="editorial" class="">Editoriales</label>
                        <label for="agregar_editorial">
                            <a role="button" type="button" href="{{route('editorials.create')}}" title="Nuevo editorial"><i
                                    class="fas fa-plus-circle fa-md"></i></a>
                        </label>
                        <select class="form-control" name="editorial_id[]"  id="editorial" multiple required>
                            @foreach($editorials as $editorial)
                            <option value="{{$editorial->id}}" @if(old('editorial_id')==$editorial->id) selected
                                @endif>{{$editorial->nombre_editorial}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
                <div class="col-3">
                    <div class="form-group ">
                        <label for="proveedor" class="">proveedores</label>
                        <label for="agregar_proveedor">
                            <a role="button" type="button" href="{{route('proveedores.create')}}" title="Nuevo proveedor"><i
                                    class="fas fa-plus-circle fa-md"></i></a>
                        </label>
                        <select class="form-control" name="proveedor_id[]" id="proveedor" multiple required>
                            @foreach($proveedores as $proveedor)
                            <option value="{{$proveedor->id}}" @if(old('proveedor_id')==$proveedor->id) selected
                                @endif>{{$proveedor->empresa}}</option>
                            @endforeach
                        </select>
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
    $("#proveedor").select2({
            placeholder: "Seleccione al menos un proveedor"
    });
</script>
@endpush
