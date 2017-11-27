<?php
session_start();
include('../config.php');

if(!isset($_SESSION['id'])){
	header('Location: login.php');
	exit();
}
if(isset($_POST['submit'])){
	//colocar comentario no blog
	$nome = $_POST['nome'];
	$comentario = $_POST['comentario'];
	$post_id = $_POST['post_id'];
	$email = $_POST['email'];
	$nome = $bd->real_escape_string($nome);
	$comentario= $bd->real_escape_string($comentario);
	$comentario = htmlentities($comentario);
	if($nome && $comentario && $post_id){
		$query = $bd->query("INSERT INTO comentarios (nome, comentario, post_id, email) VALUES('$nome', '$comentario', '$post_id', '$email')");
		if($query){
			echo "Comentario adicionado com sucesso!";
		}else{
			echo "Erro!";
		}
		}else{
			echo "Comentario não inserido!";
	}
	
}
?>

<!DOCTYPE html>
<html lang="en">
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
   <li class='active '><a href='pagina_principal_utilizador.php'><span>Voltar para o blog</span></a></li>
</ul>

	<div id="wrapper">
		<div id="content">
			<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
			<label>Nome:</label><input type="text" name="nome" />
			<label>Email:</label><input type="text" name="email" />
			<label for="body">Texto:</label>
			<textarea name="comentario" cols=50 rows=10></textarea>
			<label>Post:</label>
			<select name="post_id">
				<?php
					$query = $bd->query("SELECT * FROM posts");
					while($row = $query->fetch_object()){
						echo "<option value='".$row->post_id."'>".$row->titulo."</option>";
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