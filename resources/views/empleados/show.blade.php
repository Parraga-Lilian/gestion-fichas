@extends('layouts.plantilla')
@section('contenido')
    <h2>Mi perfil</h2>
    <form action="{{route('empleado.index')}}" enctype="multipart/form-data">
        @csrf
    <div>
        <label for="cedula">Cedula</label>
        <input type="number" name="cedula" class="form-control" value="{{ $empleado->cedula }}">
    </div>
    <!--<div>
        <label for="tipo">Tipo</label>
        <select class="form-select" aria-label="Default select example" name="tipo">
            <option value="Solicitud" selected>Solicitud</option>
            <option value="Informe" >Informe</option>
            <option value="Memorandum">Memorandum</option>
            <option value="Otro">Otro</option>
        </select>
        <input type="text" name="tipo" class="form-control">
    </div>-->
    <div>
        <label for="nombres">Nombres</label>
        <input type="text" name="nombres" class="form-control" value="{{ $empleado->nombres }}" />
    </div>
    <div>
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" class="form-control" value="{{ $empleado->apellidos }}" />
    </div>
    <div>
        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" class="form-control" value="{{ $empleado->direccion }}" />
    </div>
    <div>
        <label for="telefono">Telefono</label>
        <input type="text" name="telefono" class="form-control" value="{{ $empleado->telefono }}" />
    </div>
    <div>
        <label for="cargo">Cargo</label>
        <input type="text" name="cargo" class="form-control" value="{{ $empleado->cargo }}" />
    </div>
    <div>
        <label for="horario">Horario</label>
        <input type="text" name="horario" class="form-control" value="{{ $empleado->horario }}" />
    </div>
    <div>
        <label for="seccion">Seccion</label>
        <input type="text" name="seccion" class="form-control" value="{{ $empleado->seccion }}" />
    </div>
    <div>
        <label for="estado">Estado</label>
        <input type="text" name="estado" class="form-control" value="{{ $empleado->estado }}" />
    </div>
    <div>
        <label for="Foto">Foto</label>
        <img src="{{ asset('storage').'/'.$empleado->Foto }}" width="100px" alt="" />
        <!--<input class="form-control" type="file" name="foto" />-->
    </div>
    <div>
        <input class="btn btn-success mt-2 form-control mb-3" type="submit" value="Regresar"/>
    </div>
    </form>
@endsection