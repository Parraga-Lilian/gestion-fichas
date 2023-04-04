@extends('layouts.plantilla')
@section('contenido')
    <h2>Creación de Empleados</h2>
    <form action="{{route('empleado.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div>
        <label for="cedula">Cedula</label>
        <input type="number" name="cedula" class="form-control" required />
    </div>
    <div>
        <label for="nombres">Nombres</label>
        <input type="text" name="nombres" class="form-control" required />
    </div>
    <div>
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" class="form-control" required />
    </div>
    <div>
        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" class="form-control" required />
    </div>
    <div>
        <label for="telefono">Telefono</label>
        <input type="text" name="telefono" class="form-control" required />
    </div>
    <div>
        <label for="cargo">Cargo</label>
        <select class="form-control" aria-label="Default select example" name="cargo">
            <option value="Funcionario" selected>Funcionario</option>
            <option value="Vendedor" >Vendedor</option>
            <option value="Asistente">Asistente</option>
            <option value="Logística">Logística</option>
            <option value="Supervisor">Supervisor</option>
            <option value="Recursos Humanos">Recursos Humanos</option>
            <option value="Otros">Otros</option>
        </select>
    </div>
    <div>
        <label for="horario">Horario</label>
        <select class="form-select" aria-label="Default select example" name="horario">
            <option value="4-10 a.m." selected>4-10 a.m.</option>
            <option value="8-12 a.m." >8-12 a.m.</option>
            <option value="2-5 p.m.">2-5 p.m.</option>
            <option value="5-9 p.m.">5-9 p.m.</option>
            <option value="9 p.m.-12 a.m.">9 p.m.-12 a.m.</option>
        </select>
    </div>
    <div>
        <label for="seccion">Seccion</label>
        <select class="form-select" aria-label="Default select example" name="seccion">
            <option value="Matutina" selected>Matutina</option>
            <option value="Vespertina" >Vespertina</option>
            <option value="Nocturna">Nocturna</option>
            <option value="Jornada completa">Jornada completa</option>
            <option value="Medio tiempo">Medio tiempo</option>
            <option value="Otros">Otros</option>
        </select>
    </div>
    <div>
        <label for="estado">Estado</label>
        <select class="form-select" aria-label="Default select example" name="estado">
            <option value="activo" selected>activo</option>
            <option value="en progreso" >en progreso</option>
            <option value="desactivado">desactivado</option>
        </select>
    </div>
    <div>
        <label for="Foto">Foto</label>
        <input class="form-control" type="file" name="Foto" />
    </div>
    <div>
        <input class="btn btn-success mt-2 form-control" type="submit" value="Crear empleado"/>
        <a class="btn btn-warning mt-1 form-control" href="{{route('empleado.index')}}">Regresar</a>
    </div>
    </form>
@endsection