<?php

include('../config.php');

if(@$_POST['registrar'] == 'Registrar'){
	if(empty($_POST['nome']) || empty($_POST['idade']) || empty($_POST['endereco']) || empty($_POST['cidade']) || empty($_POST['distrito']))
	$erro[] = "*Preencha todos os campos de informações pessoais.";

	if(empty($_POST['login']) || empty($_POST['senha']) || empty($_POST['conf_senha']))
	$erro[] = "*Preencha os campos de login e senha";
	else{
		$query = "SELECT login FROM utilizadores where login = '".$_POST['login']."'";
		$resultado = mysqli_query($bd, $query) or die(mysqli_error());
		$n_res = mysqli_num_rows($resultado);
		
	if($n_res != 0)
	$erro[] = "*Utilizador ja registado, tente outro.";
	if($_POST['senha'] != $_POST['conf_senha'])
	$erro[] = "*Senhas nao conferem, sao diferentes.";
	
	}

	if(!preg_match('/^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/i',$_POST['email']))
	$erro[] = "*Email invalido. Formato de email incorreto.";
	else{
		$query = "SELECT email FROM utilizadores where email = '".$_POST['email']."'";
		$resultado = mysqli_query($bd, $query) or die(mysqli_error());
		$n_res = mysqli_num_rows($resultado);
		if($n_res != 0)
		$erro[] = "*Email ja registado, tente outro.";}
}

if(@$_POST['registrar'] == 'Registrar' && count(@$erro) == 0){
	if($_POST['registrar'] == 'Registrar'){
		$query = "insert into utilizadores values ('NULL', '".$_POST['nome']."', '".$_POST['idade']."', '".$_POST['endereco']."', '".$_POST['cidade']."', '".$_POST['distrito']."', '".$_POST['login']."', '".$_POST['senha']."', '".$_POST['email']."', 'padrao.jpg')";
		mysqli_query($bd, $query) or die(mysqli_error());
		echo '<script language="JavaScript">alert("Registo efectuado!")</script>';}
		header('location: login.php');
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BLOG ESTGP - REGISTO</title>

</head>

<body>
<p align="center"><img src="img.jpg" width="500" height="61" /></p>
<p align="center">BLOG ESTGP - Registo de Utilizadores</p>
<p align="center">&nbsp;</p>
<link href="../css/estilo_index.css" rel="stylesheet" type="text/css">
<form id="registro" name="registro" method="post" action="registo.php">
  <center>
    <p>
      <?php 
  for($n = 0; $n < count(@$erro); $n++)
  echo '<span class="style3">'.$erro[$n].'</span></br>';
  $erro = array(); 
  ?>
      </p>
    <p>&nbsp;</p>
  </center>
  <table width="405" border="0" align="center" class="forms">
    <tr>
      <td colspan="2">        <label><strong>Informações pessoais</strong></label>       </td>
    </tr>
    <tr>
      <td width="132">Nome:</td>
      <td width="263"><input name="nome" type="text" id="nome" value="<?php echo @$_POST['nome']; ?>" maxlength="40" /></td>
    </tr>
    <tr>
      <td>Idade:</td>
      <td><label>
      <input name="idade" type="text" id="idade" value="<?php echo @$_POST['idade']; ?>" maxlength="2" />
      </label></td>
    </tr>
    <tr>
      <td>Endereço:</td>
      <td><label>
        <input name="endereco" type="text" id="endereco" value="<?php echo @$_POST['endereco']; ?>" maxlength="40" />
      </label></td>
    </tr>
    <tr>
      <td>Cidade:</td>
      <td><label>
        <input name="cidade" type="text" id="cidade" value="<?php echo @$_POST['cidade']; ?>" maxlength="20" />
      </label></td>
    </tr>
    <tr>
      <td>Distrito</td>
      <td><label>
        <input name="distrito" type="text" id="distrito" value="<?php echo @$_POST['distrito']; ?>" maxlength="20" />
      </label></td>
    </tr>
    <tr>
      <td colspan="2"><p>&nbsp;</p>
      <p><strong>Informações de Login</strong></p></td>
    </tr>
    
    <tr>
      <td>Login:</td>
      <td><label>
        <input name="login" type="text" id="login" value="<?php echo @$_POST['login']; ?>" maxlength="10" />
      <span class="style2">Máx.10 caracteres</span></label></td>
    </tr>
        <tr>
      <td>Senha:</td>
      <td><label>
        <input name="senha" type="password" id="senha" maxlength="10" />
        <span class="style2">Máx.10 caracteres</span></label></td>
    </tr>
    <tr>
      <td>Confirmar Senha:</td>
      <td><label>
        <input name="conf_senha" type="password" id="conf_senha" maxlength="10" />
        <span class="style2">Máx.10 caracteres</span></label></td>
    </tr>
        <tr>
      <td>E-mail:</td>
      <td><label>
        <input name="email" type="text" id="email" value="<?php echo @$_POST['email']; ?>" maxlength="40" />
      </label></td>
    </tr>
  </table>
  <p align="center">
    <label>
    <input type="submit" name="registrar" id="registrar" value="Registrar" />
    </label>
  </p>
  <a href='login.php'><span>Voltar para login</span></a>
</form>
</body>
</html>