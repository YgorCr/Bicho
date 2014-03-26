<?php
	$apostaCtr = new ApostaController($db);
	$aposta = $apostaCtr->byId($_GET["apostaid"]);
	$aposta->set("pago", true);
	$apostaCtr->update($aposta);

	header("location:?a=a_pagar&&id=".$_GET["id"]);
?>