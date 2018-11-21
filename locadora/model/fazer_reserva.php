<?php
  $veiculo     = $_POST["idVeiculo"];
  $usuario    = $_POST["idUsuario"];
  $dt_inicio  = $_POST["data_inicio"];
  $dt_fim     = $_POST["data_fim"];
  $pagamento  = $_POST["idFormaPagamento"];
  $valor      = $_POST["valorReserva"];
  
  //acima recebe dados do formulario de cadastro
  require 'conexao.php';
  
  $conn = getConexao();
  
  $sql = "INSERT INTO `tbl_reserva` (`idVeiculo`,`idUsuario`, `data_inicio`, `data_fim`, `idFormaPagamento`, `valorReserva`) 
          VALUES (
            '$veiculo',
            '$usuario',
            '$dt_inicio',
            '$dt_fim',
            '$pagamento',
            '$valor'
            );";
  
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  
  ?>