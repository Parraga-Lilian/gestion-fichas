@extends('layouts.sidebar-admin')
@section('contenido')
    <h2>Ingreso de Administrador</h2>
    <form action="{{route('user.store')}}" method="POST">
        @csrf
        <div>
            <label for="cedula">Cedula</label>
            <input type="number" name="cedula" class="form-control">
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
            <label for="nombres">Nombre</label>
            <input type="text" name="nombres" class="form-control">
        </div>
        <div>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" class="form-control">
        </div>
        <div>
            <label for="direccion">Direccion</label>
            <input type="date" name="direccion" class="form-control">
        </div>
        <div>
            <label for="telefono">Telefono</label>
            <input type="text" name="telefono" class="form-control">
        </div>
        <div>
            <input class="btn btn-success mt-2" type="submit" value="Aceptar"/>
        </div>
    </form>
@endsection