
<?php
	include 'model/header.php';
	require_once 'model/checkout_pendente.php';
?>


<div class="box">
    <div class="box-header with-border">
    <h3 class="box-title">Confirmar Reserva</h3>
    <button type="button" class="close" onclick="location.href='reserva.php'" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

    </div>
    <div class="box-body">
        <form name="formu" class="form-horizontal" action="model/inserir_checkout.php" method="post">
            <fieldset>
			<input type="hidden" hiden name="idReserva" id="idReserva" value="<?php echo $_GET['id']?>">
            <!-- Form Name -->
            <!-- Select Basic -->
                <tr style="padding: 10px;">
                    <td colspan="2" style="vertical-align: top;">
                        <div style="padding: 9px; margin:15px 8px 15px; border: 2px #22878F solid; background: #eee;">

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="reserva">Valor da reserva</label>  
                                    <div class="col-md-6">
									<input class="form-control input-md" type="text" name="reserva" id="reserva" value="<?php echo $_GET['valor_reserva']?>" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="total">Total de Extras</label>  
                                    <div class="col-md-6">
									<input class="form-control input-md" type="text" name="total" id="total" onchange="calcular2();" value="0.00" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="total_pagar">Total a Pagar pela reserva</label>  
                                    <div class="col-md-6">
									<input class="form-control input-md" type="text" name="total_pagar" id="total_pagar" value="<?php echo $_GET['valor_reserva']?>" readonly>
                                </div>
                            </div>
                        </div>
		            </td>
	            </tr>


				<div class="form-group">
					<label class="col-md-4 control-label" for="dano">Valor de Danos</label>  
						<div class="col-md-6">
						<input class="form-control input-md" type="text" name="dano" id="dano" onKeyPress="return(MascaraMoeda(this,'','.',event))" onkeyup="calcular(), calcular2();" value="0.00">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="sujo">Valor de Limpeza</label>  
						<div class="col-md-6">
						<input class="form-control input-md" type="text" name="sujo" id="sujo" onKeyPress="return(MascaraMoeda(this,'','.',event))" onkeyup="calcular(), calcular2();" value="0.00">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="desabastecido">Valor de Gasolina</label>  
						<div class="col-md-6">
						<input class="form-control input-md" type="text" name="desabastecido" id="desabastecido" onKeyPress="return(MascaraMoeda(this,'','.',event))" onkeyup="calcular(), calcular2();" value="0.00">
					</div>
				</div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton"></label>
                    <div class="col-md-4">
                        <input type="submit" id="salvar" class="btn btn-primary" value="Salvar" >
                        <a href="checkout.php" class="btn btn-danger">Voltar</a>
                    </div>
                </div>


            </fieldset>
        </form>
    </div>

<script>
	function calcular() {
	    var num1 = Number(document.getElementById("dano").value);
	    var num2 = Number(document.getElementById("sujo").value);
	    var num3 = Number(document.getElementById("desabastecido").value);
	    var num4 = Number(document.getElementById("total").value);
	    var num5 = Number(document.getElementById("reserva").value);
	    document.getElementById("total").value = parseFloat(num1 + num2 + num3).toFixed(2);

	}
  	function calcular2() {
	    var num4 = Number(document.getElementById("total").value);
	    var num5 = Number(document.getElementById("reserva").value);
	    document.getElementById("total_pagar").value = parseFloat(num4 + num5).toFixed(2);
	
	}
</script>
<script language="javascript">
	//-----------------------------------------------------
	//Funcao: MascaraMoeda
	//Sinopse: Mascara de preenchimento de moeda
	//Parametro:
	//   objTextBox : Objeto (TextBox)
	//   SeparadorMilesimo : Caracter separador de milésimos
	//   SeparadorDecimal : Caracter separador de decimais
	//   e : Evento
	//Retorno: Booleano
	//Autor: Gabriel Fróes - www.codigofonte.com.br
	//-----------------------------------------------------
	function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){
		var sep = 0;
		var key = '';
		var i = j = 0;
		var len = len2 = 0;
		var strCheck = '0123456789';
		var aux = aux2 = '';
		var whichCode = (window.Event) ? e.which : e.keyCode;
		if (whichCode == 13) return true;
		key = String.fromCharCode(whichCode); // Valor para o código da Chave
		if (strCheck.indexOf(key) == -1) return false; // Chave inválida
		len = objTextBox.value.length;
		for(i = 0; i < len; i++)
			if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
		aux = '';
		for(; i < len; i++)
			if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
		aux += key;
		len = aux.length;
		if (len == 0) objTextBox.value = '';
		if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
		if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
		if (len > 2) {
			aux2 = '';
			for (j = 0, i = len - 3; i >= 0; i--) {
				if (j == 3) {
					aux2 += SeparadorMilesimo;
					j = 0;
				}
				aux2 += aux.charAt(i);
				j++;
			}
			objTextBox.value = '';
			len2 = aux2.length;
			for (i = len2 - 1; i >= 0; i--)
			objTextBox.value += aux2.charAt(i);
			objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
		}
		return false;
}
</script>
<?php
  include 'model/footer.php';
?>