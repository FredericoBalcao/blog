<?php
if(!isset($_GET['id'])){
	header('Location: ../index.php');
	exit();
}else{
	$id = $_GET['id'];
}

include('../config.php');

if(!is_numeric($id)){
	header('Location: ../index.php');
}

$sql = "SELECT titulo, mensagem FROM posts WHERE post_id='$id'";
$query = $bd->query($sql);
if($query->num_rows != 1){
	header('Location: ../index.php');
	exit();
}

if(isset($_POST['submit'])){
	//colocar comentario no blog
	$nome = $_POST['nome'];
	$comentario = $_POST['comentario'];
	$email = $_POST['email'];
	$post_id = $_POST['post_id'];
	$nome = $bd->real_escape_string($nome);
	$comentario= $bd->real_escape_string($comentario);
	$email=$bd->real_escape_string($email);
	$post_id = $bd->real_escape_string($post_id);
	$comentario = htmlentities($comentario);
	if($nome && $comentario && $email && $post_id){
		$query = $bd->query("INSERT INTO comentarios (nome, comentario, email, post_id) VALUES('$nome', '$comentario', '$email', '$post_id')");
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
<html>
	
<title>BLOG - ESTGP</title>

<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE-9" />
<script src="http://code.jquery.com/jquery-1.5.min.js"></script>
<link href="../css/estilo_index.css" rel="stylesheet" type="text/css">

<style type="text/css">
#container{
	width:800px;
	padding:5px;
	margin:auto;
	}
label{
	dispplay: block;
	}
#wrapper{
	margin:auto;
	width:800px;
	}
label{display:block}
</style>
</head>

<body>
<div id="container">
	<p><img src="img.jpg" align="center" width="500" height="61" /></p>
	<div id="post">
	<?php
	$query= $bd->query("SELECT titulo, mensagem FROM posts WHERE post_id='$id'");
	while($row = $query->fetch_object()):
	echo "<h2>".$row->titulo."</h2>";
	echo "<p>".$row->mensagem."</p>";
	endwhile;?>
	<p><hr /></p>
		
		<div id="wrapper">
		<div id="content">
			<form method="post">
			<label>Nome:</label>
			<input type="text" name="nome" />
			<label>Email:</label>
			<input type="text" name="email" />
			<label for="body">Texto:</label>
			<textarea name="comentario" cols=50 rows=10></textarea>
			<input type="hidden" name="post_id" value="<?php echo $id?>"/>
			<br />
			<input type="submit" name="submit" value="Enviar" />
			</form>
		</div>
	</div>
		 <li class='active '><a href='index.php'><span>Voltar para a minha pagina</span></a></li>
			<p><hr /></p>
		<h2>Comentários: </h2>
			</div>
			
			<div id="comentario">
		<?php
				$query= $bd->query("SELECT nome, email, comentario, post_id FROM comentarios WHERE post_id='$id'");
				while($row = $query->fetch_object()):
		?>
		
		<div>
					<h4><?php echo $row->nome?></h4>
					<h3><?php echo $row->email?></h3>
					<h3><?php echo $row->comentario?></h3>
					<hr />
		</div>
			
		<?php endwhile;?>
	</form>
	</div>
</body>
</html>