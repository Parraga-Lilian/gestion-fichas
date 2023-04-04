@extends('layouts.sidebar-admin')
@section('contenido')
<h2>Gestion de cursos realizados</h2>
@auth
    <div>
        <a class="btn btn-success" href="{{route('curso.create')}}">Agregar curso +</a>
    </div>
    <table class="table">
        <thead>
            <th>N°</th>
            <th>NOMBRE</th>
            <th>LUGAR</th>
            <th>TIEMPO</th>
            <th>MODALIDAD</th>
            <th>FECHA COMIENZO</th>
            <th>FECHA FIN</th>
            <th>FIRMA</th>
            <th>ARCHIVO</th>
            <th>OPCIONES</th>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <td>{{$curso->idCursosRealizados}}</td>
                    <td>{{$curso->nombre}}</td>
                    <td>{{$curso->lugar}}</td>
                    <td>{{$curso->tiempo}}</td>
                    <td>{{$curso->modalidad}}</td>
                    <td>{{$curso->fechaComienzo}}</td>
                    <td>{{$curso->fechaFin}}</td>
                    <td>{{$curso->firma}}</td>
                    <td>{{$curso->archivo}}</td>
                    <td class="btn-group">
                        <a class="btn btn-primary bi-eye" href="{{route('curso.show',$curso->idCursosRealizados)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 
                                1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 
                                14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 
                                8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                        </a>
                        <a class="btn btn-warning" href="{{route('curso.edit',$curso->idCursosRealizados)}}">Editar</a>
                        <form action="{{route('curso.destroy',$curso->idCursosRealizados)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input class="btn btn-danger" type="submit" value="Borrar"/>
                        </form>
                        <a href="{{ route('descargar.archivo', $certif->idCursosRealizados) }}" class="btn btn-primary" title="Descargar">
                            <i class="fas fa-download"></i>
                        </a>
                    </td>
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
const list = document.getElementsByTagName("LI")[5];
list.className += "active";
</script>
@endsection