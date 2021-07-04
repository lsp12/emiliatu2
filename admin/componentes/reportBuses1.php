
<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

<h2 class="text-center">Vista general</h2>

<table class="table table-striped rounded-lg" id="tabla">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Matricula</th>
      <th scope="col">Estado</th>
      <th scope="col">Marca</th>
      <th scope="col">Modelo</th>
      <th scope="col">Reporte</th>
    </tr>
  </thead>
  <tbody>
    <?php
    
    $Bus=ConsultaBu("buses");
    $a = 1;
    foreach ($Bus as $list) {
        if($list['Marca']=='' || $list['Marca']==null){
            $list['Marca']="N/A";
          }
          if($list['Modelo']=='' || $list['Modelo']==null){
            $list['Modelo']="N/A";
          }
      echo "
          <tr>
            <th scope='row'>" . $a . "</th>
            <td>" . $list['matricula'] . "</td>
            <td>" . $list['estado'] . "</td>
            <td>" . $list['Marca'] . "</td>
            <td>" . $list['Modelo'] . "</td>
            <td><a href='reports.php?bus=".$list['matricula']."' target='_blank' class='btn btn-primary'>Historial de viajes</a></td>
          </tr>        
          ";
      $a++;
    }

    ?>
  </tbody>
</table>
</div>