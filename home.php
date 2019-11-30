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

      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">Seleção</h1><br><br>
		
		<?php
		if(getCargo($_SESSION["id"])=="admin") echo "
		<form>
        <div id='success'></div>
          <div class='form-group'>
          <a href='index.php?p=cadastro'><button type='button' class='btn btn-primary btn-xl' id='sendMessageButton'>Cadastro Usuário</button></a>
        </div>
      </form>";
		if(getCargo($_SESSION["id"])=="admin" || getCargo($_SESSION["id"])=="gerente") echo"
	  <form>
        <div id='success'></div>
          <div class='form-group'>
          <a href='index.php?p=cadastroc'><button type='button' class='btn btn-primary btn-xl' id='sendMessageButton'>Cadastro Cliente</button></a>
        </div>
      </form>

	  <form>
        <div id='success'></div>
          <div class='form-group'>
          <a href='index.php?p=cadastrop'><button type='button' class='btn btn-primary btn-xl' id='sendMessageButton'>Cadastro Produto</button></a>
        </div>
      </form>

      <form>
        <div id='success'></div>
          <div class='form-group'>
          <a href='index.php?p=carregar'><button type='button' class='btn btn-primary btn-xl' id='sendMessageButton'>Registro de Carregamento</button></a>
        </div>
      </form>";
	  
		if(getCargo($_SESSION["id"])=="motorista") echo "
      <form>
        <div id='success'></div>
          <div class='form-group'>
          <button type='button' class='btn btn-primary btn-xl' id='sendMessageButton' onclick='getLocation()'>Atualizar Localização Atual</button>
        </div>
      </form>";
	  
	  echo "
      <form>
        <div id='success'></div>
          <div class='form-group'>
          <a href='index.php?p=logout'><button type='button' class='btn btn-primary btn-xl' id='sendMessageButton' onclick='getLocation()'>Logout</button></a>
        </div>
      </form>";
	?>
    </div>
  </header>

  <script>
  var lati = 0;
  var longi = 0;

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  }
}

function showPosition(position) {
lati = position.coords.latitude;
longi = position.coords.longitude;
}

</script>