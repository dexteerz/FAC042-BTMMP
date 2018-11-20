<?php
  include 'model/header.php';
  include 'model/listar_categoria.php';



?>

<!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Pagina de Reserva</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

<form action="model/recebe_reserva.php" method="POST">
  <div>
    <label for="data_inicio">Data Inicio</label>
    <input type="date" id="data_inicio" name="data_inicio">
  </div>
  <div>
    <label for="data_fim">Data Fim</label>
    <input type="date" id="data_fim" name="data_fim">
  </div>
  <div class="form-group">
          <label for="selectbasic">Categoria do Veiculo</label>
          <div>
            <select id="idCategoria" name="idCategoria" class="form-group">
            
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

  <input type="submit" value="Veificar">
</form>



        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->


<?php
  include 'model/footer.php'
?>