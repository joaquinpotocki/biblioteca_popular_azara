@extends('admin-lte.index')

@section('content')
<form class="form-group " method="POST" action="{{route("ingreso_libros.store")}}">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5>
                Agregar un nuevo Ingreso
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <div class="form-group ">
                        <label for="" class="col-form-label text-md-right">Fecha de Ingreso</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                {{-- <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span> --}}
                            </div>
                            <input type="date" name="fecha_ingreso" class="form-control" required
                                value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                min="{{ Carbon\Carbon::now()->subDay()->format('Y-m-d') }}"
                                max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" id="">
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group ">
                        <label for="" class="col-form-label text-md-right">Fecha perdida</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                {{-- <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span> --}}
                            </div>
                            <input type="date" name="fecha_perdida" class="form-control" required
                                value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                min="{{ Carbon\Carbon::now()->subDay()->format('Y-m-d') }}"
                                max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" id="">
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group ">
                        <label for="libros" class="">Libro</label>
                        <label for="libros">
                            <a role="button" type="button" href="{{route('libros.create')}}" title="Nuevo libro"><i
                                    class="fas fa-plus-circle fa-md"></i></a>
                        </label>

                        <select class="form-control" name="libro_id" id="libros" required>
                            <option value="" disabled selected>--Seleccione un libro por favor--</option>
                            @foreach($libros as $libro)
                            <option value="{{$libro->id}}" @if(old('libro_id')==$libro->id) selected
                                @endif>{{$libro->nombre}} {{$libro->stock_libro}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group ">
                        <label for="cantidad">Cantidad que ingresa</label>
                        <input type="number" class="form-control  @error('cantidad') is-invalid @enderror" id="cantidad"
                            name="cantidad" value="{{ old('cantidad') }}" placeholder="Especifique la cantidad de ingreso" required>
                        @error('cantidad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group ">
                        <label for="nombre">Descripcion Ingreso</label>
                        <textarea name="descripcion_ingreso" id="descripcion_ingreso" cols="30" rows="5" class="form-control"
                            placeholder="Ingrese las notas generales">{{ old('descripcion_ingreso') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer float">
            <div class="float-right">
                <a href="javascript:history.back()" class="btn btn-dark"><i class="fa fa-times"></i> Cancelar </a>
                <button type="submit" class="btn btn-primary "><i class="fa fa-check"></i> Guardar</button>
            </div>
        </div>
    </div>
    @csrf
</form>
@endsection
@push('scripts')
@endpush
