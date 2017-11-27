<?php

include('../config.php');

$query = $bd->prepare("SELECT post_id, titulo, mensagem, categoria, data, nome FROM posts INNER JOIN categorias ON categorias.categoria_id=posts.categoria_id order by post_id desc");
$query->execute();
$query->bind_result($post_id, $titulo, $mensagem, $categoria, $data, $nome);

?>

<!DOCTYPE html>
<html>
	
<title>BLOG - ESTGP</title>

<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE-9" />
<link href="../css/estilo_index.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id='cssmenu'>
<ul>
    <li><a href='../index.php'><span>Logout</span></a></li>
    <li><a href='mostra_utilizadores.php'<span>Utilizadores do Blog</span></a></li>
    <li><a href='novo_post.php'><span>Criar novo post</span></a></li>
    <li><a href='nova_categoria.php'>Criar uma nova categoria<span></span></a></li>
</ul>
<div id="container">
	<div id="header">
	</div>
	<div id="content">
		<h1>Posts no BLOG: </h1>
	<?php
		while($query->fetch()):
		$lastspace = strpos($mensagem, ' ');
	?>
		<h2>
			<?php echo $titulo ?>
		</h2>
		<p>
			<?php echo substr('', $lastspace)."<p><a href='post.php?id=$post_id'>Ler post </a></p>"?>
		</p>
		<p>Categoria: <?php echo $categoria?>
		<p></p><?php echo $data ?></p>
			<p>Publicado por: <?php echo $nome?></p>
		</p>
		<hr />
		<?php endwhile?>
	</div>
	<div id="footer">
		Copyright © BLOG, 2012-2013
	</div>
</div>
</div>
</body>
</html>