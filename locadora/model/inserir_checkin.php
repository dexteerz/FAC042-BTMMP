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
    header("location:../checkin.php");
  ?>
