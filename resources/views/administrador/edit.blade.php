@extends('layouts.plantilla')
@section('contenido')
@auth
<h4>Editar datos de Administrador</h4>
<form action="{{route('administrador.update', $administrador->idAdministrador)}}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div>
        <label for="cedula">Cedula:</label>
        <input type="number" name="cedula" class="form-control" value="{{$administrador->cedula}}">
    </div>
    <div>
        <label for="nombres">Nombres:</label>
        <input type="text" name="nombres" class="form-control" value="{{ $administrador->nombres }}" />
    </div>
    <div>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" class="form-control" value="{{ $administrador->apellidos }}" />
    </div>
    <div>
        <label for="direccion">Direccion:</label>
        <input type="text" name="direccion" class="form-control" value="{{ $administrador->direccion }}" />
    </div>
    <div>
        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" class="form-control" value="{{ $administrador->telefono }}" />
    </div>
    <div>
        <label for="especialidad">Especialidad:</label>
        <input type="text" name="especialidad" class="form-control" value="{{ $administrador->especialidad }}" />
    </div>
    <div>
        <label for="Foto">Foto</label>
        <img id="imgId" src="{{ asset('storage').'/'.$administrador->Foto }}" width="100px" alt="" />
        <input class="form-control" type="file" name="Foto" onchange="read(this)" />
    </div>
    <div>
        <input class="btn btn-success mt-2 form-control" type="submit" value="Aceptar" />
        <a class="btn btn-warning mt-1 form-control" href="{{route('administrador.index')}}">Regresar</a>
    </div>
</form>
<script>
    function read(val) {
        const reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById("imgId").src = event.target.result;
        }
        reader.readAsDataURL(val.files[0]);
    }
</script>
@endauth
@guest

@endguest
@endsection
