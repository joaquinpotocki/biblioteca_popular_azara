@extends('admin-lte.index')

@section('content')

<form class="form-group " method="POST" action="{{route("baja_libros.store")}}">
    @csrf
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5>
                Agregar una nueva Baja
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <div class="form-group ">
                        <label for="" class="">Fecha de la Baja</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                {{-- <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span> --}}
                            </div>
                            <input type="date" name="fecha_baja" class="form-control" required
                                value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                min="{{ Carbon\Carbon::now()->subDay()->format('Y-m-d') }}"
                                max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" id="">
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group ">
                        <label for="tipo_baja" class="">Tipo de baja</label>
                        <label for="tipo_baja">
                            <a role="button" type="button" href="{{route('tipo_bajas.create')}}" title="Nueva baja"><i
                                    class="fas fa-plus-circle fa-md"></i></a>
                        </label>

                        <select class="form-control" name="tipo_baja_id" id="tipo_baja_id" required>
                            <option value="" disabled selected>--Seleccione un tipo de baja por favor--</option>
                            @foreach($tipo_bajas as $tipo_baja)
                            <option value="{{ $tipo_baja->id}}" @if(old('tipo_baja_id')== $tipo_baja->id) selected
                                @endif>{{ $tipo_baja->nombre_baja}}</option> 
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group ">
                        <label for="nombre">Descripcion de la baja</label>
                        <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control"
                            placeholder="Ingrese las notas generales">{{ old('descripcion') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    @csrf
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="row">
                <div class="col-4">
                    <div class="form-group ">
                        <label for="libros" class="">Libro</label>
                        <label for="libros">
                            <a role="button" type="button" href="{{route('libros.create')}}" title="Nuevo libro"><i
                                    class="fas fa-plus-circle fa-md"></i></a>
                        </label>

                        <select class="form-control" name="libros_select_id" id="libros_select_id" required>
                            <option value="" disabled selected>--Seleccione un libro por favor--</option>
                            @foreach($libros as $libro)
                            <option value="{{$libro->id}}" @if(old('libro_id')==$libro->id) selected
                                @endif>{{$libro->nombre}} - {{$libro->edicion}} - {{$libro->editoriales->nombre_editorial}}</option> 
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group ">
                        <label for="cantidad">Cantidad a dar de baja</label>
                        <input type="number" class="form-control  @error('cantidad') is-invalid @enderror" id="cantidad"
                            name="cantidad" value="{{ old('cantidad') }}" placeholder="Especifique la cantidad de ingreso" >
                        @error('cantidad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <a href="#" id="addRow" class="btn btn btn-primary"><i class="fa fa-plus"></i> Agregar</a>
                </div>
            </div>
            
        </div>
        <div class="card-body">
            <table id="tabla_ingreso_id" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Libro/editorial</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="card-footer float">
            <div class="float-right">
                <a href="javascript:history.back()" class="btn btn-dark"><i class="fa fa-times"></i> Cancelar </a>
                <button type="submit" class="btn btn-primary "><i class="fa fa-check"></i> Guardar</button>
            </div>
        </div>
    </div>
</form>
@endsection
@push('scripts')
<script>
    $('#addRow').on('click',function(){
        addRow();
    });

    function addRow(){
        //Obtener los valores de los inputs
        libro_select_id = $('#libros_select_id').val() ;
        libro = $("#libros_select_id option:selected").text();
        cantidad = $("#cantidad").val();

        if(libro_select_id != null ){
            if(cantidad > 0){
                    var fila = '<tr> <td><input type="hidden" name="libros_select_id[]" value="'+libro_select_id+'">'+libro+'</td>'+
                                '<td style="text-align:right;"><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+' </td>'+
                                '<td style="text-align:center;"><a href="#" class="btn btn-danger btn-xs remove"><i class="fas fa-minus"></i></a></td>' +
                                '</tr>' ;

                    $('tbody').append(fila) ;
                    limpiar();
            }else{
                swal({
                        title: "Error",
                        text: "Ingrese una cantidad valida y mayor a 0",
                        icon: "error",
                    });
            }
        }else{
            swal({
                        title: "Error",
                        text: "Seleccione un producto",
                        icon: "error",
                    });
        }

    }

    function limpiar(){
		$("#cantidad").val("");
        $("#libro_select_id").val(null).trigger("change");

	}

    $('body').on('click', '.remove',function(){
        // var last=$('tbody tr').length;
        // if(last==1){
        //     alert("No es posible eliminar la ultima fila");
        // }
        // else{
            $(this).parent().parent().remove();
        //}

    });
</script>
@endpush    