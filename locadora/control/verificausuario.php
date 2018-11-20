<?php
    if(isset($_SESSION['perfil']) != "Usuario"){
       
    } else {
        header("location:../index.php");
    }
?>