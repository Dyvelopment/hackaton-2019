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
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger"><img src="img/Logo-Bakof.png" width="30%"></a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

     <form method="POST" action="">
      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">Cadastrar Cliente</h1><br><br>

 
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
            <input class="form-control" id="name" type="text" required="required" name="endereco" placeholder="Endereço">
          <p class="help-block text-danger"></p>
        </div>
       </div>

		<div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2">
          <br>
            <input class="form-control" id="name" type="text" required="required" name="complemento" placeholder="Complemento">
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

       <div class="control-group" >
        <div class="form-group floating-label-form-group controls mb-0 pb-2"><br>
            <select class="form-control" id="name" required="required" name="tipo">
              <option selected>Escolher tipo de pessoa</option>
              <option>Física</option>
              <option>Jurídica</option>
            </select>
          <p class="help-block text-danger"></p>
        </div>
       </div>

       <div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2">
          <br>
            <input class="form-control" id="name" type="text" required="required" name="cad" placeholder="CPF/CNPJ">
          <p class="help-block text-danger"></p>
        </div>
       </div>

      <form>
        <div id="success"></div>
          <div class="form-group">
          <br><button type="button" class="btn btn-primary btn-xl" id="sendMessageButton" name="cadastrar">Enviar</button>
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