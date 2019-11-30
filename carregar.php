<?php
if(getCargo($_SESSION["id"])!="admin" && getCargo($_SESSION["id"])!="gerente"){
	header("Location: .");
	die();
}
	if(isset($_POST['carregar'])){
			$i = cadastroCarga($_POST["local"], $_POST["distancia"], $_POST["status"], $_POST["produtos"], $_POST["valor"], $_POST["coordenada"]);
			if($i != "error"){
				header("Location: .");
				die();
			}
	} else {
	$pdo = db_connect();
	$stmt = $pdo->prepare("SELECT * FROM produto");
	$stmt->execute(); 
	$data = $stmt->fetchAll();
	echo "<script>";
	echo "p=[];";
	foreach ($data as $row) {
		echo "p[".$row['id_pro']."] = [".$row['id_pro'].",'".$row['nome_pro']."',".$row['valor_pro'].",".$row['qtd_pro'].",'".$row['tipo_pro']."','". $row['carc_pro']."','". $row['desc_pro']."'];";
	}
	echo "</script>";
	$i=0;
	foreach ($data as $row) {
		$i++;
		echo $row['nome_pro']." <input name='".$row['id_pro']."' type='number' name='quantity' min='0' max='".$row['qtd_pro']."' value='0'>";
	}
	
	echo "<script> total = 0; i = ".$i.";
	ls = '';
	function addToTotal(){
		for(x = 1; x<=i; x++){
			total = total + (p[x][2] * document.getElementsByName(x)[0].value);
			if(document.getElementsByName(x)[0].value > 0) {
				ls = ls+x+';'+document.getElementsByName(x)[0].value+'|';
			}
		}
		
		document.getElementsByName('valor')[0].value = total;
		document.getElementsByName('produtos')[0].value = ls.slice(0, -1);
	}
	</script>";
	}
?>

<script>
function carga(){
	addToTotal();
	document.getElementsByName('carregar')[0].click();
}
</script>
<form method="POST" action=''>
<input type="number" name="valor" hidden required>
<input type="text" name="produtos" hidden required>
<br>
Endereço do Local: <br><input type='text' name='local' required><br>
Coordenada: <br><input type='text' name='coordenada' required><br>
Distância: <br><input type='number' name='distancia' required><br>
Status: <br><input type='text' name='status'><br>



<input type="submit" hidden name="carregar"/>
</form>
<button onclick="carga()">Enviar</button>