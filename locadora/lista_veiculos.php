
<?php
  include 'model/header.php';
  include 'model/listar_veiculo.php';
  
  
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
          <h3 class="box-title">Veículos</h3>
        </div>
          <div class="tab-content">

              <div class="box-body table-responsive no-padding">
                <table id="veiculos" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th><center>Placa</center></th>
                      <th><center>Chassi</center></th>
                      <th><center>Modelo</center></th>
                      <th><center>Categoria</center></th>
                      <th><center>Cor</center></th>
                      <th><center>STATUS</center></th>
                      <th><center><a href="cadastra_veiculo.php" class="glyphicon glyphicon-plus" data-toggle="modal" data-target="#modal-default"></a>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    <?php
                    foreach ($resultado as $veiculos) {
                      if($veiculos['status'] == 1){
                        $situacao = '<span class="fa fa-circle text-green"></span>';
                      } else if($veiculos['status'] == 2){
                        $situacao = '<span class="fa fa-circle text-gray"></span>';
                      } else {
                        $situacao = '<span class="fa fa-circle text-red"></span>';
                      }

                      switch ($veiculos['cor']){
                        case 'VERDE':
                          $corveiculo = "green";
                          break;
                        case 'VERMELHO':
                          $corveiculo = "red";
                          break;
                        case 'AZUL':
                          $corveiculo = "blue";
                          break;
                        case 'PRATA':
                          $corveiculo = "gray";
                          break;
                        case 'PRETO':
                          $corveiculo = "black";
                          break;
                        case 'AMARELO':
                          $corveiculo = "yellow";
                          break;
                        case 'ROSA':
                          $corveiculo = "fuchsia";
                          break;
                      }
                    ?>
                    <tr>
                    <td><?php echo $veiculos['placa'] ?></td>
                    <td><?php echo $veiculos['chassi'] ?></td>
                    <td><?php echo $veiculos['modelo'] ?></td>
                    <td><?php echo $veiculos['categoria'] ?></td>
                    <td><?php echo '<span class="badge bg-'.$corveiculo.'">'.$veiculos['cor'].'</span>' ?></td>
                    <td><?php echo $situacao?></td>
                    <td style="text-align: center; width: 100px;">
                      <a class="glyphicon glyphicon-search"></a>&nbsp;&nbsp;&nbsp;
                      <a class="glyphicon glyphicon-edit"></a>&nbsp;&nbsp;&nbsp;
                      <a class="glyphicon glyphicon-remove"></a>
                    </td>
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
  <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</div>
  
<?php
  include 'model/rodape.php'
?>

