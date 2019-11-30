<?php
	if(isset($_POST["loginn"])){
		$i = trylogin($_POST["user"],$_POST["password"]);
		if($i != "error"){
			$_SESSION["login"] = $_POST["user"];
			$_SESSION["id"] = $i;
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
			<input type='text' name='password'><br>
			<input type='submit' name='loginn'><center>
		</form>
	</div>
</body>