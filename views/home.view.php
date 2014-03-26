<?php

	// arquivo comum para o cabeçalho das páginas
	include("header.php");

?>

<?php
	session_start();

	if($jogador){
		header("location:?a=resuhist");
	}

	$cpf = $_POST["cpf"];
	$senha = $_POST["senha"];

	if(isset($cpf) && isset($senha))
	{
		$ctr = new JogadorController($db);
		$jogador = $ctr->tryLogin($cpf, $senha);
		if($jogador)
		{
			$_SESSION["jogador_id"] = $jogador->get("id");
			header("location:?a=resuhist");
		} else {
			$errorMsg = "Falha no login!";
		}
	}

?>

<?php
	if($errorMsg) {
?>

<div class="panel panel-danger">
  <div class="panel-heading">Erro</div>
  <div class="panel-body">
  	<?php echo $errorMsg; ?>
  </div>
</div>

<?php
	}
?>

<div class="panel panel-default">
  <div class="panel-heading">Login</div>
  <div class="panel-body" style="padding-left: 10%; padding-right: 10%;">
  	<table class="table">
		<td>
			<img src="static/images/premios_300x294.png" class="img-rounded">
		</td>
  		<td>
		  	<form action="index.php?a=jogador.login&login" method="post">
			  	<table class="table" style="vertical-align:middle">
			  		<tr>
			  			<td>CPF:</td>
			  			<td><input type="text" class="form-control" name="cpf"></td>
			  		</tr>

			  		<tr>
			  			<td>Senha:</td>
			  			<td><input type="password" class="form-control" name="senha"></td>
			  		</tr>

			  	</table>
			  	<div>
			  		<center>
				  		<button type="clean" class="btn btn-default">Limpar</button>
				  		<button type="submit" class="btn btn-default">Entrar</button>
			  		</center>
			  	</div>
			</form>
		</td>
	</table>
  </div>
</div>

<?php

	// arquivo comum para o final das páginas
	include("footer.php");

?>