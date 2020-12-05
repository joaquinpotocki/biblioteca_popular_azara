@extends('admin-lte.index')

@section('content')



<div class="card">
    <div class="card-header">
        <h3>Configuracion del Sistema</h3>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">General</a>
            </li>
        </ul>
        
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <br>
                <div class="row d-flex justify-content-end">
                    <a href="#" id="editar">Editar <i class="fal fa-edit"></i></a>
                </div>
                <h3 class="card-title">
                    <i class="fas fa-edit">  Semanas de entrega</i>
                </h3>
                <br>
                <br>
                <form class="form-group " method="POST" action="{{route('configuracion.update')}}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    <div class="form-group ">
                        <label for="" class="">Semana prestamo</label>
                        <div class="input-group">
                            <select class="form-control" name="semana_prestamo" id="semana_prestamo" disabled>
                                <option value=1>UNA SEMANA</option> 
                                <option value=2>DOS SEMANAS</option>
                                <option value=3>TRES SEMANAS</option>
                                <option value=4>CUATRO SEMANAS</option>
                                <option value=5>CINCO SEMANAS</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <br>
                    <h3 class="card-title">
                        <i class="fas fa-file-pdf">  Reporte</i>
                    </h3>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="">Nombre de la Empresa</label>
                        <input type="text" disabled class="form-control" name="nombre" id="nombre"
                            value="{{$config->nombre}}">
                    </div>
                    <div class="form-group">
                        <label for="">Direccion de la Empresa</label>
                        <input type="text" disabled class="form-control" name="direccion" id="direccion"
                            value="{{$config->direccion}}">
                    </div>
                    <div class="form-group">
                        <label for="">Telefono</label>
                        <input type="text" disabled class="form-control" name="telefono" id="telefono"
                            value="{{$config->telefono}}">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" disabled class="form-control" name="email" id="email"
                            value="{{$config->email}}">
                    </div>
                    <div class="form-group">
                        <label for="">Logo de la Empresa</label>
                        <div class="row justify-content-center">
                            <img src="{{asset('images/'.$config->logo)}}" alt="" width="80" height="50">
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <div id="preview">

                            </div>
                        </div>
                        <br>
                        <input type="file" disabled class="" id="logoEmpresa" name="logo">
                    </div>
                    <div class="row justify-content-end">
                        <button type="submit" class="btn btn-success btn-sm" disabled
                            id="actualizar">Actualizar</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>
    $('#editar').click(function(){
        $('#semana_prestamo').prop('disabled', false);
        $('#nombre').prop('disabled', false);
        $('#direccion').prop('disabled', false);
        $('#telefono').prop('disabled', false);
        $('#email').prop('disabled', false);
        $('#logoEmpresa').prop('disabled', false);
        $('#actualizar').prop('disabled', false);
    });
</script>

{{-- <script>
    $('#editarComprobante').click(function(){
        $('.editable ').attr("contenteditable" , "true");
    });

</script> --}}

<script>
    @if(session('confirmar'))
                Confirmar.fire() ;
            @elseif(session('cancelar'))
                Cancelar.fire();
            @elseif(session('borrado'))
                Borrado.fire();
            @endif
</script>

<script>
    //cargar imagen local de forma dinamica
        document.getElementById("logoEmpresa").onchange = function(e) {
                // Creamos el objeto de la clase FileReader
                let reader = new FileReader();

                // Leemos el archivo subido y se lo pasamos a nuestro fileReader
                reader.readAsDataURL(e.target.files[0]);

                // Le decimos que cuando este listo ejecute el código interno
                reader.onload = function(){
                    let preview = document.getElementById('preview'),
                    image = document.createElement('img');
                    image.src = reader.result;
                    image.height='50';
                    image.width='80';
                    preview.innerHTML = '';
                    var html = 'Nuevo logo: ' ;
                    preview.append(html);
                    preview.append(image);
                };
        }
</script>

<script>
    $(document).ready(function () {
  $('#myTab a[href="#{{ old('tab') }}"]').tab('show')
});
</script>
{{-- <script>
    @if($errors->any() )
            $(function(){
                $('#crearComprobante').modal('show');
            });
        @endif
</script> --}}

{{-- Script para eliminar --}}
<script>
    $(document).on('click', '.delete', function(){
    id = $(this).attr('val-palabra');

    url2="{{route('tipo_ingresos.destroy',":id")}}";
    url2=url2.replace(':id',id);

    $('#formDelete').attr('action',url2);
    $('#confirmDelete').modal('show');
    });

    $('#formDelete').on('submit',function(){
    $('#ok_delete').text('Eliminando...')
    });
</script>
@endpush
{{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">General</a>
    </li>
</ul>
<div class="card">
    <div class="card-header">Tipos de ingresos
        <a class="btn btn-primary btn-sm float-right text-white" href="{{route('tipo_ingresos.create')}}">Nuevo</a>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-striped table-bordered dataTable">
            <thead>
                <tr>
                    <th scope="col">Tipo de ingreso</th>
                    <th scope="col">Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipo_ingresos as $tipo_ingreso)
                <tr>
                    <td>{{$tipo_ingreso->nombre_ingreso}}</td>
                    <td>{{$tipo_ingreso->descripcion}}</td>
                    <td class="text-right">
                        <a class="btn btn-light btn-sm" href="{{route('tipo_ingresos.edit', $tipo_ingreso->id)}}">Editar</a>
                        <a class="btn btn-danger btn-sm text-white delete" val-palabra={{$tipo_ingreso->id}}>Borrar</a>
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
                    {{-- Paso el id de la materia  aborrar en materia_delete
                    <button type="submit" name="ok_delete" id="ok_delete" class="btn btn-danger">SI Borrar</button>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">NO Borrar</button>
            </div>
        </div>
    </div>
</div> --}}