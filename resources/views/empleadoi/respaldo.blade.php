@extends('layout.sidebar-admin')
@section('contenido')
<h4>Gestion de empleados</h4>
<div>
    <a class="btn btn-success" href="{{route('empleado.create')}}">Agregar empleado +</a>
</div>
<table class="table">
    <thead>
        <th>ID</th>
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
                    <a class="btn btn-primary" href="{{route('empleado.show',$empleado->idEmpleado)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                          </svg>
                    </a>
                    <a class="btn btn-warning" href="{{route('empleado.edit',$empleado->idEmpleado)}}">Editar</a>
                    <form action="{{route('empleado.destroy',$empleado->idEmpleado)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input class="btn btn-danger" type="submit" value="Borrar"/>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection


<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">John Smith</h5>
              <p class="text-muted mb-1">Cédula: 08xxxxxxxx</p>
              <div class="d-flex justify-content-center mb-2">
                <a type="button" class="btn btn-primary" class="btn btn-warning"
                href="{{route('empleado.store')}}">Crear perfil</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nombre Completo:</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">Sin datos</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email: </p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{'No hay correo'}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Telefono: </p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">(593) 0000000000</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Direccion: </p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">No hay direccion</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
