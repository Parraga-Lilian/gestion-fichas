@php
    $layout = (auth()->user()->tipo == "administrador") ? 'layouts.sidebar-admin' : 'layouts.sidebar-empleado';
@endphp
@extends($layout)
@section('contenido')
<?php use App\Models\User; ?>
    <h2 class="text-center">Evaluacion</h2>
    <form action="{{route('evaluacion.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" id="nusuario" name="nusuario" value="{{auth()->user()->username}}" />
        <div>
            <label style="display: inline-block;">Cod Evaluacion:</label>
            <input type="text" name="codigo" readonly class="form-control" style="display: inline-block; width: 70%;" value="{{ $evaluacion->codigo }}">
        </div>
        <label style="display: inline-block;">Nombre de la evaluación:</label>
        <input type="text" style="display: inline-block; width: 70%;"
        class="form-control" id="nombre" name="nombre" value="{{$evaluacion->nombre}}" readonly />


        <input type="hidden" id="descripcion" name="descripcion"  value="{{$evaluacion->descripcion }}" />

        <input id="tiempo" style="border-radius:5px;width:20%;" class="form-control" name="tiempo"
        type="hidden" value="1" min="0"  />
        <div>
            <label style="display: inline-block;">Usuario:</label>
            <input type="text" class="form-control" value="{{auth()->user()->username}}" style="display: inline-block; width: 70%;" disabled />
            <input type="hidden" name="idUser" value="{{auth()->user()->idUser}}" />
        </div>
        <div>
            <input type="hidden" name="preguntas" class="form-control" value="{{ $evaluacion->preguntas }}" />
        </div>
        <div>
            <label style="display: inline-block;">Maximo puntaje:</label>
            <input type="text" name="maximo" readonly class="form-control"
            style="display: inline-block; width: 70%;" value="{{ $evaluacion->maximo }}">
        </div>
        <div>
            <input id="puntajeobtenido" type="hidden" name="puntajeobtenido" value="0" readonly />
        </div>
        <div>
            <input id="estado" type="hidden" name="estado" value="" readonly />
        </div>
        <div id="temporizador" class="temporizador-fijo">
            Tiempo restante:<div id="temp" class="temporizador-cuenta">00:00:00</div>
        </div>
        <div>
            <a class="btn btn-warning my-3" href="{{ route('evaluacion.index') }}"><- Regresar</a>
        </div>
        <div id="container">
            <!-- Aquí se agregarán las preguntas -->
            <div id="preguntas-container"></div>
                <a class="btn btn-warning my-3" href="{{ route('evaluacion.index') }}"><- Regresar</a>
                <input id="btnguardarpregunta" class="btn btn-success my-3"
                type="button" onclick="obtenerPreguntas()" value="Enviar respuestas" />
        </div>
         <!-- Finish dialogbox -->
        <div class="modal fade show" id="success_evaluacion" tabindex="-1" role="dialog"
        data-mdb-toggle="animation" data-mdb-animation-reset="true" data-mdb-animation="slide-out-right"
        aria-labelledby="success_evaluacionTitle" style="display: none;">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">¡Mensaje!</h5>
                <!--<button type="button" class="close" data-dismiss="modal" onclick="javascript:document.getElementById('success_evaluacion').style.display='none'" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>-->
                </div>
                <div id="txtModal" class="modal-body"></div>
                <div class="modal-footer">
                <!--<a class="btn btn-primary" data-dismiss="modal" onclick="guardar()"><b style="color:white;">Aceptar</b></a>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>-->
                <input class="btn btn-primary my-1" type="submit" value="Aceptar" />
            </div>
            </div>
        </div>
        <!--End of dialogbox -->
    </form>

    <hr />
    <script>
        const tiempoMaximo = 60; //segundos
        let tiempoRestante;
        var laspreguntas = [];
        let puntajeTotal = 0;
        document.addEventListener("DOMContentLoaded", function() {
            //Temporizador
            const elemento = document.getElementById("temporizador");
            elemento.style.position = "fixed";
            elemento.style.top = "20px";
            elemento.style.right = "20px";
            elemento.style.zIndex = "9999";
            elemento.style.backgroundColor = "#fff";
            elemento.style.padding = "10px";
            elemento.style.boxShadow = "0px 0px 10px rgba(0, 0, 0, 0.5)";
            const tiempoElemento = document.getElementById("temp");
            tiempoElemento.style.fontWeight = "bold";
            // Iniciar el temporizador
            tiempoRestante = {{$evaluacion->tiempo * 60}};
            if(tiempoRestante == 0){
                tiempoRestante = 60; //Default
            }
            const temporizador = setInterval(actualizarTemporizador, 1000);
            const input = document.querySelector('input[name="preguntas"]');
            const valorInput = JSON.parse(input.value);
            laspreguntas = valorInput;
            mostrarPreguntas(valorInput);
        });
       /* function guardar(){
            document.getElementById('success_evaluacion').style.display='none';
            let url = "{{ route('evaluacion.store') }}";
            document.location.href=url;
        }*/
        // Función que actualiza el temporizador
        function actualizarTemporizador() {
            const tiempoElemento = document.getElementById("temp");
            const horas = Math.floor(tiempoRestante / 3600);
            const minutos = Math.floor((tiempoRestante % 3600) / 60);
            const segundos = tiempoRestante % 60;
            const horasStr = horas.toString().padStart(2, "0");
            const minutosStr = minutos.toString().padStart(2, "0");
            const segundosStr = segundos.toString().padStart(2, "0");
            if(tiempoElemento != null){
                tiempoElemento.innerText = `${horasStr}:${minutosStr}:${segundosStr}`;
                if (tiempoRestante === 0) {
                    obtenerPreguntas();
                } else if (tiempoRestante <= 60) {
                    tiempoElemento.style.color = "red";
                }
            }
            tiempoRestante--;
        }

        function obtenerPreguntas() {
            const preguntas = [];
            const contenedor = document.getElementById("preguntas-container");
            const preguntasDOM = contenedor.getElementsByClassName("pregunta");
            var dialog = document.getElementById("success_evaluacion");
            const puntaje = document.getElementById('puntajeobtenido');
            const txtModal = document.getElementById("txtModal");
            const estado = document.getElementById('estado');

            for (let i = 0; i < preguntasDOM.length; i++) {
                const preguntaDOM = preguntasDOM[i];
                const preguntaInput = preguntaDOM.getElementsByClassName("form-control-plaintext")[0];
                const alternativasDOM = preguntaDOM.getElementsByClassName("form-check-input");
                let respuestaDada = null;
                for (let j = 0; j < alternativasDOM.length; j++) {
                const alternativaDOM = alternativasDOM[j];
                if (alternativaDOM.checked) {
                    respuestaDada = alternativaDOM.value;
                    if(laspreguntas[i].respuestaCorrecta == respuestaDada){
                        puntajeTotal++;
                    }
                    break;
                }
                }
                const alternativas = [];
                for (let j = 0; j < preguntaDOM.getElementsByClassName("form-check-label").length; j++) {
                const alternativaDOM = preguntaDOM.getElementsByClassName("form-check-label")[j];
                const alternativa = {
                    alter: alternativaDOM.textContent.trim(),
                };
                alternativas.push(alternativa);
                }
                const pregunta = {
                    num: i + 1,
                    preg: preguntaInput.textContent.trim(),
                    alternativas: alternativas,
                    respuestaSeleccionada: respuestaDada,
                };
                preguntas.push(pregunta);
            }
            //Activar el Modal
            clearInterval(temporizador);
            document.getElementById("temporizador").innerText = "Tiempo agotado";

            dialog.style.display = "block";
            //****

            txtModal.textContent = `Puntuacion total = ${puntajeTotal}/${preguntasDOM.length}`;
            puntaje.value = puntajeTotal;
            estado.value = "rendido";
            //console.log(puntaje.value);
            return preguntas;
        }

        function mostrarPreguntas(preguntas) {
            try {
                const preguntasContainer = document.getElementById("preguntas-container");
                if (!preguntasContainer) {
                throw new Error("El contenedor de preguntas no existe.");
                }
                //Getting the correct answer
                for (let i = 0; i < preguntas.length; i++) {
                    // Crear el elemento de pregunta
                    const pregunta = document.createElement("div");
                    pregunta.classList.add("pregunta", "card", "mt-3");
                    // Agregar los campos de pregunta, alternativas y respuesta
                    pregunta.innerHTML = `
                    <div class="card-body">
                        <h4 class="card-title">Pregunta ${preguntas[i].num + 1}</h4>
                        <div class="form-group">
                            <p class="form-control-plaintext">${preguntas[i].preg}</p>
                        </div>
                        <h5 class="card-title">Seleccione un opcion</h5>
                        <div class="form-group" style="cursor:pointer;">
                            ${preguntas[i].alternativas && preguntas[i].alternativas.map((alt, index) => `
                                <div class="form-check form-control mb-1 pl-5">
                                    <input class="form-check-input" type="radio" style="cursor:pointer;transform: scale(1.5);"
                                    name="pregunta${preguntas[i].num}" value="${index+1}" id="pregunta${preguntas[i].num}-alternativa${index+1}">
                                    <label class="form-check-label${index == preguntas[i].respuestaCorrecta - 1 ? ' text-black' : ''}" for="pregunta${preguntas[i].num}-alternativa${index+1}">
                                        ${alt.alter}
                                    </label>
                                </div>
                            `).join('')}
                        </div>
                    </div>
                    `;
                    // Agregar la pregunta al contenedor de preguntas
                    preguntasContainer.appendChild(pregunta);
                }
            } catch (error) {
                console.error("Error al mostrar las preguntas:", error);
            }
         }
    </script>
@endsection
