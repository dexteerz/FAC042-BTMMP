<?php
  include 'model/header.php';
  include 'model/checkin_pendente.php';

?>

<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    
  </div>
</div>

<div class="container">  
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Reservas para Check-In</h3>
        </div>
          <div class="tab-content">

              <div class="box-body table-responsive no-padding">
                <table id="formapagamentos" class="table table-bordered table-striped">
<thead>
                    <tr>
                      <th><center>Id Reserva</center></th>
                      <th><center>Carro Selecionado</center></th>
                      <th><center>Usuario</center></th>
                      <th><center>Data de Inicio</center></th>
                      <th><center>Data Final</center></th>
                      <th><center>Forma Pagamento</center></th>
                      <th><center>Data da Reserva</center></th>
                      <th><center>valor da Reserva</center></th>
                      <th><center>Check-In</a>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    <?php
                    foreach ($resultado as $dado_reserva) {
                      $dt_inicio  = str_replace("-", "/", $dado_reserva['data_inicio']);
                      $dt_fim     = str_replace("-", "/", $dado_reserva['data_fim']);
                      $dt_reserva = str_replace("-", "/", $dado_reserva['data_reserva']);
                      $datac1 = date('d/m/Y', strtotime($dt_inicio));
                      $datac2 = date('d/m/Y', strtotime($dt_fim));
                      $datac3 = date('d/m/Y H:i', strtotime($dt_reserva));
                    ?>
                    <tr>
                    <td><?php echo "#".$dado_reserva['idReserva'] ?></td>
                    <td><?php echo $dado_reserva['modelo'] ?></td>
                    <td><?php echo $dado_reserva['nome'] ?></td>
                    <td><?php echo $datac1 ?></td>
                    <td><?php echo $datac2 ?></td>
                    <td><?php echo $dado_reserva['descricao'] ?></td>
                    <td><?php echo $datac3 ?></td>
                    <td><?php echo "R$ ".$dado_reserva['valorReserva'] ?></td>
                    <td><a href="model/inserir_checkin.php?id=<?php echo $dado_reserva['idReserva'] ?>"onclick='return confirm("Confirmar Check-In dessa reserva?");' class="glyphicon glyphicon-check"></a></td>
                    
                  </tr>
                  <?php
                  };
                  ?>
                  </tbody>
                </table>
              </div>
            
          </div>
        </div>
    </div>
  </div>
</div>
  
<?php
  include 'model/footer.php'
?>

