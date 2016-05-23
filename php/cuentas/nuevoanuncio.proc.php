<?php
	session_start();
	include("conexion.proc.php");
	$foto = $_FILES["foto"]["name"];
	$sql = "INSERT INTO tbl_anuncio (titulo_anuncio, texto_anuncio, usuario_anuncio, enlace_anuncio, imagen_anuncio) VALUES ('$_REQUEST[titulo]', '$_REQUEST[desc]', $_SESSION[id], '$_REQUEST[enlace]', '$foto')";
	$resultado=mysqli_query($con, $sql);
	// echo $sql;
	 if ($resultado) {
	 	$carpeta_user="../../usuarios/".$_REQUEST['user'];
	 	move_uploaded_file($_FILES["foto"]["tmp_name"], "../../usuarios/".$_SESSION['usuario']."/".$_FILES["foto"]["name"]);
		header("location: ../../publicaranuncio.php");
	}else{
    	die('Consulta no válida: ' . mysql_error());
    	header("location: ../../formularioanuncio.php");
	}
?>