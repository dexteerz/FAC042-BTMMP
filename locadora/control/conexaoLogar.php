<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "db_locadora";
$message = "";
try
{
    $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST["login"])) {
        if (empty($_POST["email"]) || empty($_POST["senha"])) {
            $message = 'Todos os campos são obrigatórios';
        } else {
            $query = "SELECT * FROM tbl_usuario WHERE email = :email AND senha = :senha";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    'email' => $_POST["email"],
                    'senha' => $_POST["senha"],

                )
            );
            $count = $statement->rowCount();
            $resultado = $statement->fetchAll();

            if ($count > 0) {
                $dados = array();
                foreach ($resultado as $key => $value) {
                    $dados = $value;
                }
                $_SESSION["id"] = $dados['idUsuario'];
                $_SESSION["nome"] = $dados['nome'];
                $_SESSION["email"] = $dados['email'];
                $_SESSION["endereco"] = $dados['endereco'];
                $_SESSION["cpf"] = $dados['cpf'];
                if($dados['idPerfilUsuario'] == 1){
                    $_SESSION["idPerfilUsuario"] = "Administrador";
                } else if ($dados['idPerfilUsuario'] == 2){
                    $_SESSION['idPerfilUsuario'] = "Funcionario";
                } else {
                    $_SESSION["idPerfilUsuario"] = "Usuario";
                }
                header("location:home.php");
            } else {
                $message = 'E-mail ou senha incorreta';
            }
        }
    }
} catch (PDOException $error) {
    $message = $error->getMessage();
}
