<?php

session_start();
include('../config.php');

if(isset($_SESSION['utilizador_id'])){
	header('Location: login.php');
	exit();
}
if(isset($_POST['submit'])){
	//colocar post no blog
	$titulo = $_POST['Titulo'];
	$mensagem = $_POST['mensagem'];
	$categoria = $_POST['categoria'];
	$nome = $_POST['nome'];
	$titulo = $bd->real_escape_string($titulo);
	$mensagem= $bd->real_escape_string($mensagem);
	$nome = $bd->real_escape_string($nome);
	$data = date('Y-m-d G:i:s');
	$mensagem = htmlentities($mensagem);
	if($titulo && $mensagem && $categoria){
		$query = $bd->query("INSERT INTO posts (titulo, mensagem, categoria_id, data, nome) VALUES('$titulo', '$mensagem', '$categoria', '$data', '$nome')");
		if($query){
			echo "Post Adicionado com Sucesso!";
		}else{
			echo "Erro!";
		}
		}else{
			echo "Post não inserido!";
	}
	
}
?>

<!DOCTYPE html>
<html>
<title>BLOG - ESTGP</title>

<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<link href="../css/estilo_index.css" rel="stylesheet" type="text/css">
<style>
#wrapper{
	margin:auto;
	width:800px;
	}
	label{display:block}
</style>
</head>

<body>
<div id='cssmenu'>
<ul>
<p><img src="img.jpg" width="500" height="61" /></p>
   <li class='active '><a href='index.php'><span>Voltar para o blog</span></a></li>
</ul>

	<div id="wrapper">
		<div id="content">
			<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
			<label>Nome: </label><input type="text" name="nome" />
			<label>Titulo:</label><input type="text" name="Titulo" />
			<label for="body">Texto:</label>
			<textarea name="mensagem" cols=50 rows=10></textarea>
			<label>Categoria:</label>
			<select name="categoria">
				<?php
					$query = $bd->query("SELECT * FROM categorias");
					while($row = $query->fetch_object()){
						echo "<option value='".$row->categoria_id."'>".$row->categoria."</option>";
				}
				?>
			</select>
			<br />
			<input type="submit" name="submit" value="Enviar" />
			</form>
		</div>
	</div>
</body>
</html>