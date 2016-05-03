

<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<?php
	include("../conexion/conexion.proc.php");
?>

<form name="f1" action="login.proc.php" method="get">
	<input type="text" name="mail" placeholder="Correo" maxlength="50">
    <input type="password" name="pass" class="form-control" placeholder="Contraseña">
	<button type="submit" name="acce">Entrar</button>
</form>
<?php
	if(isset($error)){
		echo "ERROR: " . $error;
		echo "<br/><br/>";
	}
		echo "</div>";
?>				
	</body>
</html>		