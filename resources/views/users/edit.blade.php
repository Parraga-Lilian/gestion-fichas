@extends('layouts.sidebar-admin')
@section('contenido')
<h2>Editar datos de Usuario</h2>
<form action="{{route('user.update', $user->idUser)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div>
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
    </div>
    <div>
        <label for="username">Usuario</label>
        <input type="text" name="username" class="form-control" value="{{ $user->username }}" />
    </div>
    <div>
        <label for="password">Clave/Nueva Clave</label>
        <input type="text" name="password" class="form-control" value="{{ $user->password }}" />
    </div>
    <div>
        <label for="email">Correo</label>
        <input type="text" name="email" class="form-control" value="{{ $user->email }}" />
    </div>
    <div>
        <input class="btn btn-success mt-2 form-control" type="submit" value="Modificar"/>
        <a class="btn btn-warning mt-1 form-control" href="{{route('user.index')}}">Regresar</a>
    </div>
</form>
<!-- Success dialog -->
@if (session()->has('success_edit'))
<!-- Button trigger modal -->
<div class="modal fade show" id="successEdit" tabindex="-1" role="dialog" 
data-mdb-toggle="animation" data-mdb-animation-reset="true" data-mdb-animation="fly-in-up"
aria-labelledby="successEdit" style="display: block;">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">¡Mensaje!</h5>
    <button type="button" class="close" data-dismiss="modal" onclick="javascript:document.getElementById('successEdit').style.display='none'" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    </div>
    <div class="modal-body">
    Usuario modificado correctamente.
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="javascript:document.getElementById('successEdit').style.display='none'">Aceptar</button>
    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
    </div>
</div>
</div>
</div>
@endif
@endsection
