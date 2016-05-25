<?php
        $index = "/php/";
        $url_actual = $_SERVER["REQUEST_URI"];
        $resultado = strpos($url_actual, $index);
?>
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2"></script>


<!-- Con este PHP hacemos que cargue el CSS del HEADER segun el lugar donde se encuentre -->
    <?php

        if ($resultado == FALSE){
    ?>
        <link rel="stylesheet" href="css/styleLogin.css" />
        <script src="js/login.js"></script>
    <?php
        }else{
    ?>
        <link rel="stylesheet" href="../../css/styleLogin.css" />
        <script src="../../js/login.js"></script>
    <?php
        }
    ?>

</head>


<?php
    if ($resultado == FALSE){
	   include("php/conexion/conexion.proc.php");
    }else{
       include("../conexion/conexion.proc.php"); 
    }
?>

	

<div id="loginContainer">
                <a href="#" id="loginButton"><span>Login</span></a>
                /
                <a href="php/cuentas/registro.php" id="loginButton"><span>Registrar</span></a>
                <div style="clear:both"></div>
                <div id="loginBox">


                <?php
                    if ($resultado == FALSE){
                ?>
                        <form id="loginForm" name="f1" action="php/conexion/login.proc.php" method="get">
                <?php
                    }else{
                ?>
                        <form id="loginForm" name="f1" action="../conexion/login.proc.php" method="get">   
                <?php
                    }
                ?>               
                    
                    <fieldset id="body">
                            <fieldset>
                                <label for="email">Correo</label>
                                <input class "text" type="text" name="mail" placeholder="Correo" maxlength="50">
                            </fieldset>
                            <fieldset>
                                <label for="password">Password</label>
    							<input type="password" name="pass" class="text" placeholder="Contraseña">
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