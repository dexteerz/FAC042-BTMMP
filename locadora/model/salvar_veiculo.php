<?php   

$placa = $_POST["placa"];
$chassi = $_POST["chassi"];
$modelo = $_POST["modelo"];
$cor = $_POST["cor"];
$idCategoria = $_POST["idCategoria"];



//acima recebe dados do formulario de cadastro
include 'conexao.php';
 
$conn = getConexao();

$sql = "INSERT INTO `tbl_veiculo` (`placa`, `chassi`, `modelo`, `cor`, `idCategoria`) 
        VALUES ( 
        '$placa', 
        '$chassi', 
        '$modelo', 
        '$cor', 
        '$idCategoria')";

$stmt = $conn->prepare($sql);
$stmt->execute();
header("location:../lista_veiculos.php");

  ?>    