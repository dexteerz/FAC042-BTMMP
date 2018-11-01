<?php   

$idPerfilUsuario = $_POST["idPerfilUsuario"];
$cpf = $_POST["cpf"];
$idUsuario_editar = $_POST["id"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$endereco = $_POST["endereco"];
//$dt_cadastro = $_POST["dt_cadastro"];
$status = $_POST["status"];



//acima recebe dados do formulario de cadastro
include 'conexao.php';
 
$conn = getConexao();

$sql = "UPDATE `tbl_usuario` SET 
        `idPerfilUsuario` = '$idPerfilUsuario', 
        `cpf` = '$cpf', 
        `nome` = '$nome', 
        `email` = '$email', 
        `endereco` = '$endereco', 
        `status` = '$status' 
        WHERE `tbl_usuario`.`idUsuario` = $idUsuario_editar";

$stmt = $conn->prepare($sql);
$stmt->execute();
header("location:../lista_usuarios.php");
        
  ?>    