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

?>

<div class="panel panel-default">
	<div class="panel-heading">Registrar resultados de hoje:&nbsp <?php echo date('d-m-Y');  ?> </div>
	<div class="panel-body">
		<form method = "post" action="index.php?a=jogador&post">
			<?php
				if(strlen($ERROR)){
					echo $ERROR;
				}
			?>
			O campos marcados com <span style="color:red">*</span> são obrigatórios!<br>
			<table>
				<tr>
					<td class="tdlabel">1º Sorteio<span style="color:red">*</span>:&nbsp&nbsp</td>
					<td class="tdform"><input type="text" name="nome" class="form-control" maxlength="4"></td>
				</tr>
				<tr>
					<td class="tdlabel">2º Sorteio<span style="color:red">*</span>:&nbsp&nbsp</td>
					<td class="tdform"><input type="text" name="nome" class="form-control" maxlength="4"></td>
				</tr>
				<tr>
					<td class="tdlabel">3º Sorteio<span style="color:red">*</span>:&nbsp&nbsp</td>
					<td class="tdform"><input type="text" name="nome" class="form-control" maxlength="4"></td>
				</tr>
				<tr>
					<td class="tdlabel">4º Sorteio<span style="color:red">*</span>:&nbsp&nbsp</td>
					<td class="tdform"><input type="text" name="nome" class="form-control" maxlength="4"></td>
				</tr>
				<tr>
					<td class="tdlabel">5º Sorteio<span style="color:red">*</span>:&nbsp&nbsp</td>
					<td class="tdform"><input type="text" name="nome" class="form-control" maxlength="4"></td>
				</tr>
			</table>
			<br>
			<div class="btn-group" style="margin-left: 78px">
			  <button type="button" class="btn btn-default" onclick="javascript:cleanMe();">Cancelar</button>
			  <button type="submit" class="btn btn-default">Enviar</button>
			</div>
		</form>
	</div>
</div>

<?php

	// arquivo comum para o final das páginas
	include("footer.php");

?>
