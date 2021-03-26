@extends('admin-lte.index')

@section('content')
<form class="form-group " method="POST" enctype="multipart/form-data" action="{{route("perdons.store")}}">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5>
                Perdonar a un Lector 
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <div class="form-group ">
                        <label for="" class="">Fecha de Perdon</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                {{-- <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span> --}}
                            </div>
                            <input type="date" name="fecha_perdon" class="form-control" required
                                value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                min="{{ Carbon\Carbon::now()->subDay()->format('Y-m-d') }}"
                                max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" id="">
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group ">
                        <label for="lectores" class="">Lector</label>
                        <label for="lectores">
                            <a role="button" type="button" name="lector_id" href="{{route('lectores.create')}}" title="Nuevo lector"><i
                                    class="fas fa-plus-circle fa-md"></i></a><i title="Ayuda" id="popover" class="fas fa-question-circle"
                                    data-content="">
                                </i>
                            
                        </label>
                        
                        
                        <select class="form-control mi-selector" name="lector_id" id="lectores" required>
                            <option value="" disabled selected>--Seleccione un lector a perdonar--</option>
                            @foreach($lectores as $lector)
                            <option value="{{$lector->id}}"  @if(old('lector_id')==$lector->id) selected
                                @endif>
                                {{$lector->nombres}} {{$lector->apellidos}}  {{'(Reputación: '.$lector->getreputacion($lector->reputacion).')'}}
                            </option> 
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- <div class="col-4">
                    <div class="form-group ">
                        <label for="lectores" class="">Lector</label>
                        <label for="lectores">
                            <a role="button" type="button" name="lector_id" href="{{route('lectores.create')}}" title="Nuevo lector"><i
                                    class="fas fa-plus-circle fa-md"></i></a><i title="Ayuda" id="popover" class="fas fa-question-circle"
                                    data-content="">
                                </i>
                            
                        </label>

                        <select class="form-control mi-selector" name="lector_id" id="lectores" required>
                            <option value="" disabled selected>--Seleccione un lector por favor--</option>
                            @foreach($lectores as $lector)
                            <option value="{{$lector->id}}" @if(old('lector_id')==$lector->id) selected
                                @endif>
                                {{$lector->nombres}} {{$lector->apellidos}}  {{'(Reputación: '.$lector->getreputacion($lector->reputacion).')'}}
                            </option> 
                            @endforeach
                        </select>
                    </div>
                </div> --}}


                {{-- <div class="col-4">
                    <div class="form-group ">
                        <label for="lectores" class="">Lector</label>
                        <label for="lectores">
                            <a role="button" type="button" href="{{route('lectores.create')}}" title="Nuevo lector"><i
                                    class="fas fa-plus-circle fa-md"></i></a>
                        </label>

                        <select class="form-control" name="lector_id" id="lector" required>
                            <option value="" disabled selected>--Seleccione un lector--</option>
                            @foreach($lectores as $lector)
                            <option value="{{$lector->id}}" @if(old('lector_id')==$lector->id) selected
                                @endif>{{$lector->nombres}} {{$lector->apellidos}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="form-group ">
                        <label for="nombre">Notas generales</label>
                        <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control"
                            placeholder="Ingrese la descripcion">{{ old('descripcion') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer float">
            <div class="float-right">
                <a href="javascript:history.back()" class="btn btn-dark"><i class="fa fa-times"></i> Cancelar </a>
                <button type="submit" class="btn btn-primary "><i class="fa fa-check"></i> Perdonar</button>
            </div>
        </div>
    </div>
    @csrf
</form>
@endsection
@push('scripts')

<script>
    jQuery(document).ready(function($){
        $(document).ready(function() {
            $('.mi-selector').select2();
        });
    });
</script>
{{-- <script>
    
    $(document).ready(function(){
        $('#isbn').mask('000-0-00-000000-0');
        $('#cuit-number').mask('00-00000000-0');
    });
</script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js')}}"></script> --}}

@endpush
