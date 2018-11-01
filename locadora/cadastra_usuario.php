<?php

  include 'model/conexao.php';
?>
<section class="content">

<!-- Default box -->
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Cadastrar Usuario</h3>


  </div>
  <div class="box-body">
    <form action="model/salvar_usuario.php" method="post">
      <div class="box-body">
        <div class="form-group">
          <label for="selectbasic">Tipo de Usuario</label>
          <div>
            <select id="idPerfilUsuario" name="idPerfilUsuario" class="form-control">
              <option value="1">Administrador</option>
              <option value="2">Funcionario</option>
              <option value="3">Usuario</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="nome">Nome</label>  
            <div>
              <input  id="nome" 
              name="nome" 
              type="text" 
              placeholder="Digite o nome completo" 
              class="form-control input-md" 
              required>
            </div>
        </div>
        <div class="form-group">
          <label  for="endereco">Endereço</label>  
          <div>
            <input  id="endereco" 
            name="endereco" 
            type="text" 
            placeholder="Rua , numero" 
            class="form-control input-md" 
            required>
          </div>
        </div>
        <div class="form-group">
          <label for="cpf">CPF</label>  
          <div>
            <input  id="cpf" 
            name="cpf" 
            type="text" 
            placeholder="000.000.000-00" 
            class="form-control input-md" 
            required>
          </div>
        </div>

        <div class="form-group">
          <label for="email">Email</label>  
            <div>
            <input  id="email" 
            name="email" 
            type="text"
            placeholder="email@email"
            class="form-control input-md" 
            required>
          </div>
        </div>

        <div class="form-group">
          <label for="senha">Senha</label>
            <div>
            <input  id="senha" 
            name="senha" 
            type="password" 
            placeholder="*****" 
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
 
?>