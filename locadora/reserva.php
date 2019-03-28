<?php
  include 'model/header.php';
  include 'model/listar_categoria.php';
  
  $conn = getConexao();

  $iduser = $_SESSION['id'];

  $sql = "SELECT r.idReserva,v.modelo, c.descricao,r.data_inicio,r.data_fim,f.idFormaPagamento,r.data_checkin,r.data_checkout,r.data_reserva,r.valorReserva,r.dano,r.sujo,r.desabastecido FROM tbl_reserva AS r 
          INNER JOIN tbl_veiculo AS v ON r.idVeiculo = v.idVeiculo
          INNER JOIN tbl_formapagamento AS f ON r.idFormaPagamento = f.idFormaPagamento
          INNER JOIN tbl_categoria AS c ON v.idCategoria = c.idCategoria
          WHERE r.idUsuario = $iduser 
          ORDER BY r.data_reserva DESC";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $resultado2 = $stmt->fetchAll();


?>

<!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Pagina de Reserva</h3>
        </div>
        <div class="box-body">

        <form class="form-horizontal" action="confirmar_reservar.php" method="POST">
          <fieldset>
            <div class="form-group">
              <label class="col-md-4 control-label" for="placa">Data</label>  
                <div class="col-md-6">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control input-md" id="reservation" name="dataInicioFim" required onkeyup="updateUsername();" value="">
                </div>
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="placa">Categoria do Veiculo</label>  
                <div class="col-md-6">
                <select class="form-control input-md" id="idCategoria" name="idCategoria" class="form-group"> 
                  <?php  
                  foreach ($resultado as $categoria) {
                  ?>
                  <option value="<?=$categoria['idCategoria']?>"><?=$categoria['descricao']?></option>
                  <?php
                  };
                  ?>
                </select>
                </div>
            </div>      
    
            <div class="form-group">
              <label class="col-md-4 control-label" for="singlebutton"></label>
              <div class="col-md-4">
                <input type="submit" class="btn btn-primary" value="Verificar" data-toggle="modal" data-target="#modal-default">
                
              </div>
            </div>
          
          </fieldset>
        </form>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

      <div class="container">  
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Minha reservas</h3>
        </div>
          <div class="tab-content">

              <div class="box-body table-responsive no-padding">
                <table id="usuarios" class="table table-condensed">
                  <thead>
                    <tr>
                      <th><center>Nº da Reserva</center></th>
                      <th><center>Veiculo</center></th>
                      <th><center>Categoria</center></th>
                      <th><center>Data Inicio</center></th>
                      <th><center>Data Fim</center></th>
                      <th><center>Valor Aluguel</center></th>
                      <th><center>Situação</center></th>
                      
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    <?php
                    foreach ($resultado2 as $reserva) {
                      $divalert = null;
                      if(strtotime($reserva['data_fim']) < strtotime(date("Y-m-d")) && $reserva['data_checkin'] !== null && $reserva['data_checkout'] === null){
                        $divalert = "class='bg-danger'";
                        $situacao = "ATRASADO";
                      } else if($reserva['data_inicio'] !== null && $reserva['data_checkin'] === null){
                        $situacao = "EM ABERTO";
                      }  else if($reserva['data_checkin'] !== null && $reserva['data_checkout'] === null) {
                        $situacao = "ALUGADO";
                      }  else {
                        $divalert = "class='bg-success'";
                        $situacao = "FECHADO";
                      }

                      $dt_inicio  = str_replace("-", "/", $reserva['data_inicio']);
                      $dt_fim     = str_replace("-", "/", $reserva['data_fim']);
                      $datac1 = date('d/m/Y', strtotime($dt_inicio));
                      $datac2 = date('d/m/Y', strtotime($dt_fim));



                    ?>
                    <tr <?php echo $divalert; ?>>
                    <td><?php echo "#".$reserva['idReserva'] ?></td>
                    <td><?php echo $reserva['modelo'] ?></td>
                    <td><?php echo $reserva['descricao'] ?></td>
                    <td><?php echo $datac1 ?></td>
                    <td><?php echo $datac2 ?></td>
                    <td><?php echo "R$ ".$reserva['valorReserva'] ?></td>
                    <td><?php echo $situacao?></td>
                    
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

<style>
  .example-modal .modal {
  position: relative;
  top: auto;
  bottom: auto;
  right: auto;
  left: auto;
  display: block;
  z-index: 1;
  }

  .example-modal .modal {
  background: transparent !important;
  }
</style>

<script >    
  function FillBilling(f) {
  if(f.billingtoo.checked == true) {
    f.billingname.value = f.shippingname.value;
  }
}
</script>
<?php
  include 'model/footer.php'
?>