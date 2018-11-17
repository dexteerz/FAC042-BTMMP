<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LocadoraBTMMP | Registre-se</title>
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
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    Locadora<b>BTMMP</b>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Registre-se para utilizar de nossos serviços</p>

    <form id="registrar" action="model/salvar_usuario_externo.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nome Completo" id="nome" name="nome" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="CPF" id="cpf" name="cpf" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Endereço" id="endereco" name="endereco" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" id="email" name="email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input title="A senha deve conter pelo menos 6 caracteres, incluindo uma MAIUSCULA / minúsculas e números." type="password" class="form-control" placeholder="Senha" id="isenha" name="senha" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback" id="confirmpass">
        <input type="password" title="Por favor, digite a mesma senha anterior." class="form-control" placeholder="Confirmar Senha" id="icsenha" name="csenha" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {

          // JavaScript form validation

          var checkPassword = function(str)
          {
            var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
            return re.test(str);
          };

          var checkForm = function(e)
          {
            if(this.senha.value != "" && this.senha.value == this.csenha.value) {
              if(!checkPassword(this.senha.value)) {
                alert("A senha que você digitou não é válida!");
                this.senha.focus();
                e.preventDefault();
                return;
              }
            } else {
              alert("Erro: Por favor, verifique se você digitou e confirmou sua senha!");
              this.csenha.focus();
              e.preventDefault();
              return;
            }

          };

          var myForm = document.getElementById("registrar");
          myForm.addEventListener("submit", checkForm, true);

          // HTML5 form validation

          var supports_input_validity = function()
          {
            var i = document.createElement("input");
            return "setCustomValidity" in i;
          }

          if(supports_input_validity()) {

            var pwd1Input = document.getElementById("isenha");
            pwd1Input.setCustomValidity(pwd1Input.title);

            var pwd2Input = document.getElementById("icsenha");

            // input key handlers


            pwd1Input.addEventListener("keyup", function(e) {
              this.setCustomValidity(this.validity.patternMismatch ? pwd1Input.title : "");
              if(this.checkValidity()) {
                pwd2Input.pattern = RegExp.escape(this.value);
                pwd2Input.setCustomValidity(pwd2Input.title);
              } else {
                pwd2Input.pattern = this.pattern;
                pwd2Input.setCustomValidity("");
              }
            }, false);

            pwd2Input.addEventListener("keyup", function(e) {
              this.setCustomValidity(this.validity.patternMismatch ? pwd2Input.title : "");
            }, false);

          }

        }, false);

      </script>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">

          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">CRIAR</button>
        </div>
        <!-- /.col -->
      </div>
  </form>

    <a href="index.php" class="text-center">Eu já possuo uma conta</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="view/style/bower_components/jquery/dist/jquery.min.js"></script>
<script src="view/style/bower_components/jquery/dist/jquery.mask.js"></script>
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
    $(document).ready(function () { 
        var $seuCampoCpf = $("#cpf");
        $seuCampoCpf.mask('000.000.000-00', {reverse: true});
    });
  });
</script>
</body>
</html>
