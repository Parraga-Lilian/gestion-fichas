@extends('layouts.plantilla')
@section('contenido')
    <h2>Modificación de documentos</h2>
    <form action="{{route('documento.index')}}">
        @csrf
    <div>
        <label for="idEmpleado">idEmpleado</label>
        <input type="number" name="idEmpleado" class="form-control" value="{{$documento->idEmpleado}}" readonly>
    </div>
    <div>
        <label for="tipo">Tipo</label>
        <select class="form-select" aria-label="Default select example" name="tipo" readonly>
            @foreach(array("Solicitud","Informe","Memorandum","Otro") as $tipo)
                @if ($tipo == $documento->tipo)
                    <option value="{{ $tipo }}" selected>{{ $tipo }}</option>
                @else
                    <option value="{{ $tipo }}">{{ $tipo }}</option>
                @endif
            @endforeach
        </select>
        <!--<input type="text" name="tipo" class="form-control">-->
    </div>
    <div>
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" value="{{$documento->titulo}}" class="form-control" readonly>
    </div>
    <div>
        <label for="asunto">Asunto</label>
        <input type="text" name="asunto" value="{{$documento->asunto}}" class="form-control" readonly>
    </div>
    <div>
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" value="{{$documento->fecha}}" class="form-control" readonly>
    </div>
    <div>
        <label for="emisor">Emisor</label>
        <input type="text" name="emisor" value="{{$documento->emisor}}" class="form-control" readonly>
    </div>
    <div>
        <label for="receptor">Receptor</label>
        <input type="text" name="receptor" value="{{$documento->receptor}}" class="form-control" readonly>
    </div>
    <div>
        <label for="cuerpo">Cuerpo</label>
        <textarea name="cuerpo" cols="40" rows="5" class="form-control" readonly>{{$documento->cuerpo}}</textarea>
    </div>
    <div>
        <label for="firma">Firma</label>
        <input type="text" name="firma" value="{{$documento->firma}}" class="form-control" readonly>
    </div>
    <div>
        <label for="archivo">Archivo</label>
        <input type="file" name="archivo" value="{{$documento->archivo}}" class="form-control" readonly>
    </div>
        <input class="btn btn-success mt-2 form-control" type="submit" value="Regresar"/>
    </form>
@endsection