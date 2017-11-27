<?php
session_start();
if(@$_SESSION['id']  != TRUE)
header('location: alterar_dados.php');

include('../config.php');

$id = $_GET['id'];
$query = "SELECT * FROM utilizadores WHERE id=$id";
$resultado = mysqli_query($bd, $query);
$n_res = @mysqli_num_rows($resultado);
if($n_res > 0){
	$resultado = mysqli_fetch_assoc($resultado);
	
	if(@$_POST['mudar1'] == 'Alterar'){
		if(empty($_POST['nome']) || empty($_POST['idade']) || empty($_POST['endereco']) || empty($_POST['cidade']) || empty($_POST['distrito']))
		$erro[] = "*Preencha todos os campos de informações pessoais";
		
	if(count(@$erro) == 0){
		$query = "UPDATE utilizadores set nome = '".$_POST['nome']."', idade = '".$_POST['idade']."', endereco = '".$_POST['endereco']."', cidade = '".$_POST['cidade']."', distrito = '".$_POST['distrito']."' where login = '".$resultado['login']."'";
		mysqli_query($bd, $query);
		header('location: admin.php');
	}
}

if(@$_POST['mudar2'] == 'Alterar'){
	if(empty($_POST['senha']) || empty($_POST['conf_senha']))
	$erro[] = "*Preencha os campos de senha.";
	else{
		if($_POST['senha'] != $_POST['conf_senha'])
		$erro[] = "*Senhas nao conferem, sao diferentes.";
		}
		if(!preg_match('/^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/i',$_POST['email']))
		$erro[] = "*Email invalido. Formato de email incorreto.";
		
		if(count(@$erro) == 0){
			$query = "UPDATE utilizadores set senha = '".$_POST['senha']."', email = '".$_POST['email']."' where login = '".$resultado['login']."'";
			mysqli_query($bd, $query);
			header('location: admin.php');
			}
	}

$query = "SELECT * from utilizadores where login = '".$resultado['login']."'";
$resultado = mysqli_query($bd, $query);
$resultado = mysqli_fetch_assoc($resultado);
}
?>

<!DOCTYPE html>
<html>
	
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BLOG ESTGP - Alterar Dados</title>
<link href="../css/styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="74%" border="0">
  <tr>
    <td width="19%" height="31"><p>&nbsp;</p>
      <p>Alterar utilizador: <?php echo $resultado['login'];?></p>
      <p><img src="<?php echo "arquivos/$resultado[imagem]"; ?>" width="150" height="150" /></p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    <table width="95%" cellpadding="0" cellspacing="0" class="forms">
      <tr>
        <td width="37%" scope="col">Nome:</td>
        <td width="63%" scope="col"><?php echo $resultado['nome']; ?></td>
      </tr>
      <tr>
        <td>Idade.:</td>
        <td><?php echo $resultado['idade']; ?></td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><?php echo $resultado['email']; ?></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
    <td colspan="2" rowspan="2"><p align="center">BLOG ESTGP - Alterar Dados</p>
      <p>&nbsp;</p>
      <form id="alterar_dados" name="alterar_dados" method="post" action="alterar_dados.php?id=<?php echo $id ?>">
        <p align="center">
          <?php for($n = 0; $n < count(@$erro); $n++)
          echo '<span class="style4">'.$erro[$n].'</span></br>';
          $erro = array(); 
          ?>
        </p>
        <table width="405" border="0" align="center" class= "forms">
          <tr>
            <td colspan="2"><label><strong>Informações pessoais</strong></label></td>
          </tr>
          <tr>
            <td width="132">Nome:</td>
            <td width="263"><input name="nome" type="text" id="nome" value="<?php echo $resultado['nome']; ?>" maxlength="40" /></td>
          </tr>
          <tr>
            <td>Idade:</td>
            <td><label>
              <input name="idade" type="text" id="idade" value="<?php echo $resultado['idade']; ?>" maxlength="2" />
            </label></td>
          </tr>
          <tr>
            <td>Endereço:</td>
            <td><label>
              <input name="endereco" type="text" id="endereco" value="<?php echo $resultado['endereco']; ?>" maxlength="40" />
            </label></td>
          </tr>
          <tr>
            <td>Cidade:</td>
            <td><label>
              <input name="cidade" type="text" id="cidade" value="<?php echo $resultado['cidade']; ?>" maxlength="20" />
            </label></td>
          </tr>
          <tr>
            <td>Distrito</td>
            <td><label>
              <input name="distrito" type="text" id="distrito" value="<?php echo $resultado['distrito']; ?>" maxlength="20" />
            </label></td>
          </tr>
          <tr>
            <td colspan="2"><p align="center">&nbsp;</p>
            	<p align="center">
                <label>
                <input type="submit" name="mudar1" id="mudar1" value="Alterar" />
                </label>
              </p>
              
            <p><strong>Informações de Login</strong></p></td>
          </tr>
          
          <tr>
            <td>Senha:</td>
            <td><label>
              <input name="senha" type="password" id="senha" maxlength="10" />
            <span class="style4">Máx.10 caracteres</span></label></td>
          </tr>
          <tr>
            <td>Confirmar Senha:</td>
            <td><label>
              <input name="conf_senha" type="password" id="conf_senha" maxlength="10" />
            <span class="style4">Máx.10 caracteres</span></label></td>
          </tr>
          <tr>
            <td>E-mail:</td>
            <td><label>
              <input name="email" type="text" id="email" value="<?php echo $resultado['email']; ?>" maxlength="40" />
            </label></td>
          </tr>
        </table>
        <p align="center">
          <label>
          <input type="submit" name="mudar2" id="mudar2" value="Alterar" />
          </label>
        </p>
      </form>
     
</table>
<a href='pagina_admin.php'><span>Voltar para o menu de administracao</span></a>
</body>
</html>
