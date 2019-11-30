<?php
	$pdo = db_connect();
	$stmt = $pdo->prepare("SELECT * FROM produto");
	$stmt->execute(); 
	$data = $stmt->fetchAll();
	echo "<script>";
	foreach ($data as $row) {
		echo "p[".$row['id_pro']."] = [".$row['id_pro'].",".$row['nome_pro'].",".$row['valor_pro'].",".$row['qtd_pro'].",".$row['tipo_pro'].",". $row['carc_pro'].",". $row['desc_pro']."];";
	}
	echo "</script>";
	$i=0;
	foreach ($data as $row) {
		$i++;
		echo $row['nome_pro']." <input name='".$row['id_pro']."' type='number' name='quantity' min='0' max='".$row['qtd_pro']."' value='0'>";
	}
	
	echo "<script> total = 0; i = $i;
	
	function addToTotal(){
		for(x = 1; x<=i; x++){
			total = total + (window['p['+x+'][2]'] * document.getElementByName(x).value;
		}
		document.getElementByName('valorTot').value = total;
	}
	</script>"
?>

<button onclick(addToTotal())></button>
<input type="number" name="valorTot"/>