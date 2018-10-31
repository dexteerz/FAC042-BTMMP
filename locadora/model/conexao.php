<?php  

function getConexao(){

    $host = "localhost";  
    $username = "root";  
    $password = "";  
    $database = "db_locadora";  
    $message = "";  
 try  
 {  
      $pdo = new PDO("mysql:host=$host; dbname=$database", $username, $password); 
      return $pdo; 
 }catch (PDOException $ex) {

    echo 'Erro: '.$ex->getMessage();

 }
}

