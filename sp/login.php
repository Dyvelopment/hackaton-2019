<?php
	if(isset($_POST["loginn"])){
		$i = trylogin($_POST["user"],$_POST["password"]);
		if($i != "error"){
			$_SESSION["login"] = $i['nome_usu'];
			$_SESSION["id"] = $i['id_usuario'];
			header("Location: .");
			die();
		} else $x=1;
	} else $x=0;
	if($x==1) echo "<script>alert('Usuário e/ou senha invalidos!')</script>";
?>
	<title>Login</title>
</head>
<body>
	<div class="setar">
		<form action='' method='POST'><center>
			<input type='text' name='user'><br>
			<input type='password' name='password'><br>
			<input type='submit' name='loginn'><center>
		</form>
	</div>
</body>