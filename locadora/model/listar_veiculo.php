<?php
    include 'model/conexao.php';
  
    $conn = getConexao();

    $sql = "SELECT * FROM v_veiculocategoria ORDER BY status DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
  ?>