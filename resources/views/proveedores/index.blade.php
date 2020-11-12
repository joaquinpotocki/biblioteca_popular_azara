@extends('admin-lte.index')

@section('content')


<!-- The rest of the form code -->


<div class="card">
    <div class="card-header">Proveedores
        <a class="btn btn-primary btn-sm float-right text-white" href="{{route('proveedores.create')}}">Nuevo</a>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-striped table-bordered dataTable">
            
            <a class="btn btn-primary btn-sm" href="{{ route('proveedor.pdf') }}">Pdf</a>
            <thead>
                <tr>
                    <th scope="col">Cuit</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Direccion postal</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Editoriales con las que trabaja</th>
                    
                    <th scope="col" class="text-right">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $proveedor)
                <tr>
                    <td>{{$proveedor->cuit}}</td>
                    <td>{{$proveedor->empresa}}</td>
                    <td>{{$proveedor->direccion_postal}}</td>
                    <td>{{$proveedor->telefono}}</td>
                    <td>
                        @foreach ($proveedor->editoriales as $p)
                            <span class="badge badge-pill">
                                {{$p->nombre_editorial}}
                            </span>
                        @endforeach
                    </td>
                    
                    <td class="text-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('proveedores.show', $proveedor->id) }}">Ver</a>
                        <a class="btn btn-light btn-sm" href="{{ route('proveedores.edit', $proveedor->id) }}">Editar</a>
                        <a class="btn btn-danger btn-sm text-white delete" val-palabra={{$proveedor->id}}>Borrar</a>
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

    url2="{{route('proveedores.destroy',":id")}}";
    url2=url2.replace(':id',id);

    $('#formDelete').attr('action',url2);
    $('#confirmDelete').modal('show');
    });

    $('#formDelete').on('submit',function(){
    $('#ok_delete').text('Eliminando...')
    });
</script>
<script>
    $(document).ready(function(){
    $('#birth-date').mask('00/00/0000');
    $('#phone-number').mask('0000-0000');
    });
</script>
@endpush
