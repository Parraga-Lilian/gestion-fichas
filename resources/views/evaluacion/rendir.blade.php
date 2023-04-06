@php
    $layout = (auth()->user()->tipo == "administrador") ? 'layouts.sidebar-admin' : 'layouts.sidebar-empleado';
@endphp
@extends($layout)
@section('contenido')
<?php use App\Models\User; ?>
    <h2 class="text-center">Evaluacion</h2>
    <form action="{{route('evaluacion.index')}}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="idEvaluacion">Cod Evaluacion: {{ $evaluacion->idEvaluacion }}</label>
        </div>
        <div>
            <label for="idUsuario">Usuario: {{User::find($evaluacion->idUser)->username}}</label>
        </div>
        <div>
            <input type="hidden" name="preguntas" class="form-control" value="{{ $evaluacion->preguntas }}" />
        </div>
        <div>
            <label for="respuestas">Respuestas: {{ $evaluacion->respuestas }}</label>
        </div>
        <div>
            <label for="maximo">Maximo: {{ $evaluacion->maximo }}</label>
        </div>
        <div id="temporizador" class="temporizador-fijo">
            Tiempo restante:<div id="temp" class="temporizador-cuenta">00:00:00</div>
        </div>
        <div>
            <input class="btn btn-warning mt-2 mb-3" type="submit" value="<- Regresar"/>
        </div>
        <div id="container">
            <!-- Aquí se agregarán las preguntas -->
            <div id="preguntas-container"></div>
                <input class="btn btn-warning my-3" type="submit" value="<- Regresar"/>
                <input id="btnguardarpregunta" class="btn btn-success my-3"
                type="submit" value="Enviar respuestas" />
        </div>
    </form>
    <hr />
    <script>
        const tiempoMaximo = 60; //segundos
        let tiempoRestante;
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
            mostrarPreguntas(valorInput);
        });
        // Función que actualiza el temporizador
        function actualizarTemporizador() {
            const tiempoElemento = document.getElementById("temp");
            const horas = Math.floor(tiempoRestante / 3600);
            const minutos = Math.floor((tiempoRestante % 3600) / 60);
            const segundos = tiempoRestante % 60;
            const horasStr = horas.toString().padStart(2, "0");
            const minutosStr = minutos.toString().padStart(2, "0");
            const segundosStr = segundos.toString().padStart(2, "0");
            tiempoElemento.innerText = `${horasStr}:${minutosStr}:${segundosStr}`;
            if (tiempoRestante === 0) {
                clearInterval(temporizador);
                document.getElementById("temporizador").innerText = "Tiempo agotado";
            } else if (tiempoRestante <= 60) {
                tiempoElemento.style.color = "red";
            }

            tiempoRestante--;
        }

        function mostrarPreguntas(preguntas) {
            try {
                const preguntasContainer = document.getElementById("preguntas-container");
                if (!preguntasContainer) {
                throw new Error("El contenedor de preguntas no existe.");
                }
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
                    <div class="form-group" style="cursor:pointer">
                        ${preguntas[i].alternativas && preguntas[i].alternativas.map((alt, index) => `
                            <div class="form-check form-control mb-1 pl-5">
                                <input class="form-check-input" type="radio" style="cursor:pointer;transform: scale(1.5)"
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
