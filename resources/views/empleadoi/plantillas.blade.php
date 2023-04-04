@extends('layouts.sidebar-empleado')
@section('contenido')
<h1>Plantillas de documentos</h1>
<div class="card" style="width:280px;float:left;margin-left:3%;">
    <img class="card-img-top" src="{{asset('imagenes/contrato.jpg')}}" alt="Contrato de trabajo" style="width:100%">
    <div class="card-body">
    <h4 class="card-title">Contrato de trabajo</h4>
    <p class="card-text">Contrato de trabajo por tiempo indefinido</p>
    <a href="../plantillas/ct-indefinido-001.docx" class="btn btn-primary form-control mt-1" download>
    <object data="{{asset('imagenes/docxfile.svg')}}"> </object> Bajar DOC</a>

    <a href="../plantillas/ct-indefinido-001.pdf" class="btn btn-danger form-control mt-1" download>
    <object data="{{asset('imagenes/pdffile.svg')}}"> </object>Bajar PDF</a>
    
    <a onclick='window.open("../plantillas/ct-indefinido-001.pdf","_blank")' class="btn btn-success form-control mt-1">
        <object data="{{asset('imagenes/eye.svg')}}"> </object> Vista Previa</a>
    </div>
</div>

<div class="card" style="width:280px;float:left;margin-left:3%;">
    <img class="card-img-top" src="{{asset('imagenes/solicitud.jpg')}}" alt="Solicitud de vacaciones" style="width:100%">
    <div class="card-body">
    <h4 class="card-title">Solicitud vacaciones</h4>
    <p class="card-text">Plantilla de solicitud para vacaciones laborales</p>
    <a href="../plantillas/solicitud-vacaciones-002.docx" class="btn btn-primary form-control mt-1" download>
    <object data="{{asset('imagenes/docxfile.svg')}}"> </object> Bajar DOC</a>

    <a href="../plantillas/solicitud-vacaciones-002.pdf" class="btn btn-danger form-control mt-1" download>
    <object data="{{asset('imagenes/pdffile.svg')}}"> </object>Bajar PDF</a>
    
    <a onclick='window.open("../plantillas/solicitud-vacaciones-002.pdf","_blank")' class="btn btn-success form-control mt-1">
        <object data="{{asset('imagenes/eye.svg')}}"> </object> Vista Previa</a>
    </div>
</div>

<div class="card mr-2" style="width:280px;float:left;margin-left:3%;">
    <img class="card-img-top" src="{{asset('imagenes/justificacion.jpg')}}" alt="Justificación laboral" style="width:100%">
    <div class="card-body">
    <h4 class="card-title">Justificación laboral</h4>
    <p class="card-text">Documento para justificar inasistencia laboral</p>
    <a href="../plantillas/justificacion-003.docx" class="btn btn-primary form-control mt-1" download>
    <object data="{{asset('imagenes/docxfile.svg')}}"> </object> Bajar DOC</a>

    <a href="../plantillas/justificacion-003.pdf" class="btn btn-danger form-control mt-1" download>
    <object data="{{asset('imagenes/pdffile.svg')}}"> </object>Bajar PDF</a>
    
    <a onclick='window.open("../plantillas/justificacion-003.pdf","_blank")' class="btn btn-success form-control mt-1">
        <object data="{{asset('imagenes/eye.svg')}}"> </object> Vista Previa</a>
    </div>
</div>
<script>
    const list = document.getElementsByTagName("LI")[1];
    list.className += "active";
</script>
@endsection