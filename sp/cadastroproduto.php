<?php

if(getCargo($_SESSION["id"])!="admin" && getCargo($_SESSION["id"])!="gerente"){
	header("Location: .");
	die();
}
if(isset($_POST['cadastrar'])){
	$i = cadastroProduto($_POST["nome"], $_POST["valor"], $_POST["quantidade"], $_POST["tipo"], $_POST["caracteristica"], $_POST["descricao"]);
		if($i != "error"){
			echo "<script>alert('Produto não cadastrado!')</script>";
			header("Location: .");
			die();
		} else $x=1;
	} else $x = 0;
	if($x==1) echo "<script>alert('Produto já existente!')</script>";
	?>
	
	<title>Login</title>
</head>
<body>
	<div class="setar">
		<form action='' method='POST'><center>
			Nome: <br><input type='text' name='nome' required><br>
			Valor: <br><input type='number' name='valor' required><br>
			Quantidade: <br><input type='number' name='quantidade' required><br>
			Categoria: <br><input type='text' name='tipo' required><br>
			Descrição: <br><input type='text' name='descricao' required><br>
			<br><input type='submit' name='cadastrar'>
			<br><a href='index.php'><input type='button' name='volt' value="Voltar"></a><center>
		</form>
			
	</div>
</body>