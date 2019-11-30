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
  
  

  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <form method="POST" action="">
      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">Cadastrar produto</h1><br><br>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2">
          <br>
            <input class="form-control" id="name" type="text" required="required" placeholder="Nome" name="nome">
          <p class="help-block text-danger"></p>
        </div>
       </div>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2">
          <br>
            <input class="form-control" id="name" type="text" required="required" placeholder="Valor Unitário" name="valor">
          <p class="help-block text-danger"></p>
        </div>
       </div>
		
      <div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2">
          <br>
            <input class="form-control" id="name" type="text" required="required" placeholder="Quantidade" name="quantidade">
          <p class="help-block text-danger"></p>
        </div>
       </div>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2">
          <br>
            <input class="form-control" id="name" type="text" required="required" placeholder="Categoria" name="tipo">
          <p class="help-block text-danger"></p>
        </div>
       </div>
	   
	   <div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2">
          <br>
            <input class="form-control" id="name" type="text" required="required" placeholder="Caracteristicas" name="caracteristica">
          <p class="help-block text-danger"></p>
        </div>
       </div>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2">
          <br>
            <input class="form-control" id="name" type="text" required="required" placeholder="Descrição" name="descricao">
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