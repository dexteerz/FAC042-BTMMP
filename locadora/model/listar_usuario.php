<?php
    include 'model/conexao.php';
  
    $conn = getConexao();

    $sql = "SELECT * FROM tbl_usuario";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
  ?>