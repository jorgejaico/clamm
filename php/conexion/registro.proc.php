<?php
	include("conexion.proc.php");
	$foto = $_FILES["foto"]["name"];
	$sql = "INSERT INTO tbl_usuario (usuario, nombre_usuario, apellido_usuario, correo_usuario, pass, bio_usuario, img_usuario) VALUES ('$_REQUEST[user]', '$_REQUEST[nombre]', '$_REQUEST[apellidos]', '$_REQUEST[mail]', '$_REQUEST[pass]', '$_REQUEST[desc]', '$foto')";
	$resultado=mysqli_query($con, $sql);
	echo $sql;
	if ($resultado) {
		$carpeta_user="../../usuarios/".$_REQUEST['user'];
		/*$carpeta_img="usuarios/".$_REQUEST['user']."/img";
		$carpeta_obras="usuarios/".$_REQUEST['user']."/obras";*/
		mkdir($carpeta_user, 0700);
		/*mkdir($carpeta_img, 0700);
		mkdir($carpeta_obras, 0700);*/
		move_uploaded_file($_FILES["foto"]["tmp_name"], "../../usuarios/".$_REQUEST['user']."/".$_FILES["foto"]["name"]);
		//header("location: ../../index.php");
	}else{
    	die('Consulta no válida: ' . mysql_error());
    	header("location: ../../index.php");
	}
?>