@extends('layouts.sidebar-empleado')
@section('contenido')
<h4>Perfil de empleado</h4>
    @auth
            @if (!is_null($empleadoi))
            <section style="background-color: #eee;">
                <div class="container py-5">
                <div class="row">
                    <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                        @if (empty($empleadoi->Foto))
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                          alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        @else
                          <img src="{{ asset('storage').'/'.$empleadoi->Foto}}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        @endif

                        <h5 class="my-3">{{ auth()->user()->username ?? ""}} </h5>
                        <p class="text-muted mb-1">Cédula: {{ $empleadoi->cedula }}</p>
                        <p class="text-muted mb-2">F. Ingreso: {{auth()->user()->created_at->toDateString() ?? "" }}</p>
                        <p class="text-muted mb-2">Actualizado: {{auth()->user()->updated_at->toDateString() ?? "" }}</p>
                        <div class="d-flex justify-content-center mb-2">
                            <a type="button" class="btn btn-primary" class="btn btn-warning"
                            href="{{route('empleadoi.edit',$empleadoi)}}">Editar mi perfil</a>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                <p class="mb-0">Nombre:</p>
                                </div>
                                <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$empleadoi->nombres . ' ' . $empleadoi->apellidos}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                <p class="mb-0">Email: </p>
                                </div>
                                <div class="col-sm-9">
                                <p class="text-muted mb-0">{{auth()->user()->email}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                <p class="mb-0">Dirección: </p>
                                </div>
                                <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $empleadoi->direccion }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                <p class="mb-0">Telefono: </p>
                                </div>
                                <div class="col-sm-9">
                                <p class="text-muted mb-0">(593) {{ $empleadoi->telefono }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                <p class="mb-0">Cargo: </p>
                                </div>
                                <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $empleadoi->cargo }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                <p class="mb-0">Horario: </p>
                                </div>
                                <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $empleadoi->horario }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                <p class="mb-0">Seccion: </p>
                                </div>
                                <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $empleadoi->seccion }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </section>
          @else
           <h3 class="text text-warning">No hay datos que mostrar</h3>
        @endif
    @endauth
<script>
    const list = document.getElementsByTagName("LI")[0];
    list.className += "active";
</script>
@endsection
