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
			echo "<tr><td><a href=\"../utilizadores/perfil_utilizador.php?login=$resultado_mostra2[login]\">$resultado_mostra2[login]</a></td></tr>";
		}
		echo '</table>';
	}else
	echo '<script language="JavaScript">alert("Nenhum utilizador registado no momento!")</script>';
}

?>