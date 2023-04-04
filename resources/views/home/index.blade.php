@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>Dashboard</h1>
            <p class="lead">Solo usuarios autenticados pueden ver esta seccion.</p>
            <a class="btn btn-lg btn-primary" href="https://codeanddeploy.com" 
            role="button">Ir al sistema &raquo;</a>
        @endauth

        @guest
            <h1>Inicio</h1>
            <p class="lead">Inicio.</p>
        @endguest
    </div>
@endsection