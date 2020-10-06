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
                <form class="form-group " method="POST" action="{{route('configuracion.update')}}"
                    enctype="multipart/form-data">
                    @method('PUT')
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
                            <img src="{{asset('img/'.$config->logo)}}" alt="" width="80" height="50">
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

@endpush
