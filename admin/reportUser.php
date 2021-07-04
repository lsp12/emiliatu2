
<?php
ob_start();
  require_once('../modelo/admin.php');
  session_start();
  $id=$_SESSION['user_id']; 

  if($id==null){
    header("location: login/index.php");
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
  
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/Chart.min.js"></script>
    <style>
        body{
            background-image: url(img/g9.jpg); 
            /* background-position: center; */
            background-attachment: fixed;
            background-repeat: no-repeat;
        }
        .fondo{
            background-color: rgba(248, 251, 255, 0.904);
        }
    </style>
</head>
<body>
<ul class="nav justify-content-end ">
  <li class="nav-item m-2">
    <?php
    include_once("componentes/modal.php"); 
    ?>
  </li>
  <li class="nav-item m-2">
  
    <a class="btn btn-primary"  href="../cerrar.php">Cerrar sesion</a>
  </li>
</ul>
    <div class="container-fluid fondo mb-3 pb-4 rounded-lg">
    
        <div class="m-5">
            <h1 class="text-center p-5">Empleados</h1>
            
            <div class="row justify-content-between">
                <div class="col-3">
                  <div class="nav flex-column nav-pills bg-dark rounded-lg" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab"  href="admin-1.php" role="tab" aria-controls="v-pills-home" >Regresar a pagina principal</a>
                    <a class="nav-link" id="v-pills-home-tab"  href="ganacias.php" role="tab" aria-controls="v-pills-home2" >Reporte de Ganacias</a>
                    <a class="nav-link " id="v-pills-home-tab"  href="reportBus.php" role="tab" aria-controls="v-pills-home2" >Reporte Buses</a>
                  </div>
                </div>
                <div class="col-9">
                  <div class="tab-content" id="v-pills-tabContent">
                    <?php
                        include_once("componentes/reportUsers1.php");
                        
                    ?>              
        </div>
      </div>
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
