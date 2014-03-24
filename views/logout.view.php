<?php

	// arquivo comum para o cabeçalho das páginas
	include("header.php");

	session_start();
	unset($_SESSION["jogador_id"]);
	unset($_SESSION["admin_id"]);

	echo '<meta http-equiv="refresh" content="5; url=?a=home">'
?>

<div class="panel panel-danger">
  	<div class="panel-body">
  		Logout realizado com sucesso. Volte sempre e Boa Sorte. =D
	</div>
</div>	

<?php

	// arquivo comum para o final das páginas
	include("footer.php");

?>
