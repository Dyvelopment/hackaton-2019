<?php
	include "sy/db.php";
	session_start();
	if(isset($_SESSION["login"])){
		if(isset($_GET["p"])){
			switch($_GET["p"]){
				case "logout": include "sp/logout.php"; break;
				default: include "sp/home.php"; break;
			}
		} else include "sp/home.php";
	} else include "sp/login.php";
?>