<?php
//login_success.php
session_start();

if (!isset($_SESSION["id"])) {
    header("location:index.php");
} else {
    if($_SESSION['perfil'] == "Usuario"){
        if($_SERVER['REQUEST_URI'] == "/FAC042-BTMMP/locadora/lista_usuarios.php"){
            header("location:404.php");
            die;
        }
        if($_SERVER['REQUEST_URI'] == "/FAC042-BTMMP/locadora/lista_veiculos.php"){
            header("location:404.php");
            die;
        }
        if($_SERVER['REQUEST_URI'] == "/FAC042-BTMMP/locadora/lista_formapagamento.php"){
            header("location:404.php");
            die;
        }
        if($_SERVER['REQUEST_URI'] == "/FAC042-BTMMP/locadora/cadastra_usuario.php"){
            header("location:404.php");
            die;
        }
        if($_SERVER['REQUEST_URI'] == "/FAC042-BTMMP/locadora/cadastra_veiculo.php"){
            header("location:404.php");
            die;
        }
        if($_SERVER['REQUEST_URI'] == "/FAC042-BTMMP/locadora/cadastra_formapagamento.php"){
            header("location:404.php");
            die;
        }
        if($_SERVER['REQUEST_URI'] == "/FAC042-BTMMP/locadora/editar_usuario.php"){
            header("location:404.php");
            die;
        }
        if($_SERVER['REQUEST_URI'] == "/FAC042-BTMMP/locadora/editar_veiculo.php"){
            header("location:404.php");
            die;
        }
        if($_SERVER['REQUEST_URI'] == "/FAC042-BTMMP/locadora/editar_formapagamento.php"){
            header("location:404.php");
            die;
        }

        /* PARA SERVIDOR NA NUVEM
            if($_SERVER['REQUEST_URI'] == $_SERVER['HTTP_HOST']."/lista_usuarios.php"){
            header("location:404.php");
            die;
        }
        if($_SERVER['REQUEST_URI'] == $_SERVER['HTTP_HOST']."/lista_veiculos.php"){
            header("location:404.php");
            die;
        }
        if($_SERVER['REQUEST_URI'] == $_SERVER['HTTP_HOST']."/lista_formapagamento.php"){
            header("location:404.php");
            die;
        }
        if($_SERVER['REQUEST_URI'] == $_SERVER['HTTP_HOST']."/cadastra_usuario.php"){
            header("location:404.php");
            die;
        }
        if($_SERVER['REQUEST_URI'] == $_SERVER['HTTP_HOST']."/cadastra_veiculo.php"){
            header("location:404.php");
            die;
        }
        if($_SERVER['REQUEST_URI'] == $_SERVER['HTTP_HOST']."/cadastra_formapagamento.php"){
            header("location:404.php");
            die;
        }
        if($_SERVER['REQUEST_URI'] == $_SERVER['HTTP_HOST']."/editar_usuario.php"){
            header("location:404.php");
            die;
        }
        if($_SERVER['REQUEST_URI'] == $_SERVER['HTTP_HOST']."/editar_veiculo.php"){
            header("location:404.php");
            die;
        }
        if($_SERVER['REQUEST_URI'] == $_SERVER['HTTP_HOST']."/editar_formapagamento.php"){
            header("location:404.php");
            die;
        }
        */
    }
    
}
?>