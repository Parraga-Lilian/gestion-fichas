@extends('layouts.plantilla')
@section('contenido')
<?php use App\Models\User; ?>
    <h2>Evaluacion</h2>
    <form action="{{route('evaluacion.index')}}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="idEvaluacion">Evaluacion: {{ $evaluacion->idEvaluacion }}</label>
        </div>
        <div>
            <label for="idUsuario">Usuario: {{User::find($evaluacion->idUser)->username}}</label>
        </div>
        <div>
            <input type="hidden" name="preguntas" class="form-control" value="{{ $evaluacion->preguntas }}" />
        </div>
        <div>
            <label for="respuestas">Respuestas: value="{{ $evaluacion->respuestas }}</label>
        </div>
        <div>
            <label for="maximo">Maximo: {{ $evaluacion->maximo }}</label>
        </div>
        <div>
            <label for="estado">Estado: {{ $evaluacion->estado }}</label>
        </div>
        <div>
            <input class="btn btn-warning mt-2 form-control mb-3" type="submit" value="Regresar"/>
        </div>
    </form>
    <hr />
    <div id="preguntas-container">
        <!-- Aquí se agregarán las preguntas -->

    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        const input = document.querySelector('input[name="preguntas"]');
        const valorInput = JSON.parse(input.value);
        mostrarPreguntas(valorInput);
        });

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
                    <h3 class="card-title">Pregunta ${preguntas[i].num + 1}</h3>
                    <div class="form-group">
                        <p class="form-control-plaintext">${preguntas[i].preg}</p>
                    </div>
                    <h3 class="card-title">Alternativas</h3>
                    <div class="form-group">
                        ${preguntas[i].alternativas && preguntas[i].alternativas.map((alt, index) => `
                        <p class="form-control-plaintext${index == preguntas[i].respuestaCorrecta - 1 ? ' bg-success text-white' : ''}">${alt.alter}</p>
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
