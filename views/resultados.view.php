<script>	
	function cleanMe()
	{
		$(".form-control").val("");
		$("#estado").val(0);
	}
</script>

<?php

	// arquivo comum para o cabeçalho das páginas
	include("header.php");

	$sorteio1 = $_POST["sorteio1"];
	$sorteio2 = $_POST["sorteio2"];
	$sorteio3 = $_POST["sorteio3"];
	$sorteio4 = $_POST["sorteio4"];
	$sorteio5 = $_POST["sorteio5"];

	$jaHouveSorteioHoje = $db->select("resultados", "", "", "max(data)");
	$jaHouveSorteioHoje = $jaHouveSorteioHoje[0]["max"];
	if(date('Y-m-d') == $jaHouveSorteioHoje){
		echo '
			<div class="panel panel-default">
				<div class="panel-heading">Os resultados de hoje já foram cadastrados!!!!</div>
				<div class="panel-body">
					<a href="?a=admin">
				      <button type="button" class="btn btn-default btn-lg">
				        <span class="glyphicon glyphicon-chevron-left"></span> Voltar
				      </button>
				    </a>
				    <p>
			    </div>
			</div>
			';
	}
	else if($sorteio1 && $sorteio2 && $sorteio3 && $sorteio4 && $sorteio5){
		$resultadosCtrl = new ResultadosController($db);
		$resultado = new Resultados();

		foreach ($_POST as $key => $value) {
			$resultado->set($key, $value);
		}
		$resultadosCtrl->create($resultado);
		
		$apostaCtr = new ApostaController($db);
		$premiados = array();

		for($i = 0 ; $i < 5 ; $i++)
			$premiados[$i] = $apostaCtr->getPremiadas(date('Y-m-d'), $resultado->get("sorteio1"), $i);
		
		foreach ($premiados as $key => $premio) {
			foreach ($premio as $key2 => $value) {
				$value->set("premiada", true);
				$apostaCtr->update($value);
			}
		}

		echo "<div class='panel panel-default'>
				<div class='panel-heading'>Resultado cadastrado com sucesso</div>
			  </div>";

		echo '<meta http-equiv="refresh" content="3; url=?a=home">';
	}

?>


<?php
	if($admin && !$_POST["sorteio1"] && date('Y-m-d') != $jaHouveSorteioHoje){		?>
		<div class="panel panel-default">
			<div class="panel-heading">Registrar resultados de hoje:&nbsp <?php echo date('Y-m-d');  ?> </div>
			<div class="panel-body">
				<a href="?a=admin">
			      <button type="button" class="btn btn-default btn-lg">
			        <span class="glyphicon glyphicon-chevron-left"></span> Voltar
			      </button>
			    </a>
			    <p>

			    <div class="panel panel-default">
			      	<div class="panel-heading hdefault">Resultados</div>
			      	<div class="panel-body">
						<form method = "post" action="index.php?a=resultados&post">
							<?php
								if(strlen($ERROR)){
									echo $ERROR;
								}
							?>
							O campos marcados com <span style="color:red">*</span> são obrigatórios!<br>
							<table>
								<tr>
									<td class="tdlabel">1º Sorteio<span style="color:red">*</span>:&nbsp&nbsp</td>
									<td class="tdform"><input type="text" name="sorteio1" class="form-control" maxlength="4"></td>
								</tr>
								<tr>
									<td class="tdlabel">2º Sorteio<span style="color:red">*</span>:&nbsp&nbsp</td>
									<td class="tdform"><input type="text" name="sorteio2" class="form-control" maxlength="4"></td>
								</tr>
								<tr>
									<td class="tdlabel">3º Sorteio<span style="color:red">*</span>:&nbsp&nbsp</td>
									<td class="tdform"><input type="text" name="sorteio3" class="form-control" maxlength="4"></td>
								</tr>
								<tr>
									<td class="tdlabel">4º Sorteio<span style="color:red">*</span>:&nbsp&nbsp</td>
									<td class="tdform"><input type="text" name="sorteio4" class="form-control" maxlength="4"></td>
								</tr>
								<tr>
									<td class="tdlabel">5º Sorteio<span style="color:red">*</span>:&nbsp&nbsp</td>
									<td class="tdform"><input type="text" name="sorteio5" class="form-control" maxlength="4"></td>
								</tr>
							</table>
							<br>
							<div class="btn-group" style="margin-left: 78px">
							  <button type="button" class="btn btn-default" onclick="javascript:cleanMe();">Limpar</button>
							  <button type="submit" class="btn btn-default">Enviar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

<?php
	}
	else if(!$_POST["sorteio1"] && date('Y-m-d') != $jaHouveSorteioHoje){
		header("location:?a=home");
	}
	// arquivo comum para o final das páginas
	include("footer.php");

?>
