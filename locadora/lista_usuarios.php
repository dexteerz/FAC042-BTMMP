
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
          <h3 class="box-title">Usuários</h3>
        </div>

        <div class="box-body">
          <table id="usuarios" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>STATUS</th>
                <th></th>
              </tr>
            </thead>
            <tbody style="text-align: center;">
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


<?php
  include 'model/rodape.php'
?>

