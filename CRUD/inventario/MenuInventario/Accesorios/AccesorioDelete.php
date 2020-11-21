<?php
include("../../../../ldap/seguridadInventarioInside.php");
include '../../../../sql/connector-Board.php';
date_default_timezone_set('America/Mexico_City');
$id = $_GET['id'];

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
            </nav>
            <?php
            $fallo = false;
            $sql = 'DELETE FROM Accesorio WHERE id_Accesorio=(?)';
            $params = array($id);

            $result = sqlsrv_query($conn, $sql, $params);
            if ($result === false) {
                die(print_r(sqlsrv_errors(), true));
                $fallo = true;
            }
            if ($fallo == true) {
                echo "<script> alert('No se ha podido eliminar los datos con exito. Vuelva a intentarlo por favor.'); window.location.href='Accesorios.php'; </script>";
            } else {
                echo "<script> alert('Se han aliminar los datos de manera exitosa.'); window.location.href='Accesorios.php'; </script>";
            }
            ?>
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