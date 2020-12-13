<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta de Materia Primas</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('admin_panel/plugins/select2/css/select2.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin_panel/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin_panel/dist/css/adminlte.min.css') }}">
</head>
<header>
    

<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-12">
                <ul class="nav nav-pills">
                    <h1>Notificacion</h1>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <dl class="row" style="margin-left: 1%">
                        <dt class="col-sm-3">Necesitamos su confirmacion para los prestamos, ya que, le quedan tres dias para que se termine su plazo.</dt>
                    {{-- @foreach ($movimientos->libro as $p)
                        <span class="badge badge-pill">
                            {{$p->nombre}}
                        </span>
                    @endforeach --}}

                    {{-- <dd>{{$movimientos->fecha_prestamo}}</dd> --}}
                    </dl>
                    {{-- <dl class="row" style="margin-left: 1%">
                        <dt class="col-sm-3">Email</dt>
                        <dd class="col-sm-8 text-muted">{{ $lector->email }}</dd>
                    </dl> --}}
                    <td class="text-right">
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-success btn-sm" href="{{ route('movimientos.confirmo',$movimiento) }}">confirmar</a>
                        </div>
                    </td>
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->

        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

</header>