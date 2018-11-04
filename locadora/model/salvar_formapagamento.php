<?php   

$idFormaPagamento = $_POST["idFormaPagamento"];
$descricao = $_POST["descricao"];



//acima recebe dados do formulario de cadastro
include 'conexao.php';
 
$conn = getConexao();

$sql = "INSERT INTO `tbl_formapagamento` (`idFormaPagamento`, `descricao`) 
        VALUES (NULL, 
        '$descricao')";

$stmt = $conn->prepare($sql);
$stmt->execute();
header("location:../lista_formapagamento.php");

  ?>    