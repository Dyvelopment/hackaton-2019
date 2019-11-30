  <?php

if(getCargo($_SESSION["id"])!="admin" && getCargo($_SESSION["id"])!="gerente"){
	header("Location: .");
	die();
}
if(isset($_POST['cadastrar'])){
	$i = cadastroVeiculo($_POST["placa"], $_POST["tamanho"], $_POST["quantidade"], $_POST["motorista"]);
		if($i != "error"){
			header("Location: .");
			die();
		} else $x=1;
	} else $x = 0;
	if($x==1) echo "<script>alert('Veiculo já existente ou motorista inexistente!')</script>";
	?>
  
  

  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <form method="POST" action="">
      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">Cadastrar veículo</h1><br><br>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2">
          <br>
            <input class="form-control" id="name" type="text" required="required" placeholder="Placa (Apenas números e letras)" name="placa">
          <p class="help-block text-danger"></p>
        </div>
       </div>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2">
          <br>
            <input class="form-control" id="name" type="text" required="required" placeholder="Tamanho" name="tamanho">
          <p class="help-block text-danger"></p>
        </div>
       </div>
	   
      <div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2">
          <br>
            <input class="form-control" id="name" type="text" required="required" placeholder="Carga Aceitada" name="quantidade">
          <p class="help-block text-danger"></p>
        </div>
       </div>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2">
          <br>
            <input class="form-control" id="name" type="text" required="required" placeholder="Motorista/Usuário Responsável" name="motorista">
          <p class="help-block text-danger"></p>
        </div>
       </div>
	   

      <form>
        <div id="success"></div>
          <div class="form-group">
          <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton" name="cadastrar">Enviar</button>
        </div>
      </form>

      <form>
        <div id="success"></div>
          <div class="form-group">
          <a href="."><button type="button" class="btn btn-primary btn-xl" id="sendMessageButton">Voltar</button></a>
        </div>
      </form>
    </form>
    </div>
  </header>