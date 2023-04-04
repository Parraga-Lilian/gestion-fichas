@extends('layouts.sidebar-admin')
@section('contenido')
<h2>Gestion de empleados</h2>
<?php use App\Models\User; ?>
@auth
    <div>
        <a class="btn btn-success mb-3" href="{{route('empleado.create')}}">Agregar empleado +</a>
    </div>
    <table class="table">
        <thead>
            <th>COD</th>
            <th>USER</th>
            <th>FOTO</th>
            <th>CEDULA</th>
            <th>NOMBRES</th>
            <th>APELLIDOS</th>
            <th>DIRECCION</th>
            <th>TELEFONO</th>
            <th>CARGO</th>
            <th>HORARIO</th>
            <th>SECCION</th>
            <th>ESTADO</th>
            <th>OPCIONES</th>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                    <td>{{$empleado->idEmpleado}}</td>
                    <td>{{User::find($empleado->idUser)->username}}</td>
                    <td>
                        <img class="zz_image" src="{{ asset('storage').'/'.$empleado->Foto}}" width="70px" alt="" />
                    </td>
                    <td>{{$empleado->cedula}}</td>
                    <td>{{$empleado->nombres}}</td>
                    <td>{{$empleado->apellidos}}</td>
                    <td>{{$empleado->direccion}}</td>
                    <td>{{$empleado->telefono}}</td>
                    <td>{{$empleado->cargo}}</td>
                    <td>{{$empleado->horario}}</td>
                    <td>{{$empleado->seccion}}</td>
                    <td>{{$empleado->estado}}</td>
                    <td class="btn-group"> 
                        <a class="btn btn-primary" href="{{route('empleado.show', $empleado->idEmpleado)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                        </a>
                        <a class="btn btn-warning" href="{{route('empleado.edit',$empleado->idEmpleado)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                              </svg>    
                        </a>

                        <form id="idForm" action="{{route('empleado.destroy', $empleado->idEmpleado)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input class="btn btn-danger" type="submit" value="Borrar"/>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('layouts.generaldialog')
    @yield('employee_delete')
 
    <script>
        const list = document.getElementsByTagName("LI")[3];
        list.className += "active";
    </script>
    <!--Javascript-->
    <script>
    var form = document.getElementById('idForm');
    form.addEventListener('submit',function(event){
      event.preventDefault()
        if(confirm('¿Está seguro que desea eliminar este usuario? \n El empleado asociado sera eliminado.')){
            form.submit();
        }
    });
  </script>
@endauth
@guest
    <h1>Homepage</h1>
    <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
@endguest

@endsection