<?php   

$idForma_editar = $_POST["id"];
$descricao = $_POST["descricao"];
$status = $_POST["status"];



//acima recebe dados do formulario de cadastro
include 'conexao.php';
 
$conn = getConexao();

$sql = "UPDATE `tbl_formapagamento` SET 
        `descricao` = '$descricao', 
        `status` = '$status' 
        WHERE `tbl_formapagamento`.`idFormaPagamento` = $idForma_editar";

$stmt = $conn->prepare($sql);
$stmt->execute();
header("location:../lista_formapagamento.php");
        
  ?>    