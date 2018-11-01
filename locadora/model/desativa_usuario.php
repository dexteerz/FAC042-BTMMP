<?php   
$id = $_GET["id"];

//acima recebe dados do formulario de cadastro
include 'conexao.php';
 
$conn = getConexao();

$sql = "UPDATE `tbl_usuario` SET 
        `status` = '0' 
        WHERE `tbl_usuario`.`idUsuario` = $id";

$stmt = $conn->prepare($sql);
$stmt->execute();
header("location:../lista_usuarios.php");
        

//  MOD(status +  1, 2) esse faz 0 e 1

  ?>    