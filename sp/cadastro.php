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
			Usuário: <br><input type='text' name='user'><br>
			Senha: <br><input type='password' name='password'><br>
			Nome: <br><input type='text' name='nome'><br>
			Cargo: <br><input type='text' name='cargo'><br>
			CPF: <br><input type='text' name='cpf'><br>
			CNH: <br><input type='text' name='cnh'><br>
			Contato: <br><input type='text' name='contato'><br>
			Endereço: <br><input type='text' name='endereco'><br>
			<br><input type='submit' name='cadastrar'><center>
		</form>
	</div>
</body>