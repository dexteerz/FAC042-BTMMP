<?php  

function getConexao(){

    $host = "localhost";  
    $username = "1355671";  
    $password = "admin123";  
    $database = "1355671";  
    $message = "";  
 try  
 {  
      $pdo = new PDO("mysql:host=$host; dbname=$database", $username, $password); 
      return $pdo; 
 }catch (PDOException $ex) {

    echo 'Erro: '.$ex->getMessage();

 }
}