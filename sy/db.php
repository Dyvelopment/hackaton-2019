<?php
	function db_connect(){
		$PDO = new PDO('mysql:dbname=sistema;host=localhost;charset=utf8', 'usbw','usbw');
		return $PDO;
	}
	function trylogin($user, $pass) {
		$con = db_connect();
		$sql = "SELECT id_usuario, nome_usu FROM usuario WHERE login_usu = :user AND senha = :password";
		$stmt = $con->prepare($sql);
		$stmt->bindValue(':user', $user);
		$stmt->bindValue(':password', $pass);
		$stmt->execute();
		$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (count($users) <= 0){
			return "error";
			exit;
		}
		return $users[0];
	}
	
	function getCargo($id){
		$con = db_connect();
		$sql = "SELECT cargo FROM usuario WHERE id_usuario = :id";
		$stmt = $con->prepare($sql);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (count($users) == 0){
			return "error";
			exit;
		}
		return $users[0]['cargo'];
	}
	
	function getVeiculoByName($name){
		$con = db_connect();
		$sql = "SELECT id FROM veiculo WHERE placa_vei = :placa";
		$stmt = $con->prepare($sql);
		$stmt->bindValue(':placa', $name);
		$stmt->execute();
		$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (count($users) == 0){
			return "error";
			exit;
		}
		return $users[0]['id_vei'];
	}
	
	function getMotoristaByName($name){
		$con = db_connect();
		$sql = "SELECT id_usuario FROM usuario WHERE nome_usu = :nome";
		$stmt = $con->prepare($sql);
		$stmt->bindValue(':nome', $name);
		$stmt->execute();
		$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (count($users) == 0){
			return "error";
			exit;
		}
		return $users[0]['id_usuario'];
	}
	
	function cadastroVeiculo($nome, $tamanho, $quantidade, $motorista){
		$con = db_connect();
		$sql = "SELECT id_vei FROM veiculo WHERE placa_vei = :nome";
		$stmt = $con->prepare($sql);
		$stmt->bindValue(':nome', $nome);
		$stmt->execute();
		$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (count($users) == 0){
		$sql = "INSERT INTO veiculo(placa_vei, tamanho_vei, qtd_carga_vei, id_usuario) VALUES(:nome, :tamanho, :qtd, :motorista)";
		$stmt = $con->prepare( $sql );
		$stmt->bindParam( ':nome', $nome );
		$stmt->bindParam( ':tamanho', $tamanho );
		$stmt->bindParam( ':qtd', $quantidade );
		$two = getMotoristaByName($motorista);
		echo "INSERT INTO veiculo(placa_vei, tamanho_vei, qtd_carga_vei, id_usuario) VALUES($nome, $tamanho, $quantidade, $two)";
		if($two=="error") return "error";
		$stmt->bindParam( ':motorista', $two);
		$stmt->execute();
		return "cadastrado";
		} else {
			return "error";
		}
	}
	
	function cadastroUsuario($user, $pass, $nome, $cargo, $cpf, $cnh, $contato, $endereco){
		if(trylogin($user, $pass) == "error"){
		$con = db_connect();
		$sql = "INSERT INTO usuario(login_usu, senha, nome_usu, cargo, CPF_usu, cnh_usu, contato_usu, endereco) VALUES(:user, :senha, :nome, :cargo, :cpf, :cnh, :contato, :endereco)";
		$stmt = $con->prepare( $sql );
		$stmt->bindParam( ':user', $user );
		$stmt->bindParam( ':senha', $pass );
		$stmt->bindParam( ':nome', $nome );
		$stmt->bindParam( ':cargo', $cargo );
		$stmt->bindParam( ':cpf', $cpf );
		$stmt->bindParam( ':cnh', $cnh );
		$stmt->bindParam( ':contato', $contato );
		$stmt->bindParam( ':endereco', $endereco );
		$stmt->execute();
		return "cadastrado";
		} else {
			return "error";
		}
	}
	
	function cadastroCliente($nome, $endereco, $complemento, $tipo, $cad, $contato){
		$con = db_connect();
		$sql = "SELECT id_cli FROM cliente WHERE nome_cli = :nome";
		$stmt = $con->prepare($sql);
		$stmt->bindValue(':nome', $nome);
		$stmt->execute();
		$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (count($users) == 0){
		$sql = "INSERT INTO cliente(nome_cli, data_cli, endereco_cli, complemento_cli, tipo_cli, cad_cli, contato_cli) VALUES(:nome, :data, :endereco, :complemento, :tipo, :cad, :contato)";
		$stmt = $con->prepare( $sql );
		$stmt->bindParam( ':nome', $nome );
		$stmt->bindParam( ':data', date('m/d/Y h:i:s a', time()));
		$stmt->bindParam( ':endereco', $endereco );
		$stmt->bindParam( ':complemento', $complemento );
		$stmt->bindParam( ':tipo', $tipo );
		$stmt->bindParam( ':cad', $cad );
		$stmt->bindParam( ':contato', $contato );
		$stmt->execute();
		return "cadastrado";
		} else {
			return "error";
		}
	}
	
	function cadastroCarga($local, $distancia, $status, $produto, $valor, $coordenada, $veiculo, $motorista){
		$con = db_connect();
		$sql = "INSERT INTO carga(local_carga, distancia_carga, status_carga, prod_carga, valor_carga, cord_destino, cord_carga, id_vei, id_usuario) VALUES(:local, :distancia, :status, :produto, :valor, :coordenada, :atual, :v, :u)";		
		$stmt = $con->prepare( $sql );
		$stmt->bindParam( ':local', $local );
		$stmt->bindParam( ':distancia', $distancia );
		$stmt->bindParam( ':status', $status );
		$stmt->bindParam( ':produto', $produto );
		$stmt->bindParam( ':valor', $valor );
		$stmt->bindParam( ':coordenada', $coordenada );
		$stmt->bindParam( ':atual', "" );
		$one = getVeiculoByName($veiculo);
		$two = getMotoristaByName($motorista);
		if($one=="error" || $two=="error") return "error";
		$stmt->bindParam( ':v', $one);
		$stmt->bindParam( ':u', $two);
		
		$stmt->execute();

		return "Funcionou!";
	}
	
	function cadastroProduto($nome, $valor, $quantidade, $tipo, $caracteristica, $descricao){
		$con = db_connect();
		$sql = "SELECT id_pro FROM produto WHERE nome_pro = :nome";
		$stmt = $con->prepare($sql);
		$stmt->bindValue(':nome', $nome);
		$stmt->execute();
		$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (count($users) == 0){
		$sql = "INSERT INTO produto(nome_pro, valor_pro, qtd_pro, tipo_pro, carc_pro, desc_pro) VALUES(:nome, :valor, :qtd, :tipo, :carc, :desc)";
		$stmt = $con->prepare( $sql );
		$stmt->bindParam( ':nome', $nome );
		$stmt->bindParam( ':valor', $valor );
		$stmt->bindParam( ':qtd', $quantidade );
		$stmt->bindParam( ':tipo', $tipo );
		$stmt->bindParam( ':carc', $caracteristica );
		$stmt->bindParam( ':desc', $descricao );
		$stmt->execute();
		return "cadastrado";
		} else {
			return "error";
		}
	}
	
	function selectAll($table){
		$con = db_connect();
		$sql = "SELECT * FROM ".$table;
		$stmt = $con->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
?>