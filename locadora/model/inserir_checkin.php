<?php
    $data_hoje = date("Y-m-d");
    $id_reserva = $_GET['id'];
    echo $id_reserva;
    echo $data_hoje;

    include 'conexao.php';
  
    $conn = getConexao();

    $sql = "UPDATE `tbl_reserva` SET `data_checkin` = '$data_hoje' WHERE `tbl_reserva`.`idReserva` = $id_reserva";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetchAll();

    $sql = "SELECT * FROM `tbl_reserva` WHERE `idReserva` = $id_reserva";
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


    $sql = "UPDATE `tbl_veiculo` SET `status` = 2 WHERE idVeiculo = $veiculo";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    header("location:../checkin.php");
  ?>
