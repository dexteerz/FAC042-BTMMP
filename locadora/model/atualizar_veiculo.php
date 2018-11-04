<?php   

$idVeiculo_editar = $_POST["id"];
$placa = $_POST["placa"];
$chassi = $_POST["chassi"];
$modelo = $_POST["modelo"];
$cor = $_POST["cor"];
$idCategoria = $_POST["idCategoria"];
$status = $_POST["status"];



//acima recebe dados do formulario de cadastro
include 'conexao.php';
 
$conn = getConexao();

$sql = "UPDATE `tbl_veiculo` SET 
        `placa` = '$placa', 
        `chassi` = '$chassi', 
        `modelo` = '$modelo', 
        `cor` = '$cor', 
        `idCategoria` = '$idCategoria', 
        `status` = '$status' 
        WHERE `tbl_veiculo`.`idVeiculo` = $idVeiculo_editar";

$stmt = $conn->prepare($sql);
$stmt->execute();
header("location:../lista_veiculos.php");
        
  ?>    