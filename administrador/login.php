<?php

session_start();

if(isset($_POST['submit'])){
	$admin = $_POST['admin'];
	$password = $_POST['password'];
	
	include('../config.php');
	
	if(empty($admin) || empty($password)){
		echo 'Tem que inserir o administrador e password!';
	}else{
		$admin = strip_tags($admin);
		$admin = $bd->real_escape_string($admin);
		$password = strip_tags($password);
		$password = $bd->real_escape_string($password);
		$password= md5($password);
		$query = $bd->query("SELECT id, admin FROM administrador WHERE admin='$admin' AND password='$password'");
		if ($query->num_rows === 1){
			while($row = $query->fetch_object()){
				$_SESSION['id'] = $row->id;
			}
			header('Location: pagina_admin.php');
			exit();
		}else{
			echo 'Dados inseridos incorretamente';
			}
	}
}
?>

<!DOCTYPE html>
<html>
<title>BLOG - ESTGP</title>

<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<script src="http://code.jquery.com/jquery-1.5.min.js"></script>
<link href="./css/estilo_index.css" rel="stylesheet" type="text/css">
</head>

<body>
<p><img src="img.jpg" width="500" height="61" /></p>
<h1>
	BLOG - ESTGP
</h1>
<div id="conteudo">
	<form action="login.php" method="post">
		<label>Administrador</label><input type="text" name="admin" />
		</p>
		<p>
		<label>Password</label><input type="password" name="password" />
		</p>
		<input type="submit" name="submit" value="Enviar" />
		<a href='../index.php'><span>Voltar para o menu inicial</span></a>
	</form>
</div>
</body>
</html>