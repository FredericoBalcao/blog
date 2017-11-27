<?php
include('../config.php');

if(isset($_POST['Enviar'])){
	$novaCategoria = $_POST['novaCategoria'];
	if(!empty($novaCategoria)){
		$sql = "INSERT INTO categorias (categoria) VALUES('$novaCategoria')";
		$query = $bd->query($sql);
		if($query){
			echo "Nova categoria adicionada no blog!";
		}else{
			echo "Erro!";
		}
	}else{
		echo "Erro ao adicionar nova categoria, tente novamente!";
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
</head>

<body>
<div id='cssmenu'>
<ul>
<p><img src="img.jpg" width="500" height="61" /></p>
</u>
<div id="categoriaForma">
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<label for="categoria">Adiciona Nova Categoria</label><input type="text" name="novaCategoria"/>
	<input type="submit" name="Enviar" value="Enviar"/>
	</form>				
</div>
 <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<li><a href='index.php'><span>Voltar para a minha pagina</span></a></li>
</body>
</html>