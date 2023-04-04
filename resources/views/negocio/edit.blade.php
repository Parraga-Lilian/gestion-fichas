@extends('layouts.sidebar-admin')
@section('contenido')
@auth
    <form action="{{route('negocio.update', $negocio->idNegocio)}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="razonsocial">Razon Social</label>
            <input type="number" name="razonsocial" class="form-control" value="{{ $negocio->razonsocial }}">
        </div>
        <div>
            <label for="actividad">Actividad</label>
            <input type="text" name="actividad" class="form-control" value="{{ $negocio->actividad }}" />
        </div>
        <div>
            <input class="btn btn-success mt-2 form-control" type="submit" value="Modificarr"/>
        </div>
    </form>
@endauth

@guest
    <h1>Homepage</h1>
    <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
@endguest

@endsection