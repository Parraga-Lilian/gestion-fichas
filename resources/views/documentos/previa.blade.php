@extends('layouts.plantilla')
@section('contenido')
<h1>Plantillas de documentos</h1>
  <!-- 16:9 aspect ratio -->
  <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" width="100%" height="800px" 
    src="{{asset('plantillas/ct-indefinido-001.pdf')}}"></iframe>
  </div>
  
@endsection