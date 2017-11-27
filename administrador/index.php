<?php

include('../config.php');

$query = $bd->prepare("SELECT post_id, titulo, mensagem, categoria, data FROM posts INNER JOIN categorias ON categorias.categoria_id=posts.categoria_id order by post_id desc");
$query->execute();
$query->bind_result($post_id, $titulo, $mensagem, $categoria, $data);
?>

<!DOCTYPE html>
<html lang="en">
<title>BLOG - ESTGP</title>

<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE-9" />
<link href="../css/estilo_index.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id='cssmenu'>
<ul>
 <li><a href='pagina_admin.php'<span>Voltar para o menu de administracao</span></a></li>
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
			<?php echo substr('', $lastspace)."<p><a href='../utilizadores/post.php?id=$post_id'>Ler post </a></p>"?>
		</p>
		<?php echo $data ?>
		<p>Categoria: <?php echo $categoria?>
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