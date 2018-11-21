<?php
include 'model/checkin_pendente.php';

?>
<table border="1">
<thead>
                    <tr>
                      <th><center>Id Reserva</center></th>
                      <th><center>Carro Selecionado</center></th>
                      <th><center>Usuario</center></th>
                      <th><center>data_inicio</center></th>
                      <th><center>data_fim</center></th>
                      <th><center>Forma Pagamento</center></th>
                      <th><center>Data da Reserva</center></th>
                      <th><center>valor da Reserva</center></th>
                      <th><center><a href="cadastra_veiculo.php" class="glyphicon glyphicon-plus"> NOVO</a>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    <?php
                    foreach ($resultado as $dado_reserva) {
                    ?>
                    <tr>
                    <td><?php echo $dado_reserva['idReserva'] ?></td>
                    <td><?php echo $dado_reserva['modelo'] ?></td>
                    <td><?php echo $dado_reserva['nome'] ?></td>
                    <td><?php echo $dado_reserva['data_inicio'] ?></td>
                    <td><?php echo $dado_reserva['data_fim'] ?></td>
                    <td><?php echo $dado_reserva['descricao'] ?></td>
                    <td><?php echo $dado_reserva['data_reserva'] ?></td>
                    <td><?php echo $dado_reserva['valorReserva'] ?></td>
                    <td><a href="model/inserir_checkin.php?id=<?php echo $dado_reserva['idReserva'] ?>">Checkin</a></td>
                  </tr>
                  <?php
                  };
                  ?>
                  </tbody>
                </table>