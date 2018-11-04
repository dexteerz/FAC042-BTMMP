<?php
  include 'model/conexao.php';
  include 'model/header.php';
  include 'model/listar_categoria.php';

  $conn = getConexao();

  $id = $_GET['id'];
  $sql = "SELECT * FROM tbl_veiculo WHERE idVeiculo = $id";
  $stmt = $conn->prepare($sql);  
  $stmt->execute();
  $resultado1 = $stmt->fetchAll();
  $veiculo = $resultado1[0];
?>
<section class="content">

<!-- Default box -->
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Editar Veiculo</h3>
    <button type="button" class="close" onclick="location.href='lista_usuarios.php'" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>

  </div>
  <div class="box-body">
    <form class="form-horizontal" action="model/atualizar_veiculo.php" method="post">
    <fieldset>
    <input type="hidden" name="id" value="<?=$id?>">

        <div class="form-group">
          <label class="col-md-4 control-label" for="placa">Placa</label>  
            <div class="col-md-6">
              <input id="placa" 
              name="placa" 
              type="text" 
              placeholder="Placa do veículo" 
              class="form-control input-md" 
              required
              value="<?php echo $veiculo['placa'];?>";>
            </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="chassi">Chassi</label>  
          <div class="col-md-6">
            <input  id="chassi" 
            name="chassi" 
            type="text" 
            placeholder="Nº do Chassi" 
            class="form-control input-md" 
            required
            value="<?php echo $veiculo['chassi'];?>";>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="modelo">Modelo</label>  
          <div class="col-md-6">
            <input  id="modelo" 
            name="modelo" 
            type="text" 
            placeholder="Nome do Modelo" 
            class="form-control input-md" 
            required
            value="<?php echo $veiculo['modelo'];?>";>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="cor">Cor</label>  
            <div class="col-md-6">
            <input  id="cor" 
            name="cor" 
            type="text"
            placeholder="Digite a Cor"
            class="form-control input-md" 
            required
            value="<?php echo $veiculo['cor'];?>";>
          </div>
        </div>
       
        <div class="form-group">
          <label class="col-md-4 control-label" for="categoria">Categoria</label>
          <div class="col-md-6">
            <select id="idCategoria" name="idCategoria"  class="form-control input-md">
              }
              <?php 
                foreach ($resultado as $categoria) { 
                  if($veiculo['idCategoria'] == $categoria['idCategoria']) {
                    echo '<option value="'.$veiculo['idCategoria'].'" selected>'.$categoria['descricao'].'</option>';
                  }
                  echo '<option value="'.$categoria['idCategoria'].'">'.$categoria['descricao'].'</option>';
                };
              ?>
            </select>
          </div>
        </div>

        <div class="form-group">
        <label class="col-md-4 control-label" for="radios">Status</label>
        <div class="col-md-4">
          <div class="radio">
            <label for="radios-0">
              <input type="radio" name="status" id="radios-1" value="1" <?=$veiculo['status'] == '1' ? 'checked="checked"' : '';?>>
              Ativo
            </label>
          </div>
          <div class="radio">
              <label for="radios-1">
              <input type="radio" name="status" id="radios-0" value="0"<?=$veiculo['status'] == '0' ? 'checked="checked"' : '';?>>
              Inativo
            </label>
          </div>
        </div>
      </div>
      <!-- /.box-body -->

       <div class="form-group">
       <div class="form-group">
        <label class="col-md-4 control-label" for="singlebutton"></label>
        <div class="col-md-4">
          <input type="submit" class="btn btn-primary" value="Salvar">
          <a href="lista_veiculos.php" class="btn btn-danger">Voltar</a>
        </div>
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
  include 'model/footer.php';
?>