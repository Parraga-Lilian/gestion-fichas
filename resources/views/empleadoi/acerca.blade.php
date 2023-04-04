@extends('layouts.sidebar-empleado')
@section('contenido')
<h2>Acerca de:</h2>
    <fieldset>
        <h4> <u>Mi perfil: </u>visualizacion de informacion de administrador</h4>
        <h4><u>Usuarios: </u>Usuarios del sistema</h4>
        <h4><u>Empleados: </u>Funcionarios por tipo</h4>
        <h4><u>Negocio: </u>Información sobre el negocio, razón social y actividades</h4>
        <h4><u>Acerca de: </u>Información sobre el desarrollador y contacto</h4>
        <h4><u>Cerrar sesión: </u>Salir de la aplicación</h4>
    </fieldset>
    <h4>Software:</h4>
    <fieldset>
        <p>Versión del software 1.1</p>
        <h4>Para soporte técnico, por favor comunicarse al siguiente correo:</h4>
        <p>lilian.parraga@utelvt.edu.ec</p>
    </fieldset>
    <script>
        const list = document.getElementsByTagName("LI")[3];
        list.className += "active";
    </script>
@endsection