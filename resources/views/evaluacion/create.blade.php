@php
    $layout = (auth()->user()->tipo == "administrador") ? 'layouts.sidebar-admin' : 'layouts.sidebar-empleado';
@endphp
@extends($layout)
@section('contenido')
<div class="container">
    <h2 class="my-4">Crear evaluacion</h2>
    <div>
        <form action="{{route('evaluacion.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Get the idUser from the login variable in order to save the new course -->
            <input type="hidden" name="idUser" value="{{ auth()->user()->idUser }}">
            <input type="hidden" class="form-control" id="nusuario" name="nusuario"
            value="{{auth()->user()->username}}" />
            <label for="codigo">Codigo:</label>
            <input type="text" id="codigo" style="border-radius:5px;width:40%;" class="form-control" name="codigo"
            placeholder="Nombre o descripcion del examen" readonly />

            <label for="nombre">Nombre de la evaluacion:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required />

            <label for="descripcion">Descripción de la evaluacion:</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required />

            <label for="tiempo">Tiempo en minutos:</label>
            <input id="tiempo" style="border-radius:5px;width:20%;" class="form-control" name="tiempo"
            type="number" value="1" min="0" required />
             <!--Enviar información-->
             <input id="evpreguntas" name="preguntas" type="hidden" value="" />
             <input id="evalternativas" name="alternativas" type="hidden" value="4" />
             <input id="evrespuesta" name="respuestas" type="hidden" value="1" />
             <input id="evnpreguntas" name="npreguntas" type="hidden" value="" />
             <input id="evmaximo" name="maximo" type="hidden" value="10" />
             <input id="evestado" name="estado" type="hidden" value="activo" />
             <!-- End -->
            <input id="btnvalidarpregunta" class="btn btn-success my-3" type="button"
            onclick="validarPreguntas()" value="Validar Preguntas" />
            <input id="btnguardarpregunta" style="display:none;" class="btn btn-success my-3"
            type="submit" value="Guardar Preguntas" />
        </form>
    </div>
    <div id="preguntas-container">
    <!-- Aquí se agregarán las preguntas -->
    </div>
    <button class="btn btn-primary my-3" onclick="agregarPregunta()">Agregar pregunta +</button>
</div>
<script>
let n_pregunta = 1;
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

function validarPreguntas() {
  const preguntas = obtenerPreguntas();
  // Convertir las preguntas a una cadena JSON
  const preguntasJSON = JSON.stringify(preguntas);
  const nombres = document.getElementById('nombre');
  const descripcion = document.getElementById('descripcion');
  const tiempo = document.getElementById('tiempo');
  //console.log(preguntasJSON.preg);
  if (!preguntas.some(p => p.preg.trim() !== "")) {
    // Mostrar un alert y salir de la función
    alert("Debe agregar al menos una pregunta");
    return;
  }


  if (preguntasJSON === "[]" || nombres.value === ""
  || descripcion.value === "" || tiempo.value <= 0)  {
    // Si la variable preguntasJSON está vacía, mostrar un alert
    alert("Falta información por llenar");
  } else {
    // Si la variable preguntasJSON no está vacía, habilitar el botón btnGuardar
    const btnGuardar = document.getElementById("btnguardarpregunta");
    btnGuardar.style.display = "block";

    // Asignar la cadena JSON a un campo oculto en el formulario
    document.getElementById("evpreguntas").value = preguntasJSON;
    document.getElementById("evnpreguntas").value = preguntas.length;
    document.getElementById("evmaximo").value = preguntas.length;
  }
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
      <button class="btn btn-danger" onclick="quitarPregunta(event)">Quitar pregunta -</button>
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
  const codigo = document.getElementById('codigo');
  codigo.value = generarCadenaAlfanumerica();

  function generarCadenaAlfanumerica() {
    const caracteres = 'abcdefghijklmnopqrstuvwxyz0123456789';
    let cadena = '';
    for (let i = 0; i < 10; i++) {
        const indice = Math.floor(Math.random() * caracteres.length);
        cadena += caracteres[indice];
    }
    return cadena;
  }

</script>
@endsection
