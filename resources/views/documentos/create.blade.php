@extends('layouts.plantilla')
@section('contenido')
    <h2>Ingreso de documentos</h2>
    <form action="{{route('documento.store')}}" method="POST">
        @csrf
    <div>
        <!--<label for="idEmpleado">idEmpleado</label>
        <input type="number" name="idEmpleado" class="form-control">
        Mostrar el id del empleado como value -->
        <label for="Empleado">Empleado</label>
        <select class="form-select" aria-label="Default select example" name="Empleado">
            @foreach($empleados as $empleado)
                @if ($empleado->idEmpleado == 1)
                    <option value="{{ $empleado->idEmpleado }}" selected>{{ $empleado->nombres}}</option>
                @else
                    <option value="{{ $empleado->idEmpleado }}">{{ $empleado->nombres }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div>
        <label for="tipo">Tipo</label>
        <select class="form-select" aria-label="Default select example" name="tipo">
            <option value="Solicitud" selected>Solicitud</option>
            <option value="Informe" >Informe</option>
            <option value="Memorandum">Memorandum</option>
            <option value="Otro">Otro</option>
        </select>
        <!--<input type="text" name="tipo" class="form-control">-->
    </div>
    <div>
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" class="form-control">
    </div>
    <div>
        <label for="asunto">Asunto</label>
        <input type="text" name="asunto" class="form-control">
    </div>
    <div>
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" class="form-control">
    </div>
    <div>
        <label for="emisor">Emisor</label>
        <input type="text" name="emisor" class="form-control">
    </div>
    <div>
        <label for="receptor">Receptor</label>
        <input type="text" name="receptor" class="form-control">
    </div>
    <div>
        <label for="cuerpo">Cuerpo</label>
        <textarea name="cuerpo" cols="40" rows="5" class="form-control"></textarea>
    </div>
    <div>
        <label for="firma">Firma</label>
        <input type="text" name="firma" class="form-control">
    </div>
    <div>
        <label for="archivo">Archivo</label>
        <input type="file" name="archivo" class="form-control">
    </div>
        <input class="btn btn-success mt-2 form-control" type="submit" value="Crear documento"/>
        <a class="btn btn-warning mt-1 form-control" href="{{route('documento.index')}}">Regresar</a>
    </form>
    @if($errors->any())
     <div class="alert alert-danger">
          <ul class="list-unstyled">
                 @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                 @endforeach
          </ul>
      </div>
 @endif
@endsection