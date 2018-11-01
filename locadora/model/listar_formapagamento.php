<?php
    include 'model/conexao.php';
  
    $conn = getConexao();

    $sql = "SELECT * FROM tbl_formapagamento";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
  ?>