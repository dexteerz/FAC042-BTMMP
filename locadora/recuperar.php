<?php
 
    include 'model/conexao.php';
    
    $conn = getConexao();
    $count = 0;
    $result="";
    if(isset($_POST['submit'])) {  
      if(empty($_POST['email'])) {  
        $result = 'Preencha o campo e-mail';  
      } else {  
        $email = $_POST['email'];
        $sql = "SELECT * FROM tbl_usuario WHERE email = '$email'";
        $stmt = $conn->prepare($sql);  
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        $count = $stmt->rowCount();

        
        if($count > 0){ 
          $usuario = $resultado[0];
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
          $mail->Subject='RECUPERACAO DE SENHA';
          $mail->Body='<h1 align=center>E-MAIL: '.$_POST['email'].'<br>SENHA: '.$usuario['senha'].'</h1>';
  
          if(!$mail->send()){
              $result="Serviço indisponível, tente novamente mais tarde.";
          } else {
              $result="Sua senha foi enviada para ".$_POST['email'].", favor verificar sua caixa de entrada.";
          }  

          $count = 1;
        } else {  
          $result = 'E-mail não cadastrado no sistema, tente novamente mais tarde...';  
        } 

      }  
    } 

?>


<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LocadoraBTMMP | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="view/style/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="view/style/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="view/style/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="view/style/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="view/style/plugins/iCheck/square/blue.css">
  <link rel="shortcut icon" type="image/x-icon" href="view/style/dist/img/favicon.ico" />

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
    <form method="post" action="recuperar.php">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Digite o e-mail de recuperação" id="email" name="email" <?php if($count > 0) { echo "disabled='true'"; } ?>>
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
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit" id="submit" >ENVIAR</button>
        </div>
        <!-- /.col -->
      </div>
      
    </form>
   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="view/style/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="view/style/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="view/style/plugins/iCheck/icheck.min.js"></script>
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
