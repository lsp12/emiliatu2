<?php
ob_start();
require_once('../modelo/admin.php');
    $id = $_GET['user'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/Chart.min.js"></script>
    <style>
        body {
            background-image: url(img/g9.jpg);
            /* background-position: center; */
            background-attachment: fixed;
            background-repeat: no-repeat;


        }

        .fondo {
            background-color: rgba(248, 251, 255, 0.904);
        }
    </style>


</head>

<body>
    <ul class="nav justify-content-end ">

    </ul>
    <div class="container fondo mb-3 pb-4 rounded-lg">

        <div class="m-5">
            <h1 class="text-center">Reporte</h1>
            <table class="table table-striped rounded-lg" id="tabla">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Dia de viaje</th>
                        <th scope="col">Destino</th>
                        <th scope="col">Hora de salida</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $employee=HistorialEmple($id);
                    $a = 1;
                    foreach ($employee as $list) {
                        echo "
            <tr>
              <th scope='row'>" . $a . "</th>
              <td>" . $list['nombre_emp'] . "</td>
              <td>" . $list['cedula'] . "</td>
              <td>" . $list['fecha_salida'] . "</td>
              <td>" . $list['nombre'] . "</td>
              <td>" . $list['hora_salida'] . "</td>
              
              
            </tr>        
            ";
                        $a++;
                    }

                    ?>
                </tbody>
            </table>
        </div>

    </div>




    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
    <script>


    </script>
    <?php
    include_once("componentes/scrip-de-graficos.php");
    ob_end_flush();

    ?>
</body>

</html>