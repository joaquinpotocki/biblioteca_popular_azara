@extends('admin-lte.index')


@section('content')
<div class="content-fluid">
    <div class="row  justify-content-center">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3>Registros de Auditoria</h3>
                </div>
                <div class="card-body box-profile">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Tabla</label>
                            <p>{{$tabla}}</p>
                        </div>
                        <div class="col-md-4">
                            <label for="">Id</label>
                            <p>{{$auditoria->auditable_id}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Usuario</label>
                            <p>{{$auditoria->user->apellido}} {{$auditoria->user->name}}</p>
                        </div>
                        <div class="col-md-4">
                            <label for="">Accion</label>
                            <p>{{ strtoupper($auditoria->event) }}</p>
                        </div>
                        <div class="col-md-4">
                            <label for="">Fecha y Hora</label>
                            <p>{{$auditoria->created_at->format('d/m/Y H:i:s')}}</p>
                        </div>
                    </div>

                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Campos</th>
                                <th>Datos Actuales</th>
                                <th>Datos Historicos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($auditoria->getModified() as $attribute => $modified)

                            <tr>
                                <td>
                                    {{$attribute}}
                                </td>

                                <td>
                                    @if(!empty($auditoria->new_values))
                                    {{$auditoria->new_values[$attribute]}}
                                    @else
                                    -
                                    @endif
                                </td>

                                <td>
                                    @if(!empty($auditoria->old_values))
                                    {{$auditoria->old_values[$attribute]}}
                                    @else
                                    -
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            {{-- @foreach ($auditoria->new_values as  $modified)
                                <tr>
                                    <td>
                                        {{$modified}}
                            </td>
                            </tr>
                            @endforeach --}}

                            {{-- @for ($i = 0; $i < sizeof($auditoria->getModified()); $i++)
                                <tr>
                                    <td>{{$auditoria->getModified()}}</td>
                            </tr>
                            @endfor --}}

                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <a href="javascript:history.back()" class="btn btn-primary btn-sm">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection