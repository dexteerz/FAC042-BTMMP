
<?php
  include 'model/header.php';
  include 'model/listar_usuario.php';
  
  
?>

<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <a href="cadastra_usuario.php" class="btn btn-primary">Novo Usuario</a>
  </div>
</div>

<div class="container">
     
    <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">USUÁRIOS</h3>

              <div class="box-tools">
              <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>CPF</th>
                  <th>E-mail</th>
                  <th>STATUS</th>
                  <th></th>
                </tr>
                <?php
                  foreach ($resultado as $users) {
                    if($users['status'] == 1){
                      $situacao = '<span class="label label-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ativo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>';
                    } else {
                      $situacao = '<span class="label label-danger">Desativado</span>';
                    }
                  ?>
                  <tr>
                      <td><?php echo $users['idUsuario'] ?></td>
                      <td><?php echo $users['nome'] ?></td>
                      <td><?php echo $users['cpf'] ?></td>
                      <td><?php echo $users['email'] ?></td>
                      <td><?php echo $situacao?></td>
                  </tr>
                  <?php
                  };
                ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
</div>


<?php
  include 'model/rodape.php'
?>

