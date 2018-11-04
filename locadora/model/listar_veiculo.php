<?php
    include 'model/conexao.php';
  
    $conn = getConexao();

    $sql = "SELECT a.idVeiculo idVeiculo, a.placa placa, a.chassi chassi, a.modelo modelo, a.cor cor, b.descricao categoria, a.status status, a.dt_cadastro dt_cadastro FROM tbl_veiculo a INNER JOIN tbl_categoria b ON a.idCategoria = b.idCategoria ORDER BY a.dt_cadastro DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
  ?>