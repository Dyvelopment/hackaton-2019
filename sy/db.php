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
		if (count($users) <= 0){
			return "error";
			exit;
		}
		return $users[0]['cargo'];
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
		$stmt->bindParam( ':cnh', $cnd );
		$stmt->bindParam( ':contato', $contato );
		$stmt->bindParam( ':endereco', $endereco );
		$stmt->execute();
		return "cadastrado";
		} else {
			return "error";
		}
	}
?>