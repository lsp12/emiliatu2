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
  if ($_POST["fecha"] == " ") {
    $fecha = null;
  } else {
    $fecha = $_POST["fecha"];
  }
} else {
  /* echo '<script>
alert("no hay fecha");
</script>'; */
  $fecha = null;
}
?>

<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
  <h2 class="text-center">Vista general</h2>
  <?php
  $Ganancias = gananciasFe($fecha);
  $GananciasTab = gananciasTab($fecha);

  ?>
  <table class="table table-striped rounded-lg" id="tabla">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Correo</th>
        <th scope="col">Destino</th>
        <th scope="col">Ganancias</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $a = 1;
      foreach ($GananciasTab as $list) {
        echo "
            <tr>
              <th scope='row'>" . $a . "</th>
              <td>" . $list['nombre'] . "</td>
              <td>" . $list['costo'] . "</td>
              <td>" . $list['boletos'] . "</td>
            </tr>        
            ";
            $a++;
      }
      
      ?>
    </tbody>
  </table>
</div>
<div>
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