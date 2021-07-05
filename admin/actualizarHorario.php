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
            <h1 class="text-center p-5">Administracion</h1>
            
            <div class="row justify-content-between">
                <div class="col-2">
                  <div class="nav flex-column nav-pills bg-dark rounded-lg" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">Vista general</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Insertar nuevo conductor</a>
            <a class="nav-link" id="v-pills-profile-tab" href="actualizarHorario.php" role="tab" aria-controls="v-pills-profile" aria-selected="false">Actualizar horario</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile-3" role="tab" aria-controls="v-pills-profile" aria-selected="false">acreditacion de boleto</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile-4" role="tab" aria-controls="v-pills-profile" aria-selected="false">Insertar bus</a>
            <a class="nav-link" id="v-pills-profile-tab" href="ganacias.php" role="tab" aria-controls="v-pills-profile" aria-selected="false">Ver Reporte</a>
            <a class="nav-link" id="v-pills-profile-tab" href="graficos2.php" role="tab" aria-controls="v-pills-profile" aria-selected="false">Mas Detalles</a>
                  </div>
                </div>
                <div class="col-10">
                  <div class="tab-content" id="v-pills-tabContent">
                  <div  style="background-color: white;">
                    <h2>Horario semanal</h2>
                    <form method="POST"  action="admin-1.php">
                        <div class="form-group row mb-4">
                        <div class="col-6">
                          <label for="exampleFormControlSelect2">Destino</label>
                          <select class="form-control" id="cantones" name="id_destino">
                            <option value="">Seleciona</option>
                            <?php
                            $destino=mostrarDestino();
                            
                            
                            foreach ($destino as $fila) {
                                
                                echo "
                                <option value='".$fila['id_destino'] ."'>".$fila['nombre']."</option>
                                ";
                            }
                        ?>
                          </select>
                          </div>

                          <div class="col-6">
                          <label for="exampleFormControlSelect2">Conductor</label>
                          <select class="form-control" id="cantones" name="conductor">
                            <option value="">Seleciona</option>
                            <?php
                            $conductores=mostrarConductor();
                            
                            foreach ($conductores as $fila) {
                                
                                echo "
                                <option value='".$fila['cedula'] ."'>".$fila['nombre_emp']."</option>
                                ";
                            }
                        ?>
                          </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-5">
                          <label for="exampleFormControlSelect2">Bus</label>
                          <select class="form-control" id="tipo" name="bus">
                          <option value="">Seleciona</option>
                          <?php
                            $buses=mostrarBuses();
                            
                            foreach ($buses as $fila) {
                                
                                echo "
                                <option value='".$fila['matricula'] ."'>".$fila['matricula']."</option>
                                ";
                            }
                        ?>
                          
                          </select>
                          </div>
                          <div class="col-4">
                          <label for="exampleFormControlSelect2">Fecha de salida</label>
                          <input type="date" name="fecha" id="" >
                          </div>
                          <div class="col-3">
                          <label for="exampleFormControlSelect2">hora de salida</label>
                          <input type="time" name="hora" id="" >
                          </div>
                          <!-- <div class="col-3">
                          <label for="exampleFormControlSelect2">hora de llegada</label>
                          <input type="time" name="llegada" id="">
                          </div> -->
                        </div>
                        <!-- <div class="form-group">
                          <label for="exampleFormControlInput1">Ingrese numero</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Solo numeros" name="valor">
                        </div> -->
                        <input type="submit" value="Guardar" class="btn btn-primary" name="enviar">
                        
                      </form>

                      <?php 
                      if(isset($_POST['enviar'])){
                        $id_des=$_POST['id_destino'];
                        $fecha=$_POST['fecha'];
                        $hora=$_POST['hora'];
                        $id_bus=$_POST['bus'];
                        $ced=$_POST['conductor'];
                        $fecha1 = date("y-m-d", strtotime($fecha));
                        /* actualizarDestino($id_des, $fecha1, $hora,$ced,$id_bus); */
                        agregarfecha($ced,$id_des,$id_bus, $fecha1,$hora);
                        /* $act=buscarRutas($id_des,$ced,$fecha1,$id_bus);
                        echo var_dump($act); */
                      }
                      
                      ?>
                    </div>      
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
