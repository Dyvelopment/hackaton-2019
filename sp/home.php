<?php

?>
<title>Sistema</title>
<?php
if(getCargo($_SESSION["id"])=="admin") echo "<a href='index.php?p=cadastro'><button>Cadastro</button></a>"
?>
<a href="index.php?p=logout"><button>Logout</button></a>