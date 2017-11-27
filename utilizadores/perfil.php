<?php

include('../config.php');

$query = "SELECT * FROM utilizadores where login = '".@$_GET['login']."'";
$resultado = mysqli_query($bd, $query);
$n_res = mysqli_num_rows($resultado);
if($n_res == 0){
	$erro[] = "Utilizador nao encontrado";
	echo '<script language="JavaScript">alert("Perfil nao encontrado!")</script>';
	exit();}
	else
	$resultado = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html>
	
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BLOG ESTGP - Perfil do Utilizador Registado</title>
<link href="../css/estilo_admin.css" rel="stylesheet" type="text/css">
</head>

<body>
<p align="center"><img src="img.jpg" width="500" height="61" /></p>
<table width="22%" align="center" class="forms">
  <tr>
    <td colspan="2"><div align="center">
      <p><?php echo $resultado['login']; ?></p>
      <p>&nbsp;</p>
    </div></td>
  </tr>
  <tr>
    <td width="26%">Nome:</td>
    <td width="74%"><?php echo $resultado['nome']; ?></td>
  </tr>
  <tr>
    <td>Idade:</td>
    <td><?php echo $resultado['idade']; ?></td>
  </tr>
  <tr>
    <td>Distrito:</td>
    <td><?php echo $resultado['distrito']; ?></td>
  </tr>
  <tr>
    <td>Cidade:</td>
    <td><?php echo $resultado['cidade']; ?></td>
  </tr>
  <tr>
    <td>Email:</td>
    <td><?php echo $resultado['email']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
		<p><a href='index.php'><span>Voltar para a minha pagina</span></a></p>
  </tr>
</table>
</body>
</html>
