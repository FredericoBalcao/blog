<?php

include('../config.php');

//função que mostra os utilizadores que fizeram login na pagina_admin.php da pasta administrador
function mostra_utilizadores(){
	global $bd;
	$query_mostra = "SELECT login FROM utilizadores";
	$resultado_mostra = mysqli_query($bd, $query_mostra);
	$login_utilizadores = mysqli_num_rows($resultado_mostra);
	if($login_utilizadores > 0){
		echo '<table width="95" border="0">';
		for($i = 0; $i < $login_utilizadores; $i++){
			$resultado_mostra2 = mysqli_fetch_assoc($resultado_mostra);
			echo "<tr><td><a href=\"perfil.php?login=$resultado_mostra2[login]\">$resultado_mostra2[login]</a></td></tr>";
		}
		echo '</table>';
	}else
	echo '<script language="JavaScript">alert("Nenhum utilizador registado no momento!")</script>';
}

?>

<html>
	<head>
	<div align="center">
		<link href="../css/estilo_index.css" rel="stylesheet" type="text/css">
		<p><img src="img.jpg" width="500" height="61" /></p>
		<h2>BLOG ESTGP - Utilizadores do Blog</h2>
	</div>
	</head>
	<body>
		<div align="center">
    <p>&nbsp;</p>
    <table width="700" border="0">
      <tr>
        <td>Selecione por favor o seu nome de login para ver o seu perfil:</td>
      </tr>
      <tr>
        <td><?php mostra_utilizadores(); ?></td>
      </tr>
    </table>
    <div align="center">
    <ul>
  <br></br><br></br>
  <li><a href='index.php'><span>Voltar para o blog</span></a></li>
</ul>
 </div>
 </div>
</body>
</html>