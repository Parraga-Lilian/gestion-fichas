@php
    $layout = (auth()->user()->tipo == "administrador") ? 'layouts.sidebar-admin' : 'layouts.sidebar-empleado';
@endphp
@extends($layout)
@section('contenido')
<?php use App\Models\User; ?>
<h4>Buscar certificaciones ingresadas</h4>
@auth
    <form action="{{ route('certificacionbuscar') }}" method="GET">
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
            <th>Nº</th>
            <th>USUARIO</th>
            <th>NOMBRE</th>
            <th>TIPO</th>
        </thead>
        <tbody>
            @foreach ($certificaciones as $certif)
                <tr>
                    <td>{{$certif->idCertificaciones}}</td>
                    <td>{{User::where('idUser','=',$certif->idUser)->first()->username}}</td>
                    <td>{{$certif->nombre}}</td>
                    <td>{{$certif->tipo}}</td>
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
            valor = 6;
        } else {
            valor = 4;
        }
        const list = document.getElementsByTagName("LI")[valor];
        list.className += " active";
</script>
@endsection
