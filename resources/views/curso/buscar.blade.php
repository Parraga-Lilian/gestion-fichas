@php
    $layout = (auth()->user()->tipo == "administrador") ? 'layouts.sidebar-admin' : 'layouts.sidebar-empleado';
@endphp
@extends($layout)
@section('contenido')
<?php use App\Models\User; ?>
<h3>Buscar cursos realizados</h3>
@auth
    <form action="{{ route('cursobuscar') }}" method="GET">
        @csrf
        <div>
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-search"></i>
            </button>
            <input type="text" name="nombre" placeholder="Buscar">
        </div>
    </form>
    <table class="table">
        <thead>
            <th>N°</th>
            <th>USUARIO</th>
            <th>NOMBRE</th>
            <th>LUGAR</th>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <td>{{$curso->idCursosRealizados}}</td>
                    <td>{{User::where('idUser','=',$curso->idUser)->first()->username}}</td>
                    <td>{{$curso->nombre}}</td>
                    <td>{{$curso->lugar}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endauth
@guest
    <h1>Homepage</h1>
    <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
@endguest
<script>
 const tipo = '{{ auth()->user()->tipo }}';
        if (tipo === "administrador") {
            valor = 5;
        } else {
            valor = 3;
        }
        const list = document.getElementsByTagName("LI")[valor];
        list.className += " active";
</script>
@endsection
