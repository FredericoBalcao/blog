<?php 

include('../config.php'); 
include('mostra_utilizadores.php');

?>

<!DOCTYPE html>
<html>
	
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="./css/estilo_pagina_admin.css" rel="stylesheet" type="text/css">

<title>BLOG ESTGP</title>

<style type="text/css"> 
body  {
	font: 100% Verdana, Arial, Helvetica, sans-serif;
	background: #1065BA;
	margin: 0; 
	padding: 0;
	text-align: center; 
	color: #000000;
	}

.class1 #container { 
	width: 46em;  
	background: #FFFFFF;
	margin: 0 auto;
	border: 1px solid #000000;
	text-align: left; 
	} 
.classe1 #header { 
	background: #DDDDDD; 
	padding: 0 10px;  
	} 
.classe1 #header h1 {
	margin: 0; 
	padding: 10px 0; 
	}

.classe1 #sidebar1 {
	float: left; 
	width: 12em; 
	background: #EBEBEB; 
	padding: 15px 0; 
	}
.classe1 #sidebar1 h3, .classe1 #sidebar1 p {
	margin-left: 10px; 
	margin-right: 10px;
	}
.classe1 #mainContent {
	margin: 0 1.5em 0 13em; 
	background: #EBEBEB;
	} 
.classe1 #footer { 
	padding: 0 10px; 
	background:#DDDDDD;
	} 
.classe1 #footer p {
	margin: 0; 
	padding: 10px 0; 
	}

.fltrt { 
	float: right;
	margin-left: 8px;
	}
.fltlft { 
	float: left;
	margin-right: 8px;
	}
.clearfloat { 
	clear:both;
    height:0;
    font-size: 1px;
    line-height: 0px;
    }

</style>
</head>

<body class="classe1">
<div id="container">
  <div id="header">
  <p align="center"><img src="img.jpg" width="500" height="61" /></p>
    <h1>BLOG ESTGP - ADMINISTRACAO</h1>
    <p>&nbsp;</p>
    </div>
  <div id="sidebar1">
  <p><a href='admin.php'><span>Gestão de Utilizadores</span></a></p>
  <p><a href='index.php'><span>Ver Blog</span></a></p>
    <p><a href='apagar_comentarios.php'><span>Apagar Comentarios</span></a></p>
    <p><a href='apagar_categorias.php'><span>Apagar Categorias</span></a></p>
    <p><a href='apagar_posts.php'><span>Apagar Posts</span></a></p>
     <p><a href='../index.php'><span>Logout</span></a></p>
    <p></p>
 </div>
  <div id="mainContent">
  <h3>Utilizadores Registados </h3>
<h3>
	<?php mostra_utilizadores(); ?></h3>
 </div>
	<br class="clearfloat" />
   <div id="footer">
    <p>Copyright © BLOG, 2012-2013</p>
</div>
</div>
</body>
</html>