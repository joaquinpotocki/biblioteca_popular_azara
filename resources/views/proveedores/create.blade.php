@extends('admin-lte.index')

@section('content')
<form class="form-group " method="POST" action="{{route("proveedores.store")}}">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5>
                Crear proveedor
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="form-group ">
                        <label for="cuit">Cuit</label>
                        <input type="text"  class="form-control  @error('cuit') is-invalid @enderror" id="cuit-number"
                            name="cuit" value="{{ old('cuit') }}" placeholder="Especifique el nombre de su cuit" required>
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
                            name="empresa" value="{{ old('empresa') }}" placeholder="Especifique el nombre de su empresa" required>
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
                            name="nombre_persona_contacto" value="{{ old('nombre_persona_contacto') }}" placeholder="Especifique su nombre de persona de contacto" required>
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
                            name="apellido_persona_contacto" value="{{ old('apellido_persona_contacto') }}" placeholder="Especifique su apellido de persona de contacto" required>
                        @error('apellido_persona_contacto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group ">
                        <label for="telefono">Telefono</label>
                        <input type="number" class="form-control  @error('telefono') is-invalid @enderror"
                            id="telefono" name="telefono" value="{{ old('telefono') }}"
                            placeholder="Especifique su telefono" required>
                        @error('telefono')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group ">
                        <label for="email">Email</label>
                        <input type="email" class="form-control  @error('email') is-invalid @enderror"
                            id="email" name="email" value="{{ old('email') }}"
                            placeholder="Especifique su email" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                
                <div class="col-3">
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
                </div>
                <div class="col-3">
                    <div class="form-group ">
                        <label for="pais_id" class=" ">Pais</label>
                        <select name="pais_id" id="pais_id" class=" form-control" required>
                            <option value="" selected disabled>--Seleccione--</option>
                            @foreach ($paises as $pais)
                            <option value="{{$pais->id}}">{{$pais->pais}}</option>
                            @endforeach
                        </select>
                        @error('pais_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group ">
                        <label for="provincia_id" class="">Provincia</label>
                        <select name="provincia_id" id="provincia_id" class=" form-control" disabled>
                            <option value="" selected disabled>--Seleccione--</option>
                        </select>
                        @error('provincia_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="localidad_id" class="">Localidad</label>

                        <select name="localidad_id" id="localidad_id" class="form-control" disabled>
                            <option value="" selected disabled>--Seleccione--</option>
                        </select>
                        @error('localidad_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group ">
                        <label for="direccion_postal">Direccion postal</label>
                        <input type="number" class="form-control  @error('direccion_postal') is-invalid @enderror" id="direccion_postal"
                            name="direccion_postal" min="0" value="{{ old('direccion_postal') }}" placeholder="Especifique su direccion postal"
                            required>
                        @error('direccion_postal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group ">
                        <label for="calle">Calle</label>
                        <input type="text" class="form-control  @error('calle') is-invalid @enderror" id="calle"
                            name="calle" value="{{ old('calle') }}" placeholder="Especifique su calle" required>
                        @error('calle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group ">
                        <label for="altura">Altura</label>
                        <input type="number" class="form-control  @error('altura') is-invalid @enderror" id="altura"
                            name="altura" value="{{ old('altura') }}" placeholder="Nº" required>
                        @error('altura')
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
                            placeholder="Ingrese las notas generales">{{ old('notas_generales') }}</textarea>
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
    $(document).ready(function(){
        $('#isbn').mask('000-0-00-000000-0');
        $('#cuit-number').mask('00-00000000-0');
    });
</script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js')}}"></script>

<script>
    $("#editorial").select2({
            placeholder: "Seleccione al menos una editorial"
    });
</script>

<script>
    $(document).ready(function(){
        $('#pais_id').change(function(){
            $('#provincia_id').removeAttr('disabled');
            var id = $(this).val();
            var url = "{{ route('paises.obtenerProvincias', ":id") }}" ;
            url = url.replace(':id' , id) ;
            $.get(url, function(data){
                var html_select = '<option value="" selected disabled>--Seleccione--</option>' ;
                for(var i = 0 ; i<data.length ; i++){
                     html_select += '<option value="'+data[i].id+'">'+data[i].provincia+'</option>' ;
                }
                 $('#provincia_id').html(html_select);
            });
        });
        $('#provincia_id').change(function(){
            $('#localidad_id').removeAttr('disabled');
            var id = $(this).val();
            var url = "{{ route('provincias.obtenerLocalidades', ":id") }}" ;
            url = url.replace(':id' , id) ;
            $.get(url, function(data){
                var html_select = '<option value="" selected disabled>--Seleccione--</option>' ;
                for(var i = 0 ; i<data.length ; i++){
                     html_select += '<option value="'+data[i].id+'">'+data[i].localidad+'</option>' ;
                }
                 $('#localidad_id').html(html_select);
            });
        });
    }) ;
</script>

@endpush
