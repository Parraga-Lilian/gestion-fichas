@extends('layouts.plantilla')
@section('contenido')
    <h2>Muestra de certificaciones</h2>
    <form action="{{route('certificacion.index')}}">
        @csrf
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="{{$certificacion->nombre}}" class="form-control" readonly>
        </div>
        <div>
            <label for="institucion">Institucion</label>
            <input type="text" name="institucion" value="{{$certificacion->institucion}}" class="form-control" readonly>
        </div>
        <div>
            <label for="fechaComienzo">Fecha Comienzo</label>
            <input type="date" name="fechaComienzo" value="{{$certificacion->fechacomienzo}}" class="form-control" readonly>
        </div>
        <div>
            <label for="fechaFin">Fecha Fin</label>
            <input type="date" name="fechaFin" value="{{$certificacion->fechafin}}" class="form-control" readonly>
        </div>
        <div>
            <label for="tipo">Tipo</label>
            <select class="form-select" aria-label="Default select example" name="tipo">
                @foreach(array("diplomado","especializacion","reconocimiento","participacion","asistencia","otro") as $tipo)
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
            <a href="{{ route('descargar.archivo', $certificacion->id) }}" class="btn btn-primary form-control" required>
                Descargar {{ $certificacion->nombre_archivo }}
            </a>
        </div>
        <input class="btn btn-success mt-2 form-control" type="submit" value="Regresar"/>
    </form>
@endsection
