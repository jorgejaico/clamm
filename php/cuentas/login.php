<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <meta charset="utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="css/styleLogin.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2"></script>
    <script src="js/login.js"></script>
</head>
<?php
	include("php/conexion/conexion.proc.php");
?>

	

<div id="loginContainer">
                <a href="#" id="loginButton"><span>Login</span></a>
                <div style="clear:both"></div>
                <div id="loginBox">                
                    <form id="loginForm" name="f1" action="php/conexion/login.proc.php" method="get">
                        <fieldset id="body">
                            <fieldset>
                                <label for="email">Correo</label>
                                <input type="text" name="mail" placeholder="Correo" maxlength="50">
                            </fieldset>
                            <fieldset>
                                <label for="password">Password</label>
    							<input type="password" name="pass" class="form-control" placeholder="Contraseña">
                            </fieldset>
                            <button type="submit" name="acce">Entrar</button>
                        </fieldset>
                        <span><a href="#">¿Olvidaste la contraseña?</a></span>
                    </form>
                </div>
            </div>
 

<?php
	if(isset($error)){
		echo "ERROR: " . $error;
		echo "<br/><br/>";
	}
		echo "</div>";
?>				
	</body>
</html>		