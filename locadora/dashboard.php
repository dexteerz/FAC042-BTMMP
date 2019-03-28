<?php
  include 'model/header.php';
  include 'model/conexao.php';

  //////////////////////////////////////////////////////////////
  // VALOR TOTAL DE ALUGUEIS POR CATEGORIA
  //////////////////////////////////////////////////////////////
  $conn = getConexao();

  $sql = "select SUM(r.valorReserva) as valorReserva, c.descricao, DATE_FORMAT(r.data_reserva, '%Y-%m') as data_reserva from tbl_reserva AS r
	Inner join tbl_veiculo AS v ON r.idVeiculo = v.idVeiculo
	inner join tbl_categoria AS c ON c.idCategoria = v.idCategoria
  where r.data_checkout != 0
  GROUP BY c.descricao";
  
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $resultado1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $chart_data1 = null;

  foreach ($resultado1 as $key => $value) {
      $chart_data1 .= "{categoria:'".$value['descricao']."', valorReserva:".$value['valorReserva'].", reserva:'".$value['data_reserva']."'}, ";
  }  
  $chart_data1 = substr($chart_data1, 0, -2);

  //////////////////////////////////////////////////////////////
  // VALOR TOTAL DE ALUGUEIS POR CATEGORIA
  //////////////////////////////////////////////////////////////
  $sql = "select SUM(r.valorReserva) AS valorReserva , c.descricao, DATE_FORMAT(r.data_reserva, '%Y-%m') as data_reserva from tbl_reserva AS r
	Inner join tbl_veiculo AS v ON r.idVeiculo = v.idVeiculo
	inner join tbl_categoria AS c ON c.idCategoria = v.idCategoria
  where r.data_checkout != 0
  GROUP BY data_reserva";
  
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $resultado2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $chart_data2 = null;
  foreach ($resultado2 as $key => $value) {
      $chart_data2 .= "{categoria:'".$value['descricao']."', valorReserva:".$value['valorReserva'].", reserva:'".$value['data_reserva']."'}, ";
  }  
  $chart_data2 = substr($chart_data2, 0, -2);

  //////////////////////////////////////////////////////////////
  // TOTAL DE RESERVAS
  //////////////////////////////////////////////////////////////
  $sql = "SELECT COUNT(idReserva) AS total, 
	(SELECT COUNT(idReserva) FROM tbl_reserva 
     WHERE DATE_FORMAT(data_reserva, '%m') = DATE_FORMAT(NOW(), '%m')) AS mes, 
     (SELECT COUNT(idReserva) FROM tbl_reserva 
      WHERE data_checkin IS NOT NULL and data_checkout IS NULL and data_fim < NOW()) AS atrasadas, 
      (SELECT COUNT(idReserva) FROM tbl_reserva 
       WHERE data_fim IS NOT NULL and data_checkout IS NULL) AS aberto 
       FROM tbl_reserva";
  
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
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
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



  <div class="row">
    <div class="col-lg-12 col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">VALOR TOTAL DE ALUGUEIS POR CATEGORIA</h3>
        </div>
        <div class="tab-content">
          <div id="chart"></div>
        </div>
        <div class="box-header">
          <h3 class="box-title">VALOR TOTAL DE ALUGUEIS POR MÊS</h3>
        </div>
        <div class="tab-content">
          <div id="line-example"></div>
        </div>
      </div>
    </div>
  </div>


<script>
  Morris.Bar({
    element : 'chart',
    data:[<?php echo $chart_data1; ?>],
    xkey:'categoria',
    ykeys:['valorReserva'],
    labels:['Valor Total R$'],
    barRatio: 0.4,
    hideHover: 'auto',
    resize: true,
    stacked:false,
    barColors:['#d13c3e']
  });

  var months = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];

  Morris.Line({
  element: 'line-example',
  data: [<?php echo $chart_data2; ?>],
  xkey: 'reserva',
  ykeys: ['valorReserva'],
  labels: ['Valor Total R$'],
  xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
    var month = months[x.getMonth()];
    return month;
  },
  dateFormat: function(x) {
    var month = months[new Date(x).getMonth()];
    return month;
  },
});
  
</script>




<?php
  include 'model/footer.php';
?>