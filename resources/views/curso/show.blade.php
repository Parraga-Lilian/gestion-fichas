@extends('layouts.plantilla')
@section('contenido')
    <h2>Visualización de cursos</h2>
    <form action="{{route('curso.index')}}">
        @csrf
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="{{$curso->nombre}}" class="form-control" readonly />
        </div>
        <div>
            <label for="lugar">Lugar</label>
            <input type="text" name="lugar" value="{{$curso->lugar}}" class="form-control" readonly />
        </div>
        <div>
            <label for="tiempo">Tiempo</label>
            <input type="text" name="tiempo" value="{{$curso->tiempo}}" class="form-control" readonly />
        </div>
        <div>
            <label for="fechacomienzo">Fecha Comienzo</label>
            <input type="date" name="fechacomienzo" value="{{$curso->fechaComienzo}}" class="form-control" readonly />
        </div>
        <div>
            <label for="fechafin">Fecha Fin</label>
            <input type="date" name="fechafin" value="{{$curso->fechaFin}}" class="form-control" readonly />
        </div>
        <div>
            <label for="modalidad">Modalidad</label>
            <input type="text" name="modalidad" value="{{$curso->modalidad}}" class="form-control" readonly />
        </div>
        <div>
            <label for="firma">Firma</label>
            <input type="text" name="firma" value="{{$curso->firma}}" class="form-control" readonly />
        </div>
        <div>
            <label for="archivo">Archivo</label>
            <input type="file" name="archivo" value="{{$curso->archivo}}" class="form-control" readonly />
        </div>
        <input class="btn btn-success mt-2 form-control" type="submit" value="Regresar"/>
    </form>
@endsection