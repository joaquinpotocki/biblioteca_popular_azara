@extends('admin-lte.index')

@section('content')

<div class="card">
    <div class="card-header">Tabla de ingresos
        <a class="btn btn-primary btn-sm float-right text-white" href="{{route('ingreso_libros.create')}}">Nuevo</a>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-striped table-bordered dataTable">
            <thead>
                <tr>
                    <th scope="col">Fecha de Ingreso</th>
                    <th scope="col">Libro/editorial</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Tipo de Ingreso</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ingreso_libros as $ingreso_libro)
                <tr>
                    <td>{{$ingreso_libro->fecha_ingreso}}</td>
                    <td>{{$ingreso_libro->libro->nombre}} - {{$ingreso_libro->libro->editoriales->nombre_editorial}}</td>
                    <td>{{$ingreso_libro->cantidad}}</td>
                    <td>{{$ingreso_libro->proveedor->empresa}}</td>
                    <td>{{$ingreso_libro->tipo_ingresos->nombre_ingreso}}</td>
                    <td class="text-right">
                        <a class="btn btn-danger btn-sm text-white delete" val-palabra={{$ingreso_libro->id}}>Borrar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<div id="confirmDelete" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Confirmacion</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">¿Esta seguro que desea borrarlo?</h4>
            </div>
            <div class="modal-footer">
                <form id="formDelete" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    {{-- Paso el id de la materia  aborrar en materia_delete--}}
                    <button type="submit" name="ok_delete" id="ok_delete" class="btn btn-danger">SI Borrar</button>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">NO Borrar</button>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')

{{-- Script para eliminar --}}
<script>
    $(document).on('click', '.delete', function(){
    id = $(this).attr('val-palabra');

    url2="{{route('ingreso_libros.destroy',":id")}}";
    url2=url2.replace(':id',id);

    $('#formDelete').attr('action',url2);
    $('#confirmDelete').modal('show');
    });

    $('#formDelete').on('submit',function(){
    $('#ok_delete').text('Eliminando...')
    });
</script>
@endpush