<?php
	session_start();
	include("../conexion/conexion.proc.php");
	// Comprueba si se ha introducido una foto.
	if(!empty($_FILES["foto"]["name"])){
		// Update con foto
		$foto = $_FILES["foto"]["name"];
		$sql = "UPDATE tbl_anuncio SET titulo_anuncio='$_REQUEST[titulo]', enlace_anuncio='$_REQUEST[enlace]', texto_anuncio='$_REQUEST[desc]',  imagen_anuncio='$foto' WHERE id_anuncio = $_REQUEST[mdA]";
		
		echo "</br>";
		echo $sql;
		$resultado=mysqli_query($con, $sql);
		if ($resultado) {
		 	$carpeta_user="../../usuarios/".$_SESSION['usuario'];
		 	move_uploaded_file($_FILES["foto"]["tmp_name"], "../../usuarios/".$_SESSION['usuario']."/".$_FILES["foto"]["name"]);
			header("location: ../perfil/perfil.php");
		}else{
	    	die('Consulta no válida: ' . mysql_error());
			header("location: ../perfil/perfil.php");		
		}
	}else{
		// Update sin foto
		$sql = "UPDATE tbl_anuncio SET titulo_anuncio='$_REQUEST[titulo]', enlace_anuncio='$_REQUEST[enlace]', texto_anuncio='$_REQUEST[desc]' WHERE id_anuncio = $_REQUEST[mdA]";
		$resultado=mysqli_query($con, $sql);
		echo $sql;
		if ($resultado) {
			header("location: ../perfil/perfil.php");
		}else{
	    	die('Consulta no válida: ' . mysql_error());
			header("location: ../perfil/perfil.php");		
		}
	}
?>