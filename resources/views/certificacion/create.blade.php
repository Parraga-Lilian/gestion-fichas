@extends('layouts.plantilla')
@section('contenido')
    <h2>Ingreso de certificacion</h2>
    <form action="{{route('certificacion.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <input type="hidden" name="idUser" value="{{ auth()->user()->idUser }}">
    <div>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control">
    </div>
    <div>
        <label for="institucion">Institucion</label>
        <input type="text" name="institucion" class="form-control">
    </div>
    <div>
        <label for="fechacomienzo">Fecha Comienzo</label>
        <input type="date" name="fechacomienzo" class="form-control">
    </div>
    <div>
        <label for="fechafin">Fecha Fin</label>
        <input type="date" name="fechafin" class="form-control">
    </div>
    <div>
        <label for="tipo">Tipo</label>
        <select class="form-select" aria-label="Default select example" name="tipo">
            <option value="diplomado" selected>Diplomado</option>
            <option value="especializacion" >Especializacion</option>
            <option value="reconocimiento">Reconocimiento</option>
            <option value="participacion">Participacion</option>
            <option value="asistencia">Asistencia</option>
            <option value="otro">Otro</option>
        </select>
        <!--<input type="text" name="tipo" class="form-control">-->
    </div>
    <div>
        <label for="archivo">Archivo</label>
        <input type="file" name="archivo" accept="application/pdf" class="form-control" required />
    </div>
        <input class="btn btn-success mt-2 form-control" type="submit" value="Crear certificacion"/>
        <a class="btn btn-warning mt-1 form-control" href="{{route('certificacion.index')}}">Regresar</a>
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
