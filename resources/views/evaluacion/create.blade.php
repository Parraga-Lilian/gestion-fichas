@extends('layouts.sidebar-admin')
@section('contenido')
<div class="container">
    <h1 class="my-4">Crear evaluacion</h1>
    <div id="preguntas-container">
    <!-- Aquí se agregarán las preguntas -->
    </div>
    <button class="btn btn-primary my-3" onclick="agregarPregunta()">Agregar pregunta</button>
    <div>
        <form action="{{route('evaluacion.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Get the idUser from the login variable in order to save the new course -->
            <input type="hidden" name="idUser" value="{{ auth()->user()->idUser }}">

             <!--Enviar información-->
             <input id="evpreguntas" name="preguntas" type="hidden" value="" />
             <input id="evalternativas" name="alternativas" type="hidden" value="4" />
             <input id="evrespuesta" name="respuestas" type="hidden" value="1" />
             <input id="evnpreguntas" name="npreguntas" type="hidden" value="" />
             <input id="evmaximo" name="maximo" type="hidden" value="10" />
             <input id="evestado" name="estado" type="hidden" value="activo" />
             <!-- End -->

            <input id="btnvalidarpregunta" class="btn btn-success my-3" type="button" onclick="validarPreguntas()" value="Validar Preguntas" />
            <input id="btnguardarpregunta" class="btn btn-success my-3"
            type="submit" value="Guardar Preguntas" />

        </form>
    </div>
</div>
<script src="tu-archivo-js.js"></script>
<script>
let n_pregunta = 1;
contenedor.disabled = true;
function obtenerPreguntas() {
  const preguntas = [];
  const contenedor = document.getElementById("preguntas-container");
  const preguntasDOM = contenedor.getElementsByClassName("pregunta");

  for (let i = 0; i < preguntasDOM.length; i++) {
    const preguntaDOM = preguntasDOM[i];
    const preguntaInput = preguntaDOM.getElementsByTagName("input")[0];
    const alternativasDOM = preguntaDOM.getElementsByClassName("alternativa-input");
    const respuestaCorrectaSelect = preguntaDOM.getElementsByTagName("select")[0];
    const alternativas = [];

    for (let j = 0; j < alternativasDOM.length; j++) {
      const alternativaDOM = alternativasDOM[j];
      const alternativa = {
        alter: alternativaDOM.value,
      };
      alternativas.push(alternativa);
    }

    const pregunta = {
      num: i,
      preg: preguntaInput.value,
      alternativas: alternativas,
      respuestaCorrecta: respuestaCorrectaSelect.value,
    };

    preguntas.push(pregunta);
  }
  console.log(preguntas);
  return preguntas;
}

// Obtener las preguntas
function guardarPreguntas() {

}

function validarPreguntas(){
    const preguntas = obtenerPreguntas();
    // Convertir las preguntas a una cadena JSON
    const preguntasJSON = JSON.stringify(preguntas);
    // Almacenar la cadena JSON en una variable de cadena
    const preguntasString = encodeURIComponent(preguntasJSON);
    // Enviar la variable de cadena a una API o almacenarla en una base de datos
    document.getElementById('guardar')
    document.getElementById('evpreguntas').value = preguntasJSON;
    //document.getElementById('evalternativas').value = 4;
    //document.getElementById('evrespuesta').value = 1;
    document.getElementById('evnpreguntas').value = preguntas.length;
    //document.getElementById('evmaximo').value = 10;
    //document.getElementById('evestado').value = 1;
    const contenedor = document.getElementById("btnguardarpregunta");
    contenedor.disabled = false;
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
        <input type="text" class="alternativa-input form-control mt-3" placeholder="Escribe aquí la alternativa 1" required />
        <input type="text" class="alternativa-input form-control mt-3" placeholder="Escribe aquí la alternativa 2" required />
        <input type="text" class="alternativa-input form-control mt-3" placeholder="Escribe aquí la alternativa 3" required />
        <input type="text" class="alternativa-input form-control mt-3" placeholder="Escribe aquí la alternativa 4" required />
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
