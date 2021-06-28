<div>
  <form action="ganacias.php" method="post">
    <h1>Selecione la fecha </h1>
    <input class="input-group-text" type="date" name="fecha">
    <input type="submit" class="btn btn-primary mt-3" value="enviar">
  </form>
</div>

  
<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

  <h2 class="text-center">Vista general</h2>
  
  <table class="table table-striped rounded-lg" id="tabla">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Cedula</th>
        <th scope="col">Nombre</th>
        <th scope="col">Telefono</th>
        <th scope="col">Reporte</th>
      </tr>
    </thead>
    <tbody>
      <?php
      
      $users=mostrarConductor();
      $a = 1;
      foreach ($users as $list) {
        echo "
            <tr>
              <th scope='row'>" . $a . "</th>
              <td>" . $list['cedula'] . "</td>
              <td>" . $list['nombre_emp'] . "</td>
              <td>" . $list['telefono'] . "</td>
              <td><a href='reports.php?user=".$list['cedula']."' target='_blank' class='btn btn-primary'>Historial de viajes</a></td>
            </tr>        
            ";
        $a++;
      }

      ?>
    </tbody>
  </table>
</div>
