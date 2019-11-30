<head>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<meta charset="UTF-8"/>
<?php
	include "sy/db.php";
	session_start();
	if(isset($_SESSION["login"])){
		if(isset($_GET["p"])){
			switch($_GET["p"]){
				case "logout": include "sp/logout.php"; break;
				case "cadastro": include "sp/cadastro.php"; break;
				case "cadastroc": include "sp/cadastrocliente.php"; break;
				case "cadastrop": include "sp/cadastroproduto.php"; break;
				case "carregar": include "sp/carregar.php"; break;
				default: include "sp/home.php"; break;
			}
		} else include "sp/home.php";
	} else include "sp/login.php";
?>