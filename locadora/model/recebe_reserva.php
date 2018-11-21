
    <?php
        require '../control/sessao.php';
        


    $data1 = $_POST['data_inicio'];
    $data2 = $_POST['data_fim'];
    $categoria =  $_POST['idCategoria'];


    include 'conexao.php';
    $conn = getConexao();

    $sql = "SELECT * FROM `tbl_categoria` WHERE `tbl_categoria`.`idCategoria`= $categoria";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
   
    $dados = array();
        foreach ($resultado as $valor) {
            $dados = $valor;
        }
 
    $d1 = strtotime($data1); 
    $d2 = strtotime($data2);

    if ($d2<$d1) {
        echo "ERRO: Favor escolher um intervalo de data Válido";
    } else {
        $dataFinal = ($d2 - $d1) /86400 + 1;
            $diaria = $dados['valorDiaria'];
            $reserva = $dataFinal * $diaria;
            echo "Reserva de $dataFinal dias, com o custo da diaria a R$ $diaria Total R$ $reserva reais .";
    //==========================================================================
    //TRAZ TABELA DE RESERVA
    //==========================================================================
 

    }
    
?>
<form action="fazer_reserva.php" method="POST">
<input type="text" name="data_inicio" value="<?php echo $data1 ?>">
<input type="text" name="data_fim" value="<?php echo $data2 ?>">
<input type="text" name="valorReserva" value="<?php echo $reserva ?>">
<input type="text" name="idUsuario" value="<?php echo $_SESSION['id'] ?>">
<br>
<hr>
<!--NESTA LINHA VOU TRSNAFORMAR A DATA EM FORMATO BR -->
<?php echo date('d/m/Y', strtotime($data1)); ?>
<br>
<?php echo date('d/m/Y', strtotime($data2)); ?>



<table border="1">
<thead>
    <th>Modelo</th>
    <th>Cor</th>
    <th>Categoria</th>
    <th>Ações</th>
</thead>
<tbody>
<?php

$conn = getConexao();

        $cat = $dados['descricao'];

        $sql = "SELECT v.idVeiculo, v.modelo, v.cor, c.descricao, c.valorDiaria 
        FROM tbl_veiculo AS v 
        LEFT JOIN (SELECT b.* FROM tbl_reserva AS b 
        WHERE b.data_fim >= '$data1' and b.data_inicio <= '$data2' ) AS b ON v.idVeiculo = b.idVeiculo 
        inner join tbl_categoria as c on c.idCategoria = v.idCategoria 
        WHERE b.idVeiculo is null and c.descricao = '$cat' and v.status = 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $listagem = $stmt->fetchAll();

        ?>
        <?php
        //$selecao= array();
        foreach ($listagem as $lista) {

        ?>
    <tr>

        <td><?=$lista['modelo'];?></td>
        <td><?=$lista['cor'];?></td>
        <td><?=$lista['descricao'];?></td>
        <td><input type="radio" name="idVeiculo" id="<?php echo $lista['idVeiculo']; ?> " value="<?php echo $lista['idVeiculo'];?> "></td>
  
    </tr>
    <?php
    };
    ?>
   
</tbody>
</table>

<select id="idFormaPagamento" name="idFormaPagamento">
            
              <?php  
                $conn = getConexao();

                $sql = "SELECT * FROM tbl_formapagamento WHERE status = 1";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $resultadoFormaPagamento = $stmt->fetchAll(); 
              foreach ($resultadoFormaPagamento as $formapagamento) {
               ?>
               <option value="<?=$formapagamento['idFormaPagamento']?>"><?=$formapagamento['descricao']?></option>
              <?php
              };
              ?>
            </select>
            <input type="submit" value="Reservar">
</form>