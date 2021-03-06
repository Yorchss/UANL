<?php
include("../../../../ldap/seguridadInventarioInside.php");
include '../../../../sql/connector-Board.php';
date_default_timezone_set('America/Mexico_City');


?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Inventario</title>



    <!-- Bootstrap core CSS -->


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->

    <script src="../../../../js/jquery-3.2.1.min.js"></script>
    <link href="../../../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../../css/dashboard.css" rel="stylesheet">
    <link href="../../../../css/colors.css" rel="stylesheet">

</head>

<body>

    <div class="sticky-top flex-md-nowrap">
        <nav class=" sticky-top  bg-white shadow">
            <div class="container d-flex flex-column flex-md-row justify-content-between">
                <img src="../../../../images/logo-indalum-rec.jpg" width="30%" class="img-fluid d-block " alt="Responsive image">
                <div class="h3 m-2"><?php echo $_SESSION["nombre"];
                                    echo " ";
                                    echo $_SESSION["apellido"]; ?></div>
                <div class="m-2 h3"> <?php echo strftime("%d/%m/%Y", strtotime("now")); ?> </div>
                <div class="m-2">
                    <button type="button" class="btn backAzul">
                        <a class="text-light" href="../../../../ldap/salir.php">Salir</a>
                    </button>
                </div>

            </div>
        </nav>
        <nav class="navbar navbar-dark p-0 backAzul">
            <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3 " href="../../inventario.php">Inicio</a>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <button type="button m-0 " class="btn backBlanco padding-0" ;>
                        <a class="nav-link p-1 " href="../../../../index.php" style=" color:  #05318d;">Regresar</a>
                    </button>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row">
            <nav id="" class="col-2 col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="sidebar-sticky padding-top-5">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="../Activos/Activos.php" id="">
                                <span data-feather="layers"></span>
                                Activos <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="../Asignaciones/Asignaciones.php" id="">
                                <span data-feather="layers"></span>
                                Asignaciones <span class="sr-only">(current)</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link " href="../Correos/Correos.php" id="">
                                <span data-feather="layers"></span>
                                Correos <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="../Dispositivos/Dispositivos.php" id="">
                                <span data-feather="layers"></span>
                                Dispositivos <span class="sr-only">(current)</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link " href="../Empleados/Empleados.php" id="">
                                <span data-feather="layers"></span>
                                Empleados <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="../Licencias/Licencias.php" id="">
                                <span data-feather="layers"></span>
                                Licencias <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="../UsuariosAD/UsusariosAD.php" id="">
                                <span data-feather="layers"></span>
                                Usuarios A/D <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../Accesorios/Accesorios.php" id="">
                                <span data-feather="layers"></span>
                                Accesorios <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>


                </div>
            </nav>
            <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <br>
                <div class="display-4">Ingresar nuevo accesorio</div>
                <br>
                <form class="col-md-12 col-xl-6" action="AccesorioCrearResult.php" method="post">
                    <div class="form-group row">
                        <label class="col-md-6 col-lg-4 col-xl-5 col-form-label">
                            <h4>Tipo de Accesorio:</h4>
                        </label>
                        <div class="col-md-6 col-xl-7">
                            <input name="tipoAccesorio" type="text" class="form-control" id="inputZip" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-lg-1 col-xl-2 col-form-label">
                            <h4>Marca:</h4>
                        </label>
                        <div class="col-md-3 col-xl-3">
                            <input name="marca" type="text" class="form-control" id="inputZip" value="" required>
                        </div>
                        <label class="col-md-3 col-xl-2 col-form-label">
                            <h4>Modelo:</h4>
                        </label>
                        <div class="col-md-3 col-xl-5">
                            <input name="modelo" type="text" class="form-control" id="inputZip" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-lg-1 col-xl-2 col-form-label">
                            <h4>Serie:</h4>
                        </label>
                        <div class="col-md-3 col-xl-3">
                            <input name="serie" type="text" class="form-control" id="inputZip" value="" required>
                        </div>                        
                    </div>
                    <div class="col-md-12 col-lg-10 col-xl-12 text-center">
                        <button type="submit" class="btn backAzul text-light" type="submit">
                            Crear
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../../../../../js/jquery-3.5.1.slim.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="../../../../js/bootstrap.bundle.min.js"></script>
    <script src="../../../../js/feather.min.js"></script>
    <script src="../../../../js/Chart.min.js"></script>
    <script src="../../../../js/dashboard.js"></script>


</body>

</html>