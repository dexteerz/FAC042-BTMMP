<?php   

$idPerfilUsuario = $_POST["idPerfilUsuario"];
$cpf = $_POST["cpf"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$endereco = $_POST["endereco"];
$dt_cadastro = $_POST["dt_cadastro"];
$status = $_POST["status"];



//acima recebe dados do formulario de cadastro
include 'conexao.php';
 
$conn = getConexao();

$sql = "INSERT INTO `tbl_usuario` (`idUsuario`, `idPerfilUsuario`, `cpf`, `nome`, `email`, `senha`, `endereco`, `dt_cadastro`, `status`) 
        VALUES (NULL, 
        '$idPerfilUsuario', 
        '$cpf', 
        '$nome', 
        '$email', 
        '$senha', 
        '$endereco', 
        '$dt_cadastro', 
        '$status')";

$stmt = $conn->prepare($sql);
$stmt->execute();
header("location:../lista_usuarios.php");

  ?>    