@extends('layouts.plantilla')
@section('contenido')
    <h2>Ingreso de cursos realizados</h2>
    <form action="{{route('curso.store')}}" method="POST">
        @csrf
    <!-- Get the idUser from the login variable in order to save the new course -->
    <input type="hidden" name="idUser" value="{{ auth()->user()->idUser }}">
    <div>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control">
    </div>
    <div>
        <label for="lugar">Lugar</label>
        <input type="text" name="lugar" class="form-control">
    </div>
    <div>
        <label for="tiempo">Tiempo</label>
        <input type="text" name="tiempo" class="form-control">
    </div>
    <div>
        <label for="modalidad">Modalidad</label>
        <select class="form-select" aria-label="Default select example" name="modalidad">
            <option value="presencial" selected>Presencial</option>
            <option value="semipresencial">Semipresencial</option>
            <option value="online">Online</option>
            <option value="otro">Otro</option>
        </select>
    </div>
    <div>
        <label for="fechaComienzo">Fecha Comienzo</label>
        <input type="date" name="fechaComienzo" class="form-control">
    </div>
    <div>
        <label for="fechaFin">Fecha Fin</label>
        <input type="date" name="fechaFin" class="form-control">
    </div>
    <div>
        <label for="firma">Firma</label>
        <input type="text" name="firma" class="form-control">
    </div>
    <div>
        <label for="archivo">Archivo</label>
        <input type="file" name="archivo" class="form-control">
    </div>
        <input class="btn btn-success mt-2 form-control" type="submit" value="Agregar curso realizado"/>
        <a class="btn btn-warning mt-1 form-control" href="{{route('curso.index')}}">Regresar</a>
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