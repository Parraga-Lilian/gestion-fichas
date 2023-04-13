@extends('layouts.sidebar-empleado')
@section('contenido')
<?php use App\Models\Empleado; ?>

<h4>Información del negocio</h4>
@auth
    @if (!is_null($negocio))
        <form action="#" method="POST" >
            @csrf
            <div>
                <label for="ruc_asoc">RUC Asociado: </label>
                <input type="text" name="ruc_asoc" class="form-control" value="{{ $negocio->ruc_asoc }}" readonly />
            </div>
            <div>
                <label for="razon_social">Razon Social: </label>
                <input type="text" name="razon_social" class="form-control" value="{{ $negocio->razon_social }}" readonly />
            </div>
            <div>
                <label for="actividad">Actividad: </label>
                <input type="text" name="actividad" class="form-control" value="{{ $negocio->actividad }}" readonly />
            </div>
            <div>
                <label for="n_empleados">Número de empleados activos: </label>
                <input type="text" name="n_empleados" class="form-control" value="{{ count(Empleado::where('estado','activo')->get()) ?? 0 }}" readonly />
            </div>
            <div>
                <label for="correo">Correo: </label>
                <input type="text" name="correo" class="form-control" value="{{ $negocio->correo }}" readonly />
            </div>
            <div>
                <label for="direccion">Direccion/Ciudad: </label>
                <input type="text" name="direccion" class="form-control" value="{{ $negocio->direccion }}" readonly />
            </div>
        </form>
   @else
        <h4 class="text text-warning">La información del negocio debe ser definida por el administrador</h4>
   @endif
@endauth

@guest
    <h1>Homepage</h1>
    <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
@endguest
<script>
    const list = document.getElementsByTagName("LI")[2];
    list.className += "active";
</script>
@endsection
