@extends('layouts.sidebar-admin')
@section('contenido')
<h2>Gestion de usuarios</h2>
<?php /*<div>
    <a class="btn btn-success" href="{{route('user.create')}}">Crear usuario +</a>
</div> */?>
<table class="table">
    <thead>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>USUARIO</th>
        <th>CLAVE</th>
        <th>EMAIL</th>
        <th>TIPO</th>
        <th>OPCIONES</th>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{$usuario->idUser}}</td>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->username}}</td>
                <td>{{substr($usuario->password,0,15) . "..."}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->tipo}}</td>

                <td class="btn-group">
                  <?php /* <a class="btn btn-primary" href="{{route('user.show',$usuario->idUser)}}">+</a>*/ ?>
                    <a class="btn btn-warning" href="{{route('user.edit',$usuario->idUser)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                          </svg>   
                    </a>
                    <form class="delForm" action="{{route('user.destroy',$usuario->idUser)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input class="btn btn-danger" type="submit" value="Eliminar" />
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@include('layouts.generaldialog')
@yield('failDelete')
@yield('okDelete')
<script>
    const list = document.getElementsByTagName("LI")[2];
    list.className += "active";
</script>
<!--Javascript-->
<script>
    let elements = document.querySelectorAll('.delForm');
    //var forms = document.getElementsByClassName('delForm');
    elements.forEach((item)=>{
        item.addEventListener('submit',function(event){
            event.preventDefault()
            if(confirm('¿Está seguro que desea eliminar este usuario?'+
            ' \n El empleado asociado a este usuario sera eliminado también.'+
            ' \nEsta acción no se puede deshacer')){
                item.submit();
            }
        });
    });
  </script>
@endsection