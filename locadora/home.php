<?php
  include 'model/header.php';

  $idUsuario = $_SESSION['id'];
  include 'model/conexao.php';
  $conn = getConexao();

  $sql = "SELECT COUNT(idReserva) AS total, 
	(SELECT COUNT(idReserva) FROM tbl_reserva 
     WHERE DATE_FORMAT(data_reserva, '%m') = DATE_FORMAT(NOW(), '%m') and idUsuario = $idUsuario) AS mes, 
     (SELECT COUNT(idReserva) FROM tbl_reserva 
      WHERE data_checkin IS NOT NULL and data_checkout IS NULL and data_fim < NOW() and idUsuario = $idUsuario) AS atrasadas, 
      (SELECT COUNT(idReserva) FROM tbl_reserva 
       WHERE data_fim IS NOT NULL and data_checkout is null and idUsuario = $idUsuario) AS aberto 
       FROM tbl_reserva
       WHERE idUsuario = $idUsuario";
  
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $resultado3 = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $total = null;
  $mes = null;
  $atrasadas = null;
  $aberto = null;

  foreach ($resultado3 as $key => $value) {
      $total .= $value['total'];
      $mes .= $value['mes'];
      $atrasadas .= $value['atrasadas'];
      $aberto .= $value['aberto'];
  } 
?>

<?php 
if($_SESSION['perfil'] == "Usuario"){
  echo "<section class='content-header'>";
} else {
  echo "<section style='display: none;'>";
}
?>
  <h1>
    Dashboard
  </h1>
  <ol class="breadcrumb"></ol>
</section>

<?php 
if($_SESSION['perfil'] == "Usuario"){
  echo "<section class='content'>";
} else {
  echo "<section style='display: none;'>";
}
?>
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <h3><?php echo $aberto ?></h3>
            <p>Reservas Abertas</p>
          </div>
          <div class="icon">
            <i class="fa fa-clock-o"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?php echo $total ?></h3>
            <p>Total de Reservas</p>
          </div>
          <div class="icon">
            <i class="fa fa-car"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?php echo $mes ?></h3>
            <p>Reservas do Mês</p>
          </div>
          <div class="icon">
            <i class="fa fa-calendar-minus-o"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo $atrasadas ?></h3>
            <p>Reservas Atrasadas</p>
          </div>
          <div class="icon">
            <i class="fa fa-calendar-times-o"></i>
          </div>
        </div>
      </div>
  </div>
</section>

<?php
  include 'model/footer.php'
?>