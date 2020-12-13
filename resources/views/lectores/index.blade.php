@extends('admin-lte.index')

@section('content')

<div class="card">
    <div class="card-header">Lectores
        
        <a class="btn btn-primary btn-sm float-right text-white" href="{{route('lectores.create')}}">Nuevo</a>

    </div>
    <div class="card-body">
        <table id="datatable" class="table table-striped table-bordered dataTable">
            <thead>
                <tr>
                    <th scope="col">Nº lector</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Cuil</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="text-right">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lectores as $lector)
                <tr>
                    <td>{{$lector->numero_lectores}}</td>
                    <td>{{$lector->nombres}}</td>
                    <td>{{$lector->apellidos}}</td>
                    <td>{{$lector->sexo}}</td>
                    <td>{{$lector->cuil}}</td>
                    <td>{{$lector->telefono}}</td>
                    <td>{{$lector->email}}</td>
                    <td class="text-right">
                        {{-- @if (Auth::user()->hasRole('atencion') || Auth::user()->hasRole('admin')) --}}
                        <a class="btn btn-primary btn-sm" href="{{ route('lectores.show', $lector->id) }}">Ver</a>
                        <a class="btn btn-light btn-sm" href="{{ route('lectores.edit', $lector->id) }}">Editar</a>
                        <a class="btn btn-danger btn-sm text-white delete" val-palabra={{$lector->id}}>Borrar</a>
                        {{-- @endif --}}
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

    url2="{{route('lectores.destroy',":id")}}";
    url2=url2.replace(':id',id);

    $('#formDelete').attr('action',url2);
    $('#confirmDelete').modal('show');
    });

    $('#formDelete').on('submit',function(){
    $('#ok_delete').text('Eliminando...')
    });
</script>
@endpush
