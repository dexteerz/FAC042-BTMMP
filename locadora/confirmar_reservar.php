<?php
    include 'model/conexao.php';
    include 'model/header.php';
    //==========================================================================
    //CALCULAR DATA DIFF
    //==========================================================================
    $data1 = substr($_POST['dataInicioFim'], 0, 10);
    $data2 = substr($_POST['dataInicioFim'], 13, 10);

    function geraTimestamp($data) {
        $partes = explode('/', $data);
        return mktime(0, 0, 0, $partes[1], $partes[0], $partes[2]);
    }
    $time_inicial = geraTimestamp($data1);
    $time_final = geraTimestamp($data2);

    $diferenca = $time_final - $time_inicial;
    $dataFinal = (int)floor( $diferenca / (60 * 60 * 24)); 
    if($dataFinal == 0){
        $dataFinal = 1;
    }

    // CONVERTE DATA PARA VERIFICAÇÃO NO BANCO
    $dt_inicio  = str_replace("/", "-", $data1);
    $dt_fim     = str_replace("/", "-", $data2);
    $datac1 = date('Y-m-d', strtotime($dt_inicio));
    $datac2 = date('Y-m-d', strtotime($dt_fim));

    $categoria =  $_POST['idCategoria'];

    //==========================================================================
    //CONECTA COM O BANCO
    //==========================================================================
    $conn = getConexao();

    //==========================================================================
    //TRAZ TABELA CATEGORIAS
    //==========================================================================
    $sql = "SELECT * FROM `tbl_categoria` WHERE `tbl_categoria`.`idCategoria`= $categoria";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    $dados = array();
    foreach ($resultado as $valor) {
        $dados = $valor;
    }

    //==========================================================================
    //POPULA VARIAVEIS
    //==========================================================================
    
    $diaria = $dados['valorDiaria'];
    $reserva = $dataFinal * $diaria;
    $cat = $dados['descricao'];

    //==========================================================================
    //TRAZ OS VEÍCULOS DISPONIVEIS NO INTERVALO DE TEMPO ESCOLHIDO PELO USUÁRIO
    //==========================================================================
    $sql = "SELECT v.idVeiculo, v.modelo, v.cor, c.descricao, c.valorDiaria 
    FROM tbl_veiculo AS v 
    LEFT JOIN (SELECT b.* FROM tbl_reserva AS b 
    WHERE b.data_fim > '$datac1' and b.data_inicio < '$datac2') AS b ON v.idVeiculo = b.idVeiculo 
    inner join tbl_categoria as c on c.idCategoria = v.idCategoria 
    WHERE b.idVeiculo is null and c.descricao = '$cat' and v.status = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $listagem = $stmt->fetchAll();
    $num_rows = count($listagem);

    //==========================================================================
    //TRAZ TABELA DE FORMA DE PAGAMENTO
    //==========================================================================
    $sql = "SELECT * FROM tbl_formapagamento WHERE status = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultadoFormaPagamento = $stmt->fetchAll(); 

    if($num_rows == 0){

        $reserva = 0;
    }

    
?>
<div class="box">
    <div class="box-header with-border">
    <h3 class="box-title">Confirmar Reserva</h3>
    <button type="button" class="close" onclick="location.href='reserva.php'" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

    </div>
    <div class="box-body">
        <form name="formu" onsubmit="return checkButons(this);" class="form-horizontal" action="model/fazer_reserva.php" method="post">
            <fieldset>
            <!-- Form Name -->
            <!-- Select Basic -->
                <tr style="padding: 10px;">
                    <td colspan="2" style="vertical-align: top;">
                        <div style="padding: 9px; margin:15px 8px 15px; border: 2px #22878F solid; background: #eee;">
                            <input class="form-control input-md" id="idUsuario" type="hidden" name="idUsuario" value="<?php echo $_SESSION['id'] ?>">
                            <input class="form-control input-md" id="data_inicio" type="hidden" name="data_inicio" value="<?php echo $data1 ?>">
                            <input class="form-control input-md" id="data_fim" type="hidden" name="data_fim" value="<?php echo $data2 ?>">
                            <input class="form-control input-md" id="valorReserva" type="hidden" name="valorReserva" value="<?php echo $reserva ?>">

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="data_inicio">Data de Inicio</label>  
                                    <div class="col-md-6">
                                    <label class="form-control input-md"><?php echo $data1 ?></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="data_fim">Data do Fim</label>  
                                    <div class="col-md-6">
                                    <label class="form-control input-md"><?php echo $data2 ?></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="valorReserva">Valor da Reserva</label>  
                                    <div class="col-md-6">
                                    <label class="form-control input-md"><?php echo $reserva ?></label>
                                </div>
                            </div>
                        </div>
		            </td>	
	            </tr>
            
                <div class="form-group">
                    <label class="col-md-4 control-label" >Selecione o Veículo</label>
                    <div class="col-md-6">
                        <div class="box-body table-responsive no-padding">
                            <table id="Reservas" class="table table-striped" align="center">
                                <thead>
                                    <th>Modelo</th>
                                    <th>Cor</th>
                                    <th>Categoria</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody>
                                    <?php
                                        if($num_rows == 0){
                                    ?>  
                                    <tr>
                                        <td colspan="4">NÃO HÁ VEÍCULOS DIPONÍVEIS</td>
                                    <tr>
                                    <?php
                                        };

                                        foreach ($listagem as $lista) {
                                    ?>
                                    <tr>
                                        <td><?=$lista['modelo'];?></td>
                                        <td><?=$lista['cor'];?></td>
                                        <td><?=$lista['descricao'];?></td>
                                        <td><input type="radio" name="idVeiculo" id="<?php echo $lista['idVeiculo']; ?> " value="<?php echo $lista['idVeiculo'];?>"></td>
                                    </tr>
                                    <?php
                                        };
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="idFormaPagamento">Forma de Pagamento</label>  
                    <div class="col-md-6">
                        <select class="form-control input-md" id="idFormaPagamento" name="idFormaPagamento"> 
                            <?php 
                                foreach ($resultadoFormaPagamento as $formapagamento) {
                            ?>
                            <option value="<?=$formapagamento['idFormaPagamento']?>"><?=$formapagamento['descricao']?></option>
                            <?php
                                };
                            ?>
                        </select>
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton"></label>
                    <div class="col-md-4">
                        <input type="submit" id="salvar" class="btn btn-primary" value="Salvar" >
                        <a href="reserva.php" class="btn btn-danger">Voltar</a>
                    </div>
                </div>


            </fieldset>
        </form>
    </div>

    <script>
       // checks buttons (radio, checkbox) - coursesweb.net 
        function checkButons(frm) { 
            if(formu.idVeiculo.checked == false){
                alert('Nenhum veículo selecionado!');
                return false;
            }
        }
    </script>
<?php
  include 'model/footer.php';
?>