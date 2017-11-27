<?php

session_start();
if(@$_SESSION['id'] != TRUE )
	
header('location: index.php');

include('../config.php');

$query = "SELECT * FROM utilizadores where id = 1";
$resultado = mysqli_query($bd, $query);
$resultado = @mysqli_fetch_assoc($resultado);

if(@$_POST['ok'] == 'Ok'){
	switch($_POST['acao']){
		case 'Apagar':
		$query = "DELETE FROM utilizadores where id = '".$_POST['marca']."'";
		mysqli_query($bd, $query);
		break;
		case 'Editar':
		header("location: alterar_dados.php?id=$_POST[marca]");
		break;
	}
}

$query = "SELECT * FROM utilizadores";
$res = mysqli_query($bd, $query);
$n_res = @mysqli_num_rows($res);

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
	<p align="center">Bem-Vindo<p>
    <form id="admin" name="admin" method="post" action="admin.php">
      <table width="99%" align="center" class="forms">
        <tr>
          <th width="3%" scope="col">ID</th>
          <th width="10%" scope="col">Nome</th>
          <th width="9%" scope="col">Idade</th>
          <th width="19%" scope="col">Endereço</th>
          <th width="9%" scope="col">Cidade</th>
          <th width="10%" scope="col">Distrito</th>
          <th width="9%" scope="col">Login</th>
          <th width="10%" scope="col">Senha</th>
          <th width="15%" scope="col">Email</th>
          <th width="6%" scope="col">&nbsp;</th>
        </tr>
        <?php 
		for($n = 0; $n < $n_res; $n++){
			$resultado = mysqli_fetch_assoc($res);
			echo'
        <tr>
          <td><center>'.$resultado['id'].'</center></td>
          <td><center>'.$resultado['nome'].'</center></td>
          <td><center>'.$resultado['idade'].'</center></td>
          <td><center>'.$resultado['endereco'].'</center></td>
          <td><center>'.$resultado['cidade'].'</center></td>
          <td><center>'.$resultado['distrito'].'</center></td>
          <td><center>'.$resultado['login'].'</center></td>
          <td><center>'.$resultado['senha'].'</center></td>
          <td><center>'.$resultado['email'].'</center></td>
          <td><label><center>
            <input type="radio" name="marca" id="marca" value="'.$resultado['id'].'" /></center>
          </label></td>
        </tr>
        ';}?>
      </table>
      <p align="center">
        <label>
        <select name="acao" id="acao" >
          <option value="Editar">Editar</option>
          <option value="Apagar">Apagar</option>
        </select>
        </label>
        <label>
         <input type="submit" name="ok" id="ok" value="Ok" />
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