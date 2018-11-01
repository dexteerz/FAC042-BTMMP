<?php

    $result="";
    if(isset($_POST['submit'])){
        require 'control/phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;

        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';
        $mail->Username='domlyko8@gmail.com';
        $mail->Password='AGzzcso1$';
        $mail->isSMTP();

        $mail->setFrom($_POST['email'],'LOCADORA');
        $mail->addAddress($_POST['email']);
        $mail->addReplyTo($_POST['email'],'LOCADORA');

        $mail->isHTML(true);
        $mail->Subject='RECUPERAÇÃO DE SENHA';
        $mail->Body='<h1 align=center>E-MAIL: '.$_POST['email'].'<br>SENHA: ... RECURSO NÃO DISPONIVEL TENTE NOVAMENTE MAIS TARDE</h1>';

        if(!$mail->send()){
            $result="Serviço indisponível, tente novamente mais tarde.";
        } else {
            $result="Sua senha foi enviada para ".$_POST['email'].", favor verificar sua caixa de entrada.";
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LocadoraBTMMP | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="style/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="style/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="style/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="style/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="style/plugins/iCheck/square/blue.css">
  <link rel="shortcut icon" type="image/x-icon" href="style/dist/img/favicon.ico" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    Locadora<b>BTMMP</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Esqueci minha senha</p>
    <h5 class="text-center text-success"><?= $result; ?></h5>
    <form method="post" action="">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Digite o e-mail de recuperação" id="email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
          
            <a href="index.php">VOLTAR</a><br>
          </div>
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit" id="submit">ENVIAR</button>
        </div>
        <!-- /.col -->
      </div>
      
    </form>
   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="style/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="style/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="style/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
