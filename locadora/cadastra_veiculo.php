<?php
  include 'model/conexao.php';
  include 'model/header.php';
  include 'model/listar_categoria.php';
?>
<section class="content">

<!-- Default box -->
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Cadastrar Usuario</h3>
    <button type="button" class="close" onclick="location.href='lista_usuarios.php'" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>

  </div>
  <div class="box-body">
    <form action="model/salvar_veiculo.php" method="post">
    <div class="box-body">
        <div class="form-group">
          <label for="placa">Placa</label>  
            <div>
              <input  id="placa" 
              name="placa" 
              type="text" 
              placeholder="Placa do veículo" 
              class="form-control input-md" 
              required>
            </div>
        </div>
        <div class="form-group">
          <label  for="chassi">Chassi</label>  
          <div>
            <input  id="chassi" 
            name="chassi" 
            type="text" 
            placeholder="Nº do Chassi" 
            class="form-control input-md" 
            required>
          </div>
        </div>
        <div class="form-group">
          <label for="modelo">Modelo</label>  
          <div>
            <input  id="modelo" 
            name="modelo" 
            type="text" 
            placeholder="Nome do Modelo" 
            class="form-control input-md" 
            required>
          </div>
        </div>

        <div class="form-group">
          <label for="cor">Cor</label>  
            <div>
            <input  id="cor" 
            name="cor" 
            type="text"
            placeholder="Digite a Cor"
            class="form-control input-md" 
            required>
          </div>
        </div>
       
        <div class="form-group">
          <label for="categoria">Categoria</label>
          <div>
            <select id="idCategoria" name="idCategoria"  class="form-control input-md">
              <?php
                foreach ($resultado as $categoria) {
                  echo '<option value="'.$categoria['idCategoria'].'">'.$categoria['descricao'].'</option>';
                };
              ?>
            </select>
          </div>
        </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </div>
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