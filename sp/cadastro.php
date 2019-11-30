<?php

if(getCargo($_SESSION["id"])!="admin"){
	header("Location: .");
	die();
}
if(isset($_POST['cadastrar'])){
	$i = cadastroUsuario($_POST["user"],$_POST["password"], $_POST["nome"], $_POST["cargo"], $_POST["cpf"], $_POST["cnh"], $_POST["contato"], $_POST["endereco"]);
		if($i != "error"){
			echo "<script>alert('Usuário cadastrado!')</script>";
			header("Location: .");
			die();
		} else $x=1;
	} else $x = 0;
	if($x==1) echo "<script>alert('Usuário já existente!')</script>";
?>
	<title>Login</title>
</head>
<body>
	<div class="setar">
		<form action='' method='POST'><center>
			Usuário: <br><input type='text' name='user' required><br>
			Senha: <br><input type='password' name='password' required><br>
			Nome: <br><input type='text' name='nome' required><br>
			Cargo: <br><input type='text' name='cargo' required><br>
			CPF: <br><input type='number' name='cpf' required><br>
			CNH: <br><input type='number' name='cnh' required><br>
			Contato: <br><input type='number' name='contato' required><br>
			Endereço: <br><input type='text' name='endereco' required><br>
			<br><input type='submit' name='cadastrar'><center>
			<br><a href='index.php'><input type='button' name='volt' value="Voltar"></a><center>
		</form>
	</div>
</body>