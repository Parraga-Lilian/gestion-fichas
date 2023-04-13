<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Empleado</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css')}}">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <style>
        #sidebar {
            background: #1f8035;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 200px;
        }

        #sidebar .sidebar-header {
            background: #18742e;
        }

        #sidebar ul li a:hover {
            color: #a0af5f;
            background: #fff;
        }

        #sidebar ul li a i {
            margin-right: 10px;
        }

        #sidebar ul li.active>a,
        a[aria-expanded="true"] {
            color: #fff;
            background: #a0af5f;
        }

        ul ul a {
            font-size: 0.9em !important;
            padding-left: 30px !important;
            background: #a0af5f;
        }

        body {
            padding-left: 200px;
        }

        #content {
            margin-left: 50px; /* Ancho de la sidebar */
        }

        @media (max-width: 768px) {
            #content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4>Dashboard</h4>
                @if (is_null(auth()->user()))
                    No has ingresado. <a href="/logout">Login</a>
                @else
                    <i>{{ auth()->user()->name ?? auth()->user()->email  }}</i>
                @endif
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="/empleadoi">
                        <i class="fas fa-home"></i>
                        Inicio/Perfil
                    </a>
                    <!--<ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                    </ul>-->
                </li>
                <li>
                    <!--<a href="#">
                        <i class="fas fa-briefcase"></i>
                        Mi perfil
                    </a>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-copy"></i>
                        Documentos
                    </a>-->
                   <!-- <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Plantillas</a>
                        </li>
                    </ul>-->

                    <a href="/empleadoiplantillas">
                        <i class="fas fa-newspaper"></i>
                        Plantillas</a>
                </li>
                <li>
                    <a href="/empleadoinegocio">
                        <i class="fas fa-briefcase"></i>
                        Negocio
                    </a>
                </li>
                <li>
                    <a href="/curso">
                        <i class="fas fa-graduation-cap"></i>
                        Cursos Realizados
                    </a>
                </li>
                <li>
                    <a href="/certificacion">
                        <i class="fas fa-certificate"></i>
                        Certificaciones
                    </a>
                </li>
                <li>
                    <a href="/evaluacion">
                        <i class="fas fa-chart-bar"></i>
                        Evaluaciones
                    </a>
                </li>
                <li>
                    <a href="/empleadoiacerca">
                        <i class="fas fa-info"></i>
                        Acerca de
                    </a>
                </li>
                <li>
                    <a href="/logout">
                        <i class="fas fa-key"></i>
                        Cerrar sesion
                    </a>
                </li>
            </ul>

            <!--<ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul>-->
        </nav>

        <!-- Page Content  -->
        <div class="container-fluid" id="content">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Menu</span>
            </button>
            @yield('contenido')
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>
