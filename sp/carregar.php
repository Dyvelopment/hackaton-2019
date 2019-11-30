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
	foreach ($data as $row) {
		echo $row['nome_pro']." <input name='".$row['id_pro']."' type='number' name='quantity' min='0' max='".$row['qtd_pro']."' value='0'>";
	}
?>