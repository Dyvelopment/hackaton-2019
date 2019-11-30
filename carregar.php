<script>
function carga(){
	addToTotal();
	document.getElementsByName('carregar')[0].click();
}
</script>



  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">Registro de Cargas</h1>
<form method="POST" action=''>
<?php
if(getCargo($_SESSION["id"])!="admin" && getCargo($_SESSION["id"])!="gerente"){
	header("Location: .");
	die();
}
	if(isset($_POST['carregar'])){
			$i = cadastroCarga($_POST["local"], $_POST["distancia"], $_POST["status"], $_POST["produtos"], $_POST["valor"], $_POST["coordenada"], $_POST["veiculo"], $_POST["motorista"]);
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
	
	}
?>
<input type="number" name="valor" hidden required>
<input type="text" name="produtos" hidden required>
      <form name="sentMessage">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
              	<br>
                <input class="form-control" id="name" type="text" required="required" placeholder="Local da Entrega" name='local'>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
              	<br>
                <input class="form-control" id="name" type="text" required="required" placeholder="Coordenadas do Local" name='coordenada'>
                <p class="help-block text-danger"></p>
              </div>
            </div>
			<div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
              	<br>
                <input class="form-control" id="name" type="text" required="required" placeholder="Distância" name='distancia'>
                <p class="help-block text-danger"></p>
              </div>
            </div>
			<div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
              	<br>
                <input class="form-control" id="name" type="text" required="required" placeholder="Status" name='status'>
                <p class="help-block text-danger"></p>
              </div>
            </div>
			<div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
              	<br>
                <input class="form-control" id="name" type="text" required="required" placeholder="Motorista" name='motorista'>
                <p class="help-block text-danger"></p>
              </div>
            </div>
			<div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
              	<br>
                <input class="form-control" id="name" type="text" required="required" placeholder="Veiculo" name='veiculo'>
                <p class="help-block text-danger"></p>
              </div>
            </div>
			<?php
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
			?>
			<input type="submit" hidden name="carregar">
			
            <br><br>
            <form>
      <div id="success"></div>
        <div class="form-group">
          <button type="button" class="btn btn-primary btn-xl" id="sendMessageButton" onclick="carga()">Carregar</button>
        </div>
      </form>
	  <form>
        <div id="success"></div>
          <div class="form-group">
          <a href="."><button type="button" class="btn btn-primary btn-xl" id="sendMessageButton">Voltar</button></a>
        </div>
      </form>
    </div>
  </header>



</form>
	