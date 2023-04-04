@extends('layouts.sidebar-admin')
@section('contenido')
<h1>Perfil de administrador</h1>
    @auth
      @if(is_null($administrador))
        <strong>No has ingresado. </strong>
        <a href="/logout">Login</a> 
      @else
          <section style="background-color: #eee;">
            <div class="container py-5">
              <div class="row">
                <div class="col-lg-4">
                  <div class="card mb-4">
                    <div class="card-body text-center">
                      @if (empty($administrador->Foto))
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" 
                          alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        @else
                          <img src="{{ asset('storage').'/'.$administrador->Foto}}" alt="avatar" 
                          class="rounded-circle img-fluid" style="width: 150px;">
                        @endif
                      <h5 class="my-3">{{auth()->user()->username ?? auth()->user()->name}}</h5>
                      <p class="text-muted mb-1">Cédula: {{ $administrador->cedula ?? "" }}</p>
                      <p class="text-muted mb-2">F. Ingreso: {{auth()->user()->created_at->toDateString() ?? "" }}</p>
                      <p class="text-muted mb-2">Actualizado: {{auth()->user()->updated_at->toDateString() ?? "" }}</p>
                      <div class="d-flex justify-content-center mb-2">
                        <a type="button" class="btn btn-primary" class="btn btn-warning" 
                        href="{{route('administrador.edit',$administrador->idAdministrador)}}">Editar perfil</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="card mb-4">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Nombres:</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{$administrador->nombres . ' ' . $administrador->apellidos}}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Email: </p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{auth()->user()->email ?? ""}}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Direccion: </p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{$administrador->direccion ?? ""}}</p>
                        </div>
                      </div>
                      
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Telefono: </p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">(+593) {{ $administrador->telefono ?? "" }}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Especialidad: </p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{ $administrador->especialidad ?? "" }}</p>
                        </div>
                      </div>
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>  
      @endif
    @endauth
<script>
    const list = document.getElementsByTagName("LI")[0];
    list.className += "active";
</script>
@endsection