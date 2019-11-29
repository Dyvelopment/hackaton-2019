<?php
	if(isset($_POST["loginn"])){
		if(trylogin($_POST["user"],$_POST["password"])){
			
			$x=2;
		} else $x=1;
	} else $x=0;

	if($x==1) echo "<script>alert('Usuário e/ou senha invalidos!')</script>"
	if($x!=2) echo 
	"<form action='#'>
		<input type='text' name='user'>
		<input type='text' name='password'>
	</form>"
?>