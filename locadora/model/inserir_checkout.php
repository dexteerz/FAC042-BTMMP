<?php
    $data_hoje = date("Y-m-d");
    $id_reserva = $_POST['idReserva'];
    $dano = $_POST['dano'];
    $abastecimento =$_POST['desabastecido']; 
    $limpeza = $_POST['sujo'];
    $total = $_POST['total'];

    $danosim = 0;
    $abastecimentosim = 0;
    $limpezasim = 0;

    include 'conexao.php';
    $conn = getConexao();

    if($dano > 0){
      $danosim = 1;
      $sql = "INSERT INTO `tbl_extrareserva` (`descricao`, `valor`, `idReserva`) 
        VALUES ('MANUTENÇÃO NO VEICULO', 
        '$dano', 
        '$id_reserva')";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
    }
    
    if($abastecimento > 0){
      $abastecimentosim = 1;
      $sql = "INSERT INTO `tbl_extrareserva` (`descricao`, `valor`, `idReserva`) 
        VALUES ('REABASTECIMENTO DE COMBUSTIVEL', 
        '$abastecimento', 
        '$id_reserva')";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
    }
    
    if($limpeza > 0){
      $limpezasim = 1;
      $sql = "INSERT INTO `tbl_extrareserva` (`descricao`, `valor`, `idReserva`) 
        VALUES ('LIMPEZA NO VEICULO', 
        '$limpeza', 
        '$id_reserva')";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
    }
    
    $sql = "SELECT * FROM tbl_reserva WHERE idReserva = $id_reserva";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $count = $stmt->rowCount();
    $resultadoV = $stmt->fetchAll();

    if ($count > 0) {
      $dados = array();
      foreach ($resultadoV as $key => $value) {
          $dados = $value;
      }
        $veiculo = $dados['idVeiculo'];
    }

    $sql = "UPDATE `tbl_veiculo` 
    SET `status` = 1
    WHERE idVeiculo = $veiculo";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE `tbl_reserva` 
    SET `valorReserva` = `valorReserva` + $total, 
    `data_checkout` = '$data_hoje', 
    `dano` = $danosim, 
    `sujo` = $limpezasim, 
    `desabastecido` = $abastecimentosim
    WHERE `tbl_reserva`.`idReserva` = $id_reserva";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetchAll();

    header("location:../checkout.php");
    
  ?>
