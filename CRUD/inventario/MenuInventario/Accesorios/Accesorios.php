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

    <script src="../../../../js/bootstrap.js"></script>
    <script src="../../../../js/jquery-3.2.1.min.js"></script>
    <link href="../../../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../../css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../../css/colors.css">



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
                <div class="col-12 container">
                    <div class="row justify-content-between">
                        <div class="display-4">Lista de Accesorios</div>
                        <a class="btn backAzul text-light m-3" style="font-size:1.5rem;" type="button" href="AccesorioCreate.php">Crear Nuevo</a>
                    </div>

                </div>

                <br>

                <div class="table-responsive mx-auto text-center">
                    <table class="table table-striped table-sm">

                        <?php


                        ?>
                        <thead>
                            <th class="texto">Tipo</th>
                            <th class="texto">Marca</th>
                            <th class="texto">Modelo</th>
                            <th class="texto">Serie</th>
                            <th class="texto">Fecha de creación</th>
                            <th class="texto">Estatus</th>
                            <th colspan="2"><img src="../../../../images/svg/cog-solid.svg" width="25px"></th>

                        </thead>

                        <tbody>
                            <?php
                            $sql = "SELECT id_Accesorio,tipo_Accesorio,Modelo_Accesorio,serie_Accesorio,fecha_Accesorio,creador_Accesorio,idAsignacion_Accesorio,marca_Accesorio FROM Accesorio ";

                            $result = sqlsrv_query($conn, $sql);
                            if ($result === false) {
                                die(print_r(sqlsrv_errors(), true));
                            }

                            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) 
                            {
                                $Activo = $row['idAsignacion_Accesorio'];
                                $Activo = strval($Activo);
                                if($Activo == ""){
                                    $Activo = "Disponible";
                                }else{
                                    $Activo = "No Disponible";
                                } ?>

                                <tr>
                                    <td class="texto"><?php echo $row['tipo_Accesorio'] ?></td>
                                    <td class="texto"><?php echo $row['marca_Accesorio'] ?></td>
                                    <td class="texto"><?php echo $row['Modelo_Accesorio'] ?></td>
                                    <td class="texto"><?php echo $row['serie_Accesorio'] ?></td>
                                    <td class="texto"><?php $date = $row['fecha_Accesorio']->format('d/m/y');
                                                        echo $date ?></td>
                                    <td class="texto"><?php echo $Activo ?></td>                                    
                                    <td><button type="button" data-toggle="modal" data-target="#staticBackdrop<?php echo $row['id_Accesorio'] ?>" style="padding: 0;border: none;background: none; "><img src="../../../../images/svg/trash-alt-solid.svg" width="25px" style="fill: red;"></button></td>
                                    <td><button type="button" data-toggle="modal" data-target="#staticBackdropE<?php echo $row['id_Accesorio'] ?>" style="padding: 0;border: none;background: none; "><img src="../../../../images/svg/edit-solid.svg" width="25px"></button></td>                                    
                                </tr>

                                <div class="modal fade" id="staticBackdrop<?php echo $row['id_Accesorio'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="staticBackdropLabel">Eliminar Registro</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h3>¿Está seguro que desea eliminar de forma permanente el accesorio: <strong> <?php echo $row['tipo_Accesorio']."-".$row['marca_Accesorio']; ?></strong>?</h3>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-danger text-light m-3" style="font-size:1.5rem;" type="button" href="AccesorioDelete.php?id=<?php echo $row['id_Accesorio']; ?>">Eliminar</a>
                                                <button type="button" class="btn backAzul text-light" style="font-size:1.5rem;" data-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="staticBackdropE<?php echo $row['id_Accesorio'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="staticBackdropLabel">Editar Registro</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="texto2">¿Está seguro que desea editar el Accesorio: <strong> <?php echo $row['tipo_Accesorio']."-".$row['marca_Accesorio']; ?></strong>?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-info text-light m-3 " style="font-size:1.5rem;" type="button" href="AccesorioEdit.php?id=<?php echo $row['id_Accesorio'] ?>">Editar</a>
                                                <button type="button" class="btn backAzul text-light " style="font-size:1.5rem;" data-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>



            </div>
        </div>
    </div>
    <script src="../../../../js/jquery-3.5.1.slim.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="../../../../js/bootstrap.bundle.min.js"></script>
    <script src="../../../../js/feather.min.js"></script>
    <script src="../../../../js/Chart.min.js"></script>
    <script src="../../../../js/dashboard.js"></script>
    <script>

    </script>

</body>

</html>