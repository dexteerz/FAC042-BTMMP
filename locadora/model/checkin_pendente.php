<?php
    include 'conexao.php';
  
    $conn = getConexao();

    $sql = "SELECT 
    r.idReserva,
    r.data_inicio,
    r.data_fim,
    r.valorReserva,
    r.data_reserva,
    v.modelo,
    u.nome,
    f.descricao
    
    FROM tbl_reserva AS r
    JOIN tbl_veiculo AS v
    ON v.idVeiculo = r.idVeiculo
    JOIN tbl_usuario AS u
    ON u.idUsuario = r.idUsuario
    JOIN tbl_formapagamento f 
    ON f.idFormaPagamento = r.idFormaPagamento
    WHERE r.data_checkin is null ORDER BY r.data_inicio ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetchAll();

  ?>
