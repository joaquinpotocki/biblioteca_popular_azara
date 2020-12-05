@extends('admin-lte.index')

@section('content')

<div class="card">
    <div class="card-header">Usuarios
        <a class="btn btn-primary btn-sm float-right text-white" href="{{route('usuarios.create')}}">Nuevo</a>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-head-fixed text-nowrap dataTable dtr-inline table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Roles</th>
                    <th>Permisos</th>
                    <th class="text-right">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name }} {{ $usuario->apellido }} </td>
                    <td>
                        @foreach ($usuario->roles as $rol)
                        <span class="badge badge-pill badge-light">{{ $rol->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($usuario->permissions as $permiso)
                        <span class="badge badge-pill badge-light">{{ $permiso->name }}</span>
                        @endforeach
                    </td>
                    <td class="text-right" style="">
                        @if (Auth::user()->hasRole('admin'))
                        @if ($usuario->id != Auth::id())
                        <a class="btn btn-light btn-sm" href="{{ route('usuarios.edit', [$usuario->id]) }}">Editar</a>
                        @endif
                        @endif
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


@endsection
@push('scripts')

{{-- Script para eliminar --}}
{{-- <script>
    $(document).on('click', '.delete', function(){
    id = $(this).attr('val-palabra');

    url2="{{route('partes.destroy',":id")}}";
    url2=url2.replace(':id',id);

    $('#formDelete').attr('action',url2);
    $('#confirmDelete').modal('show');
    });

    $('#formDelete').on('submit',function(){
    $('#ok_delete').text('Eliminando...')
    });
</script> --}}
@endpush