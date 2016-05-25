<?php
	session_start();
	include("../conexion/conexion.proc.php");
	// Comprueba si se ha introducido una foto.
	if(!empty($_FILES["foto"]["name"])){
		$foto = $_FILES["foto"]["name"];
		$sql = "UPDATE tbl_usuario SET pass='$_REQUEST[pass]', nombre_usuario='$_REQUEST[nombre]', apellido_usuario='$_REQUEST[apellidos]', bio_usuario='$_REQUEST[desc]', img_usuario='$foto' WHERE id_usuario = $_SESSION[id]";
		echo"foto";
		echo "</br>";
		echo $sql;
		$resultado=mysqli_query($con, $sql);
		if ($resultado) {
		 	$carpeta_user="../../usuarios/".$_REQUEST['user'];
		 	move_uploaded_file($_FILES["foto"]["tmp_name"], "../../usuarios/".$_SESSION['usuario']."/".$_FILES["foto"]["name"]);
			header("location: ../perfil/perfil.php");
		}else{
	    	die('Consulta no válida: ' . mysql_error());
			header("location: ../perfil/perfil.php");		
		}
	}else{
		$sql = "UPDATE tbl_usuario SET pass='$_REQUEST[pass]', nombre_usuario='$_REQUEST[nombre]', apellido_usuario='$_REQUEST[apellidos]', bio_usuario='$_REQUEST[desc]' WHERE id_usuario = $_SESSION[id]";
		$resultado=mysqli_query($con, $sql);
		echo"Nofoto";
		echo "</br>";
		echo $sql;
		if ($resultado) {
			header("location: ../perfil/perfil.php");
		}else{
	    	die('Consulta no válida: ' . mysql_error());
			header("location: ../perfil/perfil.php");		
		}
	}
?>
