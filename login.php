
<?php
  if(isset($_POST["loginn"])){
		$i = trylogin($_POST["user"],$_POST["password"]);
		if($i != "error"){
			$_SESSION["login"] = $i['nome_usu'];
			$_SESSION["id"] = $i['id_usuario'];
			header("Location: .");
			die();
		} else $x=1;
	} else $x=0;
	if($x==1) echo "<script>alert('Usuário e/ou senha invalidos!')</script>";
?>



  <form action='' method='POST'>
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">Login</h1>

      <form name="sentMessage">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
              	<br>
                <input class="form-control" id="name" type="text" required="required" placeholder="Usuário" name='user'>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
              	<br>
                <input class="form-control" id="name" type="text" required="required" placeholder="Senha" name='password'>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br><br>
            
            <div id="success"></div>
            	<div class="form-group">
              <input type="submit" class="btn btn-primary btn-xl" value="Entrar" id="sendMessageButton" name='loginn'>
            </div>
          </form>
    </div>
  </header>
</form>