<div>
  <form action="ganacias.php" method="post">
    <h1>Selecione la fecha </h1>
    <input class="input-group-text" type="date" name="fecha">
    <input type="submit" class="btn btn-primary mt-3" value="enviar">
  </form>
</div>

<?php
if (isset($_POST["fecha"])) {
  /* echo '<script>
alert("si hay fecha ' . $_POST["fecha"] . '");
</script>'; */
  if ($_POST["fecha"] == "") {
    $fecha = null;
    $GananciasTab=gananciasTabSin();
  } else {
    $fecha = $_POST["fecha"];
    $GananciasTab = gananciasTab($fecha);
  }
} else {
  /* echo '<script>
alert("no hay fecha");
</script>'; */
  $fecha = null;
  $GananciasTab=gananciasTabSin();
}

$Ganancias = gananciasFe($fecha);

  ?>
  <div style="margin-top: 2rem; margin-bottom: 2rem;">

<h2> Ganancias totales <?php if ($Ganancias[0]['total'] != null) {
                          echo $Ganancias[0]['total'];
                        } else {
                          echo "0";
                        } ?> cantidad de voletos vendidos <?php if ($Ganancias[0]['cantidad'] != null) {
                                              echo $Ganancias[0]['cantidad'];
                                            } else {
                                              echo "0";
                                            } ?> </h2>
<!-- <h2> ganancias totales <?php echo $Ganancias[0]['total'] ?> </h2> -->
</div>
<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

  <h2 class="text-center">Vista general</h2>
  
  <table class="table table-striped" id="tabla">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Cedula</th>
        <th scope="col">Nombre</th>
        <th scope="col">Telefono</th>
        <th scope="col">Correo</th>
        <th scope="col">Destino</th>
        <th scope="col">Bol</th>
        <th scope="col">din</th>
        <th scope="col">fecha de salida</th>
        <th scope="col">hora salida</th>
      </tr>
    </thead>
    <tbody>
      <?php
      
      
      $a = 1;
      foreach ($GananciasTab as $list) {
        if($list['numeroTEl']=='' || $list['numeroTEl']==null){
          $list['numeroTEl']="N/A";
        }
        if($list['numeroCED']=='' || $list['numeroCED']==null){
          $list['numeroCED']="N/A";
        }
        echo "
            <tr>
              <th scope='row'>" . $a . "</th>
              <td>" . $list['numeroCED'] . "</td>
              <td>" . $list['username'] . "</td>
              <td>" . $list['numeroTEl'] . "</td>
              <td>" . $list['email'] . "</td>
              <td>" . $list['nombre'] . "</td>
              <td>" . $list['boletos'] . "</td>
              <td>" . $list['costo'] . "</td>
              <td>" . $list['fecha_salida'] . "</td>
              <td>" . $list['hora_salida'] . "</td>
              
            </tr>        
            ";
        $a++;
      }

      ?>
    </tbody>
  </table>
</div>

