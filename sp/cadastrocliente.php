<?php

if(getCargo($_SESSION["id"])!="admin" && getCargo($_SESSION["id"])!="gerente"){
	header("Location: .");
	die();
}
if(isset($_POST['cadastrar'])){
	$i = cadastroCliente($_POST["nome"], $_POST["endereco"], $_POST["complemento"], $_POST["tipo"], $_POST["cad"], $_POST["contato"]);
		if($i != "error"){
			echo "<script>alert('Cliente cadastrado!')</script>";
			header("Location: .");
			die();
		} else $x=1;
	} else $x = 0;
	if($x==1) echo "<script>alert('Cliente já existente!')</script>";
?>
	<title>Login</title>
</head>
<body>
	<div class="setar">
		<form action='' method='POST'><center>
			Nome: <br><input type='text' name='nome' required><br>
			Endereço: <br><input type='text' name='endereco' required><br>
			Complemento: <br><input type='text' name='complemento' required><br>
			Contato: <br><input type='number' name='contato' required><br>
			Pessoa:<br><select name='tipo' required>
				<option value='fisica' selected>Fisica</option>
				<option value='juridica'>Juridica</option>
			</select><br>
			CPF/CNPJ: <br><input type='number' name='cad' required><br>
			<br><input type='submit' name='cadastrar'><center>
			<br><a href='index.php'><input type='button' name='volt' value="Voltar"></a><center>
		</form>
	</div>
</body>