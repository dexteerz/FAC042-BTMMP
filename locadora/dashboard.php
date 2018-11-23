<?php
  include 'model/header.php';

  //	select r.valorReserva, c.descricao from tbl_reserva AS r
	// Inner join tbl_veiculo AS v ON r.idVeiculo = v.idVeiculo
	// inner join tbl_categoria AS c ON c.idCategoria = v.idCategoria
	// where r.data_checkout != 0
  
?>
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
  <script src="http://cdn.oesmith.co.uk/morris-0.4.1.min.js"></script>
<div id="line-example"></div>

<script>
/*
 * Play with this code and it'll update in the panel opposite.
 *
 * Why not try some of the options above?
 */
Morris.Line({
  element: 'line-example',
  data: [
    { y: '2006', a: 100, b: 90 },
    { y: '2007', a: 75,  b: 65 },
    { y: '2008', a: 50,  b: 40 },
    { y: '2009', a: 75,  b: 65 },
    { y: '2010', a: 50,  b: 40 },
    { y: '2011', a: 75,  b: 65 },
    { y: '2012', a: 100, b: 90 }
  ],
  xkey: 'y',
  ykeys: ['a', 'b'],
  labels: ['Series A', 'Series B']
});
</script>

<?php
  include 'model/footer.php';
?>