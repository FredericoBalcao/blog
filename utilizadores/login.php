<?php

include('../config.php');

if(@$_POST['entrar'] == 'Entrar'){
	$query = "SELECT * from utilizadores where login = '".$_POST['login']."' and senha = '".$_POST['senha']."'";
	$r_query = mysqli_query($bd, $query) or die("Erro: ".mysqli_error($bd));
	$resultado = mysqli_fetch_assoc($r_query);
	if($resultado['login'] == $_POST['login'] && $resultado['senha'] == $_POST['senha']){
		$_SESSION['admin'] = TRUE;
		header('location: index.php');
	}else{
		echo "Login e Senha invalidos!";
	}
}

?>

<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BLOG ESTGP - Login</title>
<link href="../css/estilo_index.css" rel="stylesheet" type="text/css">
</head>

<body>
<form id="loga" name="loga" method="post" action="login.php">
  <label></label>
  <div align="center">
    <p><img src="img.jpg" width="500" height="61" /></p>
    <p>&nbsp;</p>
    <table width="200" border="0" class = "loginform">
      <tr>
        <td>Login:</td>
        <td><input type="text" name="login" id="login" /></td>
      </tr>
      <tr>
        <td>Senha:</td>
        <td><input type="password" name="senha" id="senha" /></td>
      </tr>
    </table>
    <p>
  <input type="submit" name="entrar" id="entrar" value="Entrar" />
  <br />
<br />
    <a href="registo.php">Criar nova conta de utilizador</a></p>
    <a href="../index.php">Voltar para o blog</a></p>
<p><br />
</p>
  </div>
</form>
</body>
</html>
