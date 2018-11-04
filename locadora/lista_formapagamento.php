
<?php
  include 'model/header.php';
  include 'model/listar_formapagamento.php';
  
  
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
          <h3 class="box-title">Formas de Pagamento</h3>
        </div>
          <div class="tab-content">

              <div class="box-body table-responsive no-padding">
                <table id="formapagamentos" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th><center>ID</center></th>
                      <th><center>Descricao</center></th>
                      <th><center>STATUS</center></th>
                      <th><center><a href="cadastra_formapagamento.php" class="glyphicon glyphicon-plus"> NOVO</a>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    <?php
                    foreach ($resultado as $formapagamento) {
                      if($formapagamento['status'] == 1){
                        $situacao = '<span class="fa fa-circle text-green"></span>';
                      } else {
                        $situacao = '<span class="fa fa-circle text-gray"></span>';
                      }

                    ?>
                    <tr>
                    <td><?php echo $formapagamento['idFormaPagamento'] ?></td>
                    <td><?php echo $formapagamento['descricao'] ?></td>
                    <td><?php echo $situacao?></td>
                    <td style="text-align: center; width: 100px;">
                    <a href="visualizar_formapagamento.php?id=<?php echo $formapagamento['idFormaPagamento'] ?>" class="glyphicon glyphicon-search" data-toggle="modal"></a>&nbsp;&nbsp;&nbsp;
                    <a href="editar_formapagamento.php?id=<?php echo $formapagamento['idFormaPagamento'] ?>" class="glyphicon glyphicon-edit" data-toggle="modal"></a>&nbsp;&nbsp;&nbsp;
                    <a href="model/desativa_formapagamento.php?id=<?php echo $formapagamento['idFormaPagamento'] ?>"onclick='return confirm("Deseja realmente desativar esta Forma de Pagamento?");' class="glyphicon glyphicon-remove"></a>
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
</div>
  
<?php
  include 'model/footer.php'
?>

