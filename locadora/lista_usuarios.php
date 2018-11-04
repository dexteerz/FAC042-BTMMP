
<?php
  include 'model/header.php';
  include 'model/listar_usuario.php';
  
  
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
          <h3 class="box-title">Usuários</h3>
        </div>
          <div class="tab-content">

              <div class="box-body table-responsive no-padding">
                <table id="usuarios" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th><center>Tipo</center></th>
                      <th><center>Nome</center></th>
                      <th><center>CPF</center></th>
                      <th><center>E-mail</center></th>
                      <th><center>STATUS</center></th>
                      <th><center><a href="cadastra_usuario.php" class="glyphicon glyphicon-plus"> NOVO</a>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    <?php
                    foreach ($resultado as $users) {
                      if($users['status'] == 1){
                        $situacao = '<span class="fa fa-circle text-green"></span>';
                      } else {
                        $situacao = '<span class="fa fa-circle text-gray"></span>';
                      }

                      if($users['idPerfilUsuario'] == 1){
                        $tipoconta = '<span class="fa fa-user-secret" alt="Administrador"></span>';
                      } else if ($users['idPerfilUsuario'] == 2){
                        $tipoconta = '<span class="fa fa-user-plus" alt="Funcionário"></span>';
                      } else {
                        $tipoconta = '<span class="fa fa-user" alt="Usuário"></span>';
                      }
                    ?>
                    <tr>
                    <td><?php echo $tipoconta ?></td>
                    <td><?php echo $users['nome'] ?></td>
                    <td><?php echo $users['cpf'] ?></td>
                    <td><?php echo $users['email'] ?></td>
                    <td><?php echo $situacao?></td>
                    <td style="text-align: center; width: 100px;">
                    <a href="visualizar_usuario.php?id=<?php echo $users['idUsuario'] ?>" class="glyphicon glyphicon-search" data-toggle="modal"></a>&nbsp;&nbsp;&nbsp;
                    <a href="editar_usuario.php?id=<?php echo $users['idUsuario'] ?>" class="glyphicon glyphicon-edit" data-toggle="modal"></a>&nbsp;&nbsp;&nbsp;
                    <a href="model/desativa_usuario.php?id=<?php echo $users['idUsuario'] ?>"onclick='return confirm("Deseja realmente desativar este Usário?");' class="glyphicon glyphicon-remove"></a>
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

