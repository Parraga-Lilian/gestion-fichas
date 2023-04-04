@extends('layouts.sidebar-admin')
@section('contenido')
<?php use App\Models\Empleado; ?>
<h2>Información del negocio</h2>
@auth
    @if (!is_null($negocio))
        <form action="{{route('negocio.update', $negocio->idNegocio)}}" method="POST" >
            @csrf
            @method('PUT')
            <div>
                <label for="ruc_asoc">RUC Asociado: </label>
                <input type="text" name="ruc_asoc" class="form-control" value="{{ $negocio->ruc_asoc }}" />
            </div>
            <div>
                <label for="razon_social">Razon Social: </label>
                <input type="text" name="razon_social" class="form-control" value="{{ $negocio->razon_social }}" />
            </div>
            <div>
                <label for="actividad">Actividad: </label>
                <input type="text" name="actividad" class="form-control" value="{{ $negocio->actividad }}" />
            </div>      
            <div>
                <label for="n_empleados">Número de empleados activos: </label>
                <input type="text" name="n_empleados" class="form-control" value="{{ count(Empleado::where('estado','activo')->get()) ?? 0; }}" readonly />
            </div>
            <div>
                <label for="correo">Correo: </label>
                <input type="text" name="correo" class="form-control" value="{{ $negocio->correo }}" />
            </div>
            <div>
                <label for="direccion">Direccion/Ciudad: </label>
                <input type="text" name="direccion" class="form-control" value="{{ $negocio->direccion }}" />
            </div>
            <div>
                <input class="btn btn-success mt-2 form-control" type="submit" value="Modificar"/>
            </div>        
        </form>
    @else
    <form action="{{route('negocio.store')}}" method="POST" >
        @csrf
        <div>
            <label for="ruc_asoc">RUC Asociado: </label>
            <input type="text" name="ruc_asoc" class="form-control" value="" required />
        </div>
        <div>
            <label for="razon_social">Razon Social: </label>
            <input type="text" name="razon_social" class="form-control" value="" required />
        </div>
        <div>
            <label for="actividad">Actividad: </label>
            <input type="text" name="actividad" class="form-control" value="" required />
        </div>      
        <div>
            <label for="n_empleados">Número de empleados activos: </label>
            <input type="text" name="n_empleados" class="form-control" value="{{ (count((array)Empleado::where('estado','activo')) - 1) ?? 0; }}" readonly />
        </div>
        <div>
            <label for="correo">Correo: </label>
            <input type="email" name="correo" class="form-control" value="" required />
        </div>
        <div>
            <label for="direccion">Direccion/Ciudad: </label>
            <input type="text" name="direccion" class="form-control" value="" required />
        </div>
        <div>
            <input class="btn btn-success mt-2 form-control" type="submit" value="Aceptar"/>
        </div>        
    </form>
    @endif
    <script>
      const list = document.getElementsByTagName("LI")[4];
      list.className += "active";
    </script>
    @include('layouts.generaldialog')
    @yield('okBusinessEdit')
@endauth

@guest
    <h1>Homepage</h1>
    <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
@endguest

@endsection