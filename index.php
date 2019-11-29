<?php
	include "sy/db.php";
	session_start()
	if($_SESSION["login"]){
		
	} else include "sp/login.php";
?>