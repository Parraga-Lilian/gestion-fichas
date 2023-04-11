<?php use App\Models\User; ?>
<?php use App\Models\Evaluacion; ?>
@php
    $layout = (auth()->user()->tipo == "administrador") ? 'layouts.sidebar-admin' : 'layouts.sidebar-empleado';
@endphp
@extends($layout)
@section('contenido')
<h4 class="text-center">Gestion de evaluaciones</h4>
@auth
@if (auth()->user()->tipo == "administrador")
    <div>
        <a class="btn btn-success mb-3" href="{{route('evaluacion.create')}}">Agregar evaluacion +</a>
    </div>
    <hr/>
    <h4>Evaluaciones creadas</h4>
    <hr/>
    <table class="table">
        <thead>
            <th>N°</th>
            <th>USUARIO</th>
            <th>TOTAL PREGUNTAS</th>
            <th>MAXIMO PUNTAJE</th>
            <th>ESTADO</th>
            <th>OPCIONES</th>
        </thead>
        <tbody>
            @foreach ($evaluaciones as $evaluacion)
                @if(User::find($evaluacion->idUser)->tipo == "administrador")
                    <tr>
                        <td>{{$evaluacion->idEvaluacion}}</td>
                        <td>{{User::find($evaluacion->idUser)->username}}</td>
                        <td>{{$evaluacion->npreguntas}}</td>
                        <td>{{$evaluacion->maximo}}</td>
                        <td>{{$evaluacion->estado}}</td>
                        <td class="btn-group">
                            <a class="btn btn-primary" href="{{route('evaluacion.show', $evaluacion->idEvaluacion)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                            </a>
                            <form id="idForm" action="{{route('evaluacion.destroy', $evaluacion->idEvaluacion)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <hr/>
    <h4>Evaluaciones rendidas</h4>
    <hr/>
    <table class="table">
        <thead>
            <th>N°</th>
            <th>USUARIO</th>
            <th>PUNTAJEOBTENIDO</th>
            <th>MAXIMO</th>
            <th>ESTADO</th>
            <th>OPCIONES</th>
        </thead>
        <tbody>
            @foreach ($evaluaciones as $evaluacion)
                @if(User::find($evaluacion->idUser)->tipo == "empleado")
                    <tr>
                        <td>{{$evaluacion->idEvaluacion}}</td>
                        <td>{{User::find($evaluacion->idUser)->username}}</td>
                        <td>{{$evaluacion->puntajeobtenido}}</td>
                        <td>{{$evaluacion->maximo}}</td>
                        <td>{{$evaluacion->estado}}</td>
                        <td class="btn-group">
                            <a class="btn btn-primary" href="{{route('evaluacion.show', $evaluacion->idEvaluacion)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                            </a>
                            <form id="idForm" action="{{route('evaluacion.destroy', $evaluacion->idEvaluacion)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                @endif
            @endforeach
        </tbody>
    </table>
 @else
    @php
        $evaluacionesAll = Evaluacion::where('estado','rendido')->where('estado','activo');
        $evaluacionesRendidas = Evaluacion::where([['estado','=' ,'rendido'],
        ['idUser','=',auth()->user()->idUser]])->get();
        $evaluacionesActivas = Evaluacion::where([
            ['estado', '=', 'activo']])->get(); //el codigo de la ev 'activa' no puede estar en las rendidas.
        $evaluacionesNoRendidas = [];
        foreach($evaluacionesActivas as $activa){
            if(Evaluacion::where([['estado','=' ,'rendido'],
            ['idUser','=',auth()->user()->idUser],['codigo',$activa->codigo]])->count() == 0){
                $evaluacionesNoRendidas[] = $activa;
            }
        }
    @endphp

    @if ($evaluacionesRendidas->count() > 0)
        <h4 class="text-center">Has rendido las siguientes evaluaciones:</h4>
        @foreach ($evaluacionesRendidas as $evaluacion)
            <hr />
            <h5><b>Nombre examen:</b> {{ $evaluacion->nombre }}</h5>
            <h5><b>Descripción:</b> {{ $evaluacion->descripcion }}</h5>
            <h5><b>Tiempo disponible:</b> {{ $evaluacion->tiempo }} minutos</h5>
            <h5><b>Puntuación:</b> {{ $evaluacion->puntajeobtenido }}/{{$evaluacion->maximo}}</h5>
            <!--Determinar si se ha rendido -->
            <a id="btnRendir" href="#" class="btn btn-success my-3">
            Rendida <i class="fas fa-check"></i>
            </a>
        @endforeach
    @else
        <h3>No hay evaluaciones rendidas</h3>
    @endif

    @if (count($evaluacionesNoRendidas) > 0)
        @foreach ($evaluacionesNoRendidas as $evaluacion)
                <hr />
                <h4 class="text-center">Hay evaluacion/es disponible</h4>
                <h5><b>Nombre examen:</b> {{ $evaluacion->nombre }}</h5>
                <h5><b>Descripción:</b> {{ $evaluacion->descripcion }}</h5>
                <h5><b>Tiempo disponible:</b> {{ $evaluacion->tiempo }} minutos</h5>
                <!--Determinar si se ha rendido -->
                <a id="btnRendir" href="{{ route('evaluacion.rendir', ['id' => $evaluacion->idEvaluacion]) }}"
                    class="btn btn-warning my-3">Rendir ahora -></a>
        @endforeach
    @else
        <h3>No hay evaluaciones disponibles</h3>
    @endif

 @endif

    @include('layouts.generaldialog')
    @yield('employee_delete')

    <script>
        const tipo = '{{ auth()->user()->tipo }}';
        if (tipo === "administrador") {
            valor = 7;
        } else {
            valor = 5;
        }
        const list = document.getElementsByTagName("LI")[valor];
        list.className += " active";
        var form = document.getElementById('idForm');
        if(form != null){
            form.addEventListener('submit',function(event){
            event.preventDefault()
                if(confirm('¿Está seguro que desea eliminar esta evaluacion?')){
                    form.submit();
                }
            });
        }

    </script>
    @endauth
    @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
    @endguest

    @endsection
