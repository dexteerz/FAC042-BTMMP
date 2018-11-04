<?php
    
    $conn = getConexao();

    $sql = "SELECT * FROM tbl_categoria";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
  ?>