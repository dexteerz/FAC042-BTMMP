<?php
  include 'model/conexao.php';
  include 'model/header.php';

  $conn = getConexao();

  $id = $_GET['id'];
  $sql = "SELECT * FROM tbl_formapagamento WHERE idFormaPagamento = $id";
  $stmt = $conn->prepare($sql);  
  $stmt->execute();
  $resultado = $stmt->fetchAll();
  $formapagamento = $resultado[0];
  
   

?>
<section class="content">

<!-- Default box -->
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Editar Forma de Pagamento</h3>
    <button type="button" class="close" onclick="location.href='lista_formapagamento.php'" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>

  </div>
  <div class="box-body">
  <form class="form-horizontal" action="model/atualizar_formapagamento.php" method="post">
      <fieldset>
      <!-- Form Name -->
      <!-- Select Basic -->
      <input type="hidden" name="id" value="<?=$id?>">

      <div class="form-group">
        <label class="col-md-4 control-label" for="descricao">Forma de Pagamento</label>  
          <div class="col-md-6">
          <input  id="descricao" 
          name="descricao" 
          type="text" 
          value="<?php echo $formapagamento['descricao'];?>";
          placeholder="Digite a Forma de Pagamento" 
          class="form-control input-md" 
          required="">
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="radios">Status</label>
        <div class="col-md-4">
          <div class="radio">
            <label for="radios-0">
              <input type="radio" name="status" id="radios-1" value="1" <?=$formapagamento['status'] == '1' ? 'checked="checked"' : '';?>>
              Ativo
            </label>
          </div>
          <div class="radio">
              <label for="radios-1">
              <input type="radio" name="status" id="radios-0" value="0"<?=$formapagamento['status'] == '0' ? 'checked="checked"' : '';?>>
              Inativo
            </label>
          </div>
        </div>
      </div>

      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="singlebutton"></label>
        <div class="col-md-4">
          <input type="submit" class="btn btn-primary" value="Salvar">
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

<?php
  include 'model/footer.php'
?>