<?php

include('config.php');

require_once('class.db.php');

require_once("models/jogador.php");
require_once("controllers/jogador.controller.php");

require_once("models/administrador.php");
require_once("controllers/administrador.controller.php");

$configUrl = "pgsql:dbname=".$config["dbname"].";host=".$config["dbhost"].";";

$db = new db($configUrl,$config["dbuser"],$config["dbpass"]);

$jogadorController = new JogadorController($db);

// $_SESSION["jogador_id"] = "2"; // TODO: FAZER O LOGIN!
session_start();
$jogador_id = $_SESSION["jogador_id"];
if(isset($jogador_id))
{
	$jogador = $jogadorController->byId($jogador_id);
}

$admin_id = $_SESSION["admin_id"];
if(isset($admin_id))
{
	$adminController = new AdministradorController($db);
	$admin = $adminController->byId($admin_id);
}

$ac = $_GET["a"];

if(!isset($ac) || $ac=="")
{
	$ac = "home";
}

if(file_exists("views/$ac.view.php"))
{
	include("views/$ac.view.php");
} else {
	include("views/404.php");
}

?>
