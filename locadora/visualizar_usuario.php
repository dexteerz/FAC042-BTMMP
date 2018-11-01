<?php
  include 'model/conexao.php';

  $conn = getConexao();

  $id = $_GET['id'];
  $sql = "SELECT * FROM tbl_usuario WHERE idUsuario = $id";
  $stmt = $conn->prepare($sql);  
  $stmt->execute();
  $resultado = $stmt->fetchAll();
  $usuario = $resultado[0];
  
  /* forma de fazer 02
  =====================================================
  $sql = "SELECT * FROM tbl_usuario WHERE idUsuario = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(1, $_GET['id']);
  $id = $_GET['id'];
  $stmt->execute();
  $resultado = $stmt->fetchAll();
  $usuarios = $resultado;
  =====================================================
  */
  

?>

<section class="content">

<!-- Default box -->
<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Usuário #<?php echo $usuario['idUsuario'];?></h3>
  <button type="button" class="close" onclick="location.href='lista_usuarios.php'" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>

</div>
<div class="box-body">
<form class="form-horizontal" >
      <fieldset>
      <!-- Form Name -->
      <!-- Select Basic -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="selectbasic">Tipo de Usuario</label>
        <div class="col-md-4">
          <select disabled id="idPerfilUsuario" name="idPerfilUsuario" class="form-control">
          <option  disabled value="1" <?php echo $usuario['idPerfilUsuario'] == '1' ? 'selected':''?>>Administrador</option>
          <option  disabled value="2" <?php echo $usuario['idPerfilUsuario'] == '2' ? 'selected':''?>>Funcionario</option>
          <option disabled  value="3" <?php echo $usuario['idPerfilUsuario'] == '3' ? 'selected':''?>>Usuario</option>
         
          </select>
          
        </div>
      </div>
      <input type="hidden" name="id" value="<?=$id?>">

      <div class="form-group">
        <label class="col-md-4 control-label" for="nome">Nome</label>  
          <div class="col-md-6">
          <input  id="nome" 
          name="nome" 
          type="text" 
          value="<?php echo $usuario['nome'];?>";
          placeholder="Digite o nome completo" 
          class="form-control input-md" 
          disabled>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="nome">Endereço</label>  
        <div class="col-md-6">
          <input  id="endereco" 
          name="endereco" 
          type="text" 
          value="<?php echo $usuario['endereco'];?>"
          placeholder="Rua , numero" 
          class="form-control input-md" 
          disabled>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="nome">CPF</label>  
        <div class="col-md-4">
          <input  id="cpf" 
          name="cpf" 
          type="text" 
          value="<?php echo $usuario['cpf'];?>"
          placeholder="000.000.000-00" 
          class="form-control input-md" 
          disabled>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="nome">Email</label>  
          <div class="col-md-4">
          <input  id="email" 
          name="email" 
          type="text"
          value="<?php echo $usuario['email'];?>"
          placeholder="email@email"
          class="form-control input-md" 
          disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="radios">Status</label>
        <div class="col-md-4">
          <div class="radio">
            <label disabled for="radios-0">
              <input disabled type="radio" name="status" id="radios-1" value="1" <?=$usuario['status'] == '1' ? 'checked="checked"' : '';?>>
              Ativo
            </label>
          </div>
          <div class="radio">
              <label disabled for="radios-1">
              <input disabled type="radio" name="status" id="radios-0" value="0"<?=$usuario['status'] == '0' ? 'checked="checked"' : '';?>>
              Inativo
            </label>
          </div>
        </div>
      </div>

      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="singlebutton"></label>
        <div class="col-md-4">
       
          <a href="lista_usuarios.php" class="btn btn-danger">Voltar</a>
        </div>
      </div>


      </fieldset>
    </form>
</div>
<!-- /.box-body -->
<!-- /.box-footer-->
</div>
<!-- /.box -->

</section>