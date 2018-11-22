<?php
    include 'model/conexao.php';
  
    $conn = getConexao();

    $sql = "SELECT * FROM tbl_usuario ORDER BY dt_cadastro DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
  ?>