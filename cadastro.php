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


  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <form method="POST" action="">
      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">Cadastrar produto</h1><br><br>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2">
          <br>
            <input class="form-control" id="name" type="text" required="required" name="user" placeholder="Usuário">
          <p class="help-block text-danger"></p>
        </div>
       </div>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2">
          <br>
            <input class="form-control" id="name" type="text" required="required" name="password" placeholder="Senha">
          <p class="help-block text-danger"></p>
        </div>
       </div>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2">
          <br>
            <input class="form-control" id="name" type="text" required="required" name="nome" placeholder="Nome">
          <p class="help-block text-danger"></p>
        </div>
       </div>

       <div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2">
          <br>
            <input class="form-control" id="name" type="text" required="required" name="cargo" placeholder="Cargo">
          <p class="help-block text-danger"></p>
        </div>
       </div>

       <div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2">
          <br>
            <input class="form-control" id="name" type="text" required="required" name="cpf" placeholder="CPF">
          <p class="help-block text-danger"></p>
        </div>
       </div>

       <div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2">
          <br>
            <input class="form-control" id="name" type="text" required="required" name="cnh" placeholder="CNH">
          <p class="help-block text-danger"></p>
        </div>
       </div>
	
		<div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2">
          <br>
            <input class="form-control" id="name" type="text" required="required" name="contato" placeholder="Contato">
          <p class="help-block text-danger"></p>
        </div>
       </div>
	
       <div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2">
          <br>
            <input class="form-control" id="name" type="text" required="required" name="endereco" placeholder="Endereço">
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