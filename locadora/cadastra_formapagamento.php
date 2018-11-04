<?php

  include 'model/conexao.php'; 
  include 'model/header.php';
?>
<section class="content">

<!-- Default box -->
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Forma de Pagamento</h3>
    <button type="button" class="close" onclick="location.href='lista_formapagamentos.php'" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>

  </div>
  <div class="box-body">
    <form action="model/salvar_formapagamento.php" method="post">
      <div class="box-body">
        <div class="form-group">
          <label for="descricao">Forma de Pagamento</label>  
            <div>
              <input  id="descricao" 
              name="descricao" 
              type="text" 
              placeholder="Digite a Forma de Pagamento" 
              class="form-control input-md" 
              required>
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