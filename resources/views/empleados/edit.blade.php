@extends('layouts.plantilla')
@section('contenido')
<h2>Editar datos de Empleado</h2>
<form action="{{route('empleado.update', $empleado->idEmpleado)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div>
        <label for="cedula">Cedula</label>
        <input type="number" name="cedula" class="form-control" value="{{ $empleado->cedula }}">
    </div>
    <div>
        <label for="nombres">Nombres</label>
        <input type="text" name="nombres" class="form-control" value="{{ $empleado->nombres }}" />
    </div>
    <div>
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" class="form-control" value="{{ $empleado->apellidos }}" />
    </div>
    <div>
        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" class="form-control" value="{{ $empleado->direccion }}" />
    </div>
    <div>
        <label for="telefono">Telefono</label>
        <input type="text" name="telefono" class="form-control" value="{{ $empleado->telefono }}" />
    </div>
    <div>
        <label for="cargo">Cargo</label>
        <select class="form-select" aria-label="Default select example" name="cargo">
            @foreach(array("Funcionario","Vendedor","Asistente","Logística",
            "Supervisor","Recursos Humanos","Otros") as $cargo)
                @if ($cargo == $empleado->cargo)
                    <option value="{{ $cargo }}" selected>{{ $cargo }}</option>
                @else
                    <option value="{{ $cargo }}">{{ $cargo }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div>
        <label for="horario">Horario</label>
        <select class="form-select" aria-label="Default select example" name="horario">
            @foreach(array("4-10 a.m.","8-12 a.m.","2-5 p.m.","5-9 p.m.","9 p.m.-12 a.m.") as $horario)
                @if ($horario == $empleado->horario)
                    <option value="{{ $horario }}" selected>{{ $horario }}</option>
                @else
                    <option value="{{ $horario }}">{{ $horario }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div>
        <label for="seccion">Seccion</label>
        <select class="form-select" aria-label="Default select example" name="seccion">
            @foreach(array("Matutina","Vespertina","Nocturna","Jornada completa","Medio tiempo","Otros") as $seccion)
                @if ($seccion == $empleado->seccion)
                    <option value="{{ $seccion }}" selected>{{ $seccion }}</option>
                @else
                    <option value="{{ $seccion }}">{{ $seccion }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div>
        <label for="estado">Estado</label>
        <select class="form-select" aria-label="Default select example" name="estado">
            @foreach(array("activo","en proceso","desactivado") as $estado)
                @if ($estado == $empleado->estado)
                    <option value="{{ $estado }}" selected>{{ $estado }}</option>
                @else
                    <option value="{{ $estado }}">{{ $estado }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div>
        <label for="Foto">Foto</label>
        <img id="imgId" src="{{ asset('storage').'/'.$empleado->Foto }}" width="100px" alt="" />
        <input class="form-control" type="file" name="Foto" onchange="read(this)" />
    </div>
    <div>
        <input class="btn btn-success mt-2 form-control" type="submit" value="Modificar"/>
        <a class="btn btn-warning mt-1 form-control mb-3" href="{{route('empleado.index')}}">Regresar</a>
    </div>
</form>
<script>
    function read(val) {
        const reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById("imgId").src = event.target.result;
        }
        reader.readAsDataURL(val.files[0]);
    }
</script>
@include('layouts.generaldialog')
@yield('okEmployeeEdit')
@endsection