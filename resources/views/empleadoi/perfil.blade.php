@extends('layouts.sidebar-admin')
@section('contenido')
<h1>Perfil de empleado</h1>
    @auth
        <section style="background-color: #eee;">
          <div class="container py-5">
            <div class="row">
              <div class="col-lg-4">
                <div class="card mb-4">
                  <div class="card-body text-center">
                    <!--Foto-->
                    <img src="{{ asset('storage'.'/'.$empleado->Foto) }}" alt="">
                    
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                      class="rounded-circle img-fluid" style="width: 150px;">

                    <!--Fin foto-->
                    <h5 class="my-3">John Smith</h5>
                    <p class="text-muted mb-1">Cédula: {{ $empleado->cedula }}</p>
                    <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                    <div class="d-flex justify-content-center mb-2">
                      <a type="button" class="btn btn-primary" class="btn btn-warning" 
                      href="{{route('empleado.edit',$empleado->idempleado)}}">Editar</a>
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
                        <p class="text-muted mb-0">{{$empleadoes->nombre}}</p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Email: </p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">{{'no hay correo'}}</p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Telefono: </p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">(593) {{ $empleado->telefono }}</p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Address</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $empleado->direccion }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    @endauth
@endsection