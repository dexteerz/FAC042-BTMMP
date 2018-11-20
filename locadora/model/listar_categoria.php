<?php
    include 'conexao.php';
    $conn = getConexao();

    $sql = "SELECT * FROM `tbl_categoria` ORDER BY `tbl_categoria`.`descricao` ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
  ?>