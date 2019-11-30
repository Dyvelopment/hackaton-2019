<?php

?>
<title>Sistema</title>
<?php
if(getCargo($_SESSION["id"])=="admin") echo "<a href='index.php?p=cadastro'><button>Cadastro Usuário</button></a>";
if(getCargo($_SESSION["id"])=="admin" || getCargo($_SESSION["id"])=="gerente") echo "<a href='index.php?p=cadastroc'><button>Cadastro Cliente</button></a>";
if(getCargo($_SESSION["id"])=="admin" || getCargo($_SESSION["id"])=="gerente") echo "<a href='index.php?p=cadastrop'><button>Cadastro Produto</button></a>";
if(getCargo($_SESSION["id"])=="admin" || getCargo($_SESSION["id"])=="gerente") echo "<a href='index.php?p=carregar'><button>Carregar</button></a>";
?>
<a href="index.php?p=logout"><button>Logout</button></a>