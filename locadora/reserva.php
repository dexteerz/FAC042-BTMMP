<?php
  include 'model/header.php';
  include 'model/listar_categoria.php';



?>

<!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Pagina de Reserva</h3>
        </div>
        <div class="box-body">

        <form class="form-horizontal" action="model/recebe_reserva.php" method="POST">
          <fieldset>
            <div class="form-group">
              <label class="col-md-4 control-label" for="placa">Placa</label>  
                <div class="col-md-6">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control input-md" id="reservation" name="dataInicioFim" required >
                </div>
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="placa">Categoria do Veiculo</label>  
                <div class="col-md-6">
                <select class="form-control input-md" id="idCategoria" name="idCategoria" class="form-group"> 
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
    
            <div class="form-group">
              <label class="col-md-4 control-label" for="singlebutton"></label>
              <div class="col-md-4">
                <input type="submit" class="btn btn-primary" value="Verificar">
              </div>
            </div>
          
          
          </fieldset>
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