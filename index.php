<?php

include('config.php');

//contagem de posts
$post_count = $bd->query("SELECT * FROM posts");
//contagem de comentarios
$comentario_count = $bd->query("SELECT * FROM comentarios");
//contagem de categorias
$categoria_count = $bd->query("SELECT * FROM categorias");

?>

<!DOCTYPE html>
<html>
<title>BLOG - ESTGP</title>

<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<link href="css/estilo_index.css" rel="stylesheet" type="text/css">
<style>
#conteudo{
	padding: 10px;
	width:800px;
	margin: auto;
	}
#menu{
	height:40px;
	line-height:40px;
	}
#menu ul{
	margin:0;
	padding:0;
	}
#menu ul li{
	display:inline;
	list-sytle:none;
	maring-right:10px;
	font-size:18px;
	}
#menuConteudo{
	clear:both;
	margin-top:5px;
	font-size:20px;
	}
#header{
	height:80px;
	line-height:80px;
	}
#conteudo #header h1{
	font-size: 45px;
	margin: 0;
	}
#footer{

	
}
</style>
</head>

<body>	
<div id='cssmenu'>
<p><img src="img.jpg" width="500" height="61" /></p> 
<ul>
   <li><a href='utilizadores/login.php'>Login<span></span></a></li>
   <li><a href='administrador/login.php'><span>Administracao</span></a></li>
   <li><a href='utilizadores/registo.php'>Registe-se no Blog<span></span></a></li>
   
</ul>
<tr colspan="2"><div align="center">
<div id="container">
	<div id="header">
		<h1>
			BLOG - ESTGP
		</h1>
	</div>
</div>
</div>
</tr>
<td colspan="2"><div align="center">
	<div id="menuConteudo">
		<table>
		<tr>
		<td>Total de Posts no Blog: </td>
		<td><?php echo $post_count->num_rows ?></td>
		</tr>
		<tr>
		<td>Total de Comentarios: </td>
		<td><?php echo $comentario_count->num_rows ?></td>
		</tr>
		<tr>
		<td>Total de Categorias: </td>
		<td><?php echo $categoria_count->num_rows ?></td>
		</tr>
		</table>
		</div>
	<div id="footer"></div>

  <p><img src="estgp.jpg" width="500" height="310" /></p> 

<?php
$dataHora = date("d/m/Y h:i:s");
echo $dataHora;
?>
		<p>Copyright © BLOG, 2012-2013</p>
	</div>
</td>
</body>
</html>