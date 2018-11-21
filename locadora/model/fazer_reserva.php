<?php
  //==========================================================================
  //RECEBE DADOS DO FORMULÁRIO DE CONFIRMAÇÃO
  //==========================================================================
  $veiculo    = $_POST['idVeiculo'];
  $usuario    = $_POST['idUsuario'];
  $dt_inicio  = str_replace("/", "-", $_POST['data_inicio']);
  $dt_fim     = str_replace("/", "-", $_POST['data_fim']);
  $pagamento  = $_POST['idFormaPagamento'];
  $valor      = $_POST['valorReserva'];
  
  //==========================================================================
  //CONVERTE DATA PARA LANÇAR NO BANCO
  //==========================================================================
  
  $datac1 = date('Y-m-d', strtotime($dt_inicio));
  $datac2 = date('Y-m-d', strtotime($dt_fim));

  
  require 'conexao.php';

  $conn = getConexao();

  $sql = "INSERT INTO `tbl_reserva` (`idVeiculo`,`idUsuario`, `data_inicio`, `data_fim`, `idFormaPagamento`, `valorReserva`) 
    VALUES (
      '$veiculo',
      '$usuario',
      '$datac1',
      '$datac2',
      '$pagamento',
      '$valor'
      );";

  $stmt = $conn->prepare($sql);
  $stmt->execute();

  $LAST_ID = $conn->lastInsertId();

  $mensagem = "Reserva feita com sucesso. RESERVA DE Nº#".$LAST_ID;
  echo "<script>
   alert('$mensagem');		
  </script>";

  header("location:../reserva.php");
  ?>