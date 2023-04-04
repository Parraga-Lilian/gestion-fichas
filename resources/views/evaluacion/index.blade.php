@extends('layouts.sidebar-admin')
@section('contenido')
<div class="container">
    <h1 class="my-4">Agregar preguntas</h1>
    <div id="preguntas-container">
    <!-- Aquí se agregarán las preguntas -->
    </div>

    <button class="btn btn-primary my-3" onclick="agregarPregunta()">Agregar pregunta</button>
    <button class="btn btn-success my-3" onclick="guardarPreguntas()">Guardar preguntas</button>
</div>
  <script src="tu-archivo-js.js"></script>
<script>
let n_pregunta = 1;
function obtenerPreguntas() {
  const preguntas = [];

  // Obtener el contenedor donde se mostraron las preguntas y las respuestas
  const contenedor = document.getElementById("preguntas-container");

  // Obtener todas las preguntas
  const preguntasDOM = contenedor.querySelectorAll(".pregunta");

  // Recorrer cada pregunta y obtener la pregunta y las alternativas
  preguntasDOM.forEach((preguntaDOM) => {
    const preguntaInput = preguntaDOM.querySelector("input[type='text']");
    const alternativasDOM = preguntaDOM.querySelectorAll(".card-body");

    const alternativas = [];
    // Recorrer cada alternativa y obtener la alternativa y si es correcta o no
    alternativasDOM.forEach((alternativaDOM) => {
      const alternativaInput = alternativaDOM.querySelector(
        ".alternativa-input"
      );
      const esCorrectaRadio = alternativaDOM.querySelector(
        "option"
      );
      console.log(alternativaDOM);
      const alternativa = {
        texto: alternativaDOM.value,
        esCorrecta: esCorrectaRadio.checked,
      };

      alternativas.push(alternativa);
    });

    const respuestaCorrectaSelect = preguntaDOM.querySelector("select");

    const pregunta = {
      texto: preguntaInput.value,
      alternativas: alternativas,
      respuestaCorrecta: respuestaCorrectaSelect.value,
    };

    preguntas.push(pregunta);
  });

  console.log(preguntas);
}



// Obtener las preguntas
function guardarPreguntas() {
  const preguntas = obtenerPreguntas();

  // Convertir las preguntas a una cadena JSON
  const preguntasJSON = JSON.stringify(preguntas);

  // Almacenar la cadena JSON en una variable de cadena
  const preguntasString = encodeURIComponent(preguntasJSON);

  // Enviar la variable de cadena a una API o almacenarla en una base de datos
  console.log(preguntasString);
}

function quitarPregunta(event) {
  const pregunta = event.target.parentNode.parentNode;
  pregunta.parentNode.removeChild(pregunta);
}

function agregarPregunta() {
  const preguntasContainer = document.getElementById("preguntas-container");

  // Crear el elemento de pregunta
  const pregunta = document.createElement("div");
  pregunta.classList.add("pregunta","card", "mt-3");

  // Agregar los campos de pregunta, alternativas y respuesta
  pregunta.innerHTML = `
    <div class="card-body">
      <h3 class="card-title">Pregunta ${n_pregunta}</h3>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Escribe aquí la pregunta" />
      </div>
      <h3 class="card-title">Alternativas</h3>
      <div class="form-group">
        <input type="text" class="alternativa-input form-control mt-3" placeholder="Escribe aquí la alternativa 1" />
        <input type="text" class="alternativa-input form-control mt-3" placeholder="Escribe aquí la alternativa 2" />
        <input type="text" class="alternativa-input form-control mt-3" placeholder="Escribe aquí la alternativa 3" />
        <input type="text" class="alternativa-input form-control mt-3" placeholder="Escribe aquí la alternativa 4" />
      </div>
      <h3 class="card-title">Respuesta correcta</h3>
      <div class="form-group">
        <select class="form-control">
          <option value="1">Alternativa 1</option>
          <option value="2">Alternativa 2</option>
          <option value="3">Alternativa 3</option>
          <option value="4">Alternativa 4</option>
        </select>
      </div>
      <button class="btn btn-danger" onclick="quitarPregunta(event)">Quitar pregunta</button>
    </div>
  `;

  // Agregar la pregunta al contenedor de preguntas
  preguntasContainer.appendChild(pregunta);
  n_pregunta++;
}
</script>
<script>
  const list = document.getElementsByTagName("LI")[7];
  list.className += "active";
</script>
@endsection