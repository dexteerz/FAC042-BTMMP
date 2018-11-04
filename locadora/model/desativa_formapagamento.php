<?php   
$id = $_GET["id"];

//acima recebe dados do formulario de cadastro
include 'conexao.php';
 
$conn = getConexao();

$sql = "UPDATE `tbl_formapagamento` SET 
        `status` = '0' 
        WHERE `tbl_formapagamento`.`idFormaPagamento` = $id";

$stmt = $conn->prepare($sql);
$stmt->execute();
header("location:../lista_formapagamento.php");
        

//  MOD(status +  1, 2) esse faz 0 e 1

  ?>    