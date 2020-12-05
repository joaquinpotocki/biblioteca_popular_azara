@extends('admin-lte.index')

@section('content')

<div class="card">
    <div class="card-header">
        Roles y permisos de <strong>{{ $usuario->name }}</strong>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('usuarios.update',[$usuario->id]) }}">
            @csrf
            @method('PATCH')
            <div class="form-group row">
                <div class="form-group">
                    <label for="roles" class=" col-form-label text-md-right">Roles</label>

                    <select class="duallistbox" multiple="multiple" name="roles[]">
                        @foreach ($roles as $rol)
                        @if ($usuario->roles->contains('id',$rol->id))
                        <option value="{{$rol->id}}" selected>{{ $rol->name }}</option>
                        @else
                        <option value="{{$rol->id}}">{{ $rol->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
    </div>
    <div class="card-footer float">
        <div class="float-right">
            <a href="{{ route('usuarios.administrar') }}">
                <button type="button" class="btn btn-dark"><i class="fas fa-times"></i> Cancelar</button>
            </a>
            <button type="submit" class="btn btn-primary "><i class="fas fa-check"></i> Guardar</button>
        </div>
    </div>
    </form>

</div>


@endsection
@push('scripts')
<script>
    $(function(){
    $('.duallistbox').bootstrapDualListbox()
})
</script>
@endpush