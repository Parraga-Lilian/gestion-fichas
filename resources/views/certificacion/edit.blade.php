@extends('layouts.plantilla')
@section('contenido')
    <h2>Modificación de certificacion</h2>
    <form action="{{route('certificacion.update',$certificacion->idCertificaciones)}}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="{{$certificacion->nombre}}" class="form-control">
    </div>
    <div>
        <label for="institucion">Institucion</label>
        <input type="text" name="institucion" value="{{$certificacion->institucion}}" class="form-control">
    </div>
    <div>
        <label for="fechaComienzo">Fecha Comienzo</label>
        <input type="date" name="fechaComienzo" value="{{$certificacion->fechaComienzo}}" class="form-control">
    </div>
    <div>
        <label for="fechaFin">Fecha Fin</label>
        <input type="date" name="fechaFin" value="{{$certificacion->fechaFin}}" class="form-control">
    </div>
    <div>
        <label for="tipo">Tipo</label>
        <select class="form-select" aria-label="Default select example" name="tipo">
            @foreach(array("diplomado","especializacion","reconocimiento",
            "participacion","asistencia","otro") as $tipo)
                @if ($tipo == $certificacion->tipo)
                    <option value="{{ $tipo }}" selected>{{ $tipo }}</option>
                @else
                    <option value="{{ $tipo }}">{{ $tipo }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div>
        <label for="archivo">Archivo</label>
        <input type="file" name="archivo" class="form-control">
        @if($certificacion->archivo)
            <p>Nombre de archivo actual: {{$certificacion->nombre}}</p>
        @endif
    </div>

        <input class="btn btn-success mt-2 form-control" type="submit" value="Modificar"/>
        <a class="btn btn-warning mt-1 form-control" href="{{route('certificacion.index')}}">Regresar</a>
    </form>
@endsection
