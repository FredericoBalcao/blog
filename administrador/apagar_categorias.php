<?php

session_start();
if(@$_SESSION['id'] != TRUE)
	
header('location: index.php');

include('../config.php');

$query = "SELECT * FROM categorias where categoria_id = 1";
$resultado = mysqli_query($bd, $query);
$resultado = @mysqli_fetch_assoc($resultado);

if(@$_POST['ok'] == 'Apagar'){
	$query = "DELETE FROM categorias where categoria_id = '".@$_POST['marca']."'";
	mysqli_query($bd, $query);
}

$query = "SELECT * FROM categorias";
$res = mysqli_query($bd, $query);
$n_res = @mysqli_num_rows($res);


if(@$_POST['ok2'] == 'Apagar todas as categorias'){
	$query = "DELETE FROM categorias WHERE categoria_id";
	mysqli_query($bd, $query);
}
?>

<!DOCTYPE html>
<html>
	
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BLOG ESTGP - Administracao</title>
</head>

<style>
.forms {
	background-color: #E4F8FA;
	font: normal 12px arial,verdana;
	padding: 3px;
	border: 1px solid #CAE4FF;
	}

.loginform {
	font: 16px normal arial;
	background-color: #E4F8FA;
	font: normal 12px arial,verdana;
	padding: 3px;
	border: 1px solid #CAE4FF;
	}

.loginform #txtbox {
	font: bold 16px arial;
	color: #f00;
}
	
</style>

<body>
<table width="100%" border="0">
  <tr>
    <td colspan="3"><div align="center"><img src="img.jpg" width="500" height="61" /></div></td>
  </tr>
  <tr>
    <td width="79%"><p align="center">&nbsp;</p>
      <p align="center">BLOG ESTGP - Administração</p>
      <p>&nbsp;</p>
    <p>&nbsp;</p>
	<p align="center">Apagar Categorias<p>
    <form id="admin" name="admin" method="post" action="apagar_categorias.php">
      <table width="99%" align="center" class="forms">
        <tr>
          <th width="3%" scope="col">Categoria ID</th>
          <th width="10%" scope="col">Categoria</th>
          <th width="6%" scope="col">&nbsp;</th>
        </tr>
        <?php for($n = 0; $n < $n_res; $n++){
        	$resultado = mysqli_fetch_assoc($res);
        	echo'
        <tr>
          <td><center>'.$resultado['categoria_id'].'</center></td>
          <td><center>'.$resultado['categoria'].'</center></td>
          <td><label><center>
            <input type="radio" name="marca" id="marca" value="'.$resultado['categoria_id'].'" /></center>
          </label></td>
        </tr>
        ';}?>
      </table>
      <p align="center">
        <label>
         <input type="submit" name="ok" id="ok" value="Apagar" />
         <br><br><input type="submit" name="ok2" id="ok2" value="Apagar todas categorias" /></br></br>
         <a href='pagina_admin.php'><span>Voltar para o menu de administracao</span></a>
         </label>
      </p>
    <p align="center">&nbsp;</p>
    </form>
    <p>&nbsp;</p>
    <p align="center">&nbsp;</p>
    <p>&nbsp;</p></td>
    <td width="9%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
</body>
</html>