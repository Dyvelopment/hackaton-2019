<!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <!-- Masthead Heading -->
      <h1>Usuários</h1><br>
		<table>
			<tr><th>ID</th><th>Nome</th><th>Cargo</th>
			<?php
				foreach (selectAll("usuario") as $value) {
					echo "<tr><td>".$value["id_usuario"]."</td><td>".$value["nome_usu"]."</td><td>".$value["cargo"]."</td></tr>";
				}
			?>
		</table><br>
		
      <h1>Clientes</h1><br>
		<table>
			<tr><th>ID</th><th>Nome</th><th>Pessoa</th>
			<?php
				foreach (selectAll("cliente") as $value) {
					echo "<tr><td>".$value["id_cli"]."</td><td>".$value["nome_cli"]."</td><td>".$value["tipo_cli"]."</td></tr>";
				}
			?>
		</table><br>
	  
	  <h1>Produtos</h1><br>
		<table>
			<tr><th>ID</th><th>Nome</th><th>Preço Unitário</th><th>Estoque</th>
			<?php
				foreach (selectAll("produto") as $value) {
					echo "<tr><td>".$value["id_pro"]."</td><td>".$value["nome_pro"]."</td><td>".$value["valor_pro"]."</td><td>".$value["qtd_pro"]."</td></tr>";
				}
			?>
		</table><br>
		
	  <h1>Veículos</h1><br>
		<table>
			<tr><th>ID</th><th>Placa</th><th>Tamanho (Metros)</th><th>Carga (Kg)</th><th>Motorista</th>
			<?php
				foreach (selectAll("veiculo") as $value) {
					echo "<tr><td>".$value["id_vei"]."</td><td>".$value["placa_vei"]."</td><td>".$value["tamanho_vei"]."</td><td>".$value["qtd_carga_vei"]."</td><td>".$value["id_usuario"]."</td></tr>";
				}
			?>
		</table>
	  
    </div>
  </header>











