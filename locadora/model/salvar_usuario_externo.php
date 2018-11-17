<?php

$idPerfilUsuario = $_POST["idPerfilUsuario"];
$cpf = $_POST["cpf"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$endereco = $_POST["endereco"];

//acima recebe dados do formulario de cadastro
require 'conexao.php';

$conn = getConexao();

$sql = "INSERT INTO `tbl_usuario` (`idUsuario`, `idPerfilUsuario`, `cpf`, `nome`, `email`, `senha`, `endereco`)
        VALUES (NULL,
        '3',
        '$cpf',
        '$nome',
        '$email',
        '$senha',
        '$endereco')";

$stmt = $conn->prepare($sql);
$stmt->execute();
header("location:../index.php");
?>