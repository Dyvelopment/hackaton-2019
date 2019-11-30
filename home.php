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
          <a href='index.php?p=list'><button type='button' class='btn btn-primary btn-xl' id='sendMessageButton'>Informações</button></a>
        </div>
      </form>
	  
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
          <a href='index.php?p=cadastrov'><button type='button' class='btn btn-primary btn-xl' id='sendMessageButton'>Cadastro Veículo</button></a>
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
          <a href='index.php?p=map'><button type='button' class='btn btn-primary btn-xl' id='sendMessageButton'>Ver Mapa</button></a>
        </div>
      </form>
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