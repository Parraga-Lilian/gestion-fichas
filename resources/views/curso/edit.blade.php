@extends('layouts.plantilla')
@section('contenido')
    <h2>Modificación de curso</h2>
    <form action="{{route('curso.update',$curso->idCursosRealizados)}}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="{{$curso->nombre}}" class="form-control">
    </div>
    <div>
        <label for="lugar">Lugar</label>
        <input type="text" name="lugar" value="{{$curso->lugar}}" class="form-control">
    </div>
    <div>
        <label for="tiempo">Tiempo</label>
        <input type="text" name="tiempo" value="{{$curso->tiempo}}" class="form-control">
    </div>
    <div>
        <label for="modalidad">Modalidad</label>
        <select class="form-select" aria-label="Default select example" name="modalidad">
            @foreach(array("presencial","semipresencial","online","otro") as $modalidad)
                @if ($modalidad == $curso->modalidad)
                    <option value="{{ $modalidad }}" selected>{{ $modalidad }}</option>
                @else
                    <option value="{{ $modalidad }}">{{ $modalidad }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div>
        <label for="fechaComienzo">Fecha Comienzo</label>
        <input type="date" name="fechaComienzo" value="{{$curso->fechaComienzo}}" class="form-control">
    </div>
    <div>
        <label for="fechaFin">Fecha Fin</label>
        <input type="date" name="fechaFin" value="{{$curso->fechaFin}}" class="form-control">
    </div>
    <div>
        <label for="firma">Firma</label>
        <input type="text" name="firma" value="{{$curso->firma}}" class="form-control">
    </div>
    <div>
        <label for="archivo">Archivo</label>
        <input type="file" name="archivo" value="{{$curso->archivo}}" class="form-control">
    </div>
        <input class="btn btn-success mt-2 form-control" type="submit" value="Modificar"/>
        <a class="btn btn-warning mt-1 form-control" href="{{route('curso.index')}}">Regresar</a>
    </form>
@endsection
