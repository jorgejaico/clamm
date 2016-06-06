<?php
	session_start();
	include("../conexion/conexion.proc.php");
	$sql="DELETE FROM `tbl_publicacion` WHERE anuncio_publicacion='$_REQUEST[idanun]'";
	$resultado=mysqli_query($con, $sql);
	$sql2="DELETE FROM `tbl_anuncio` WHERE id_anuncio='$_REQUEST[idanun]'";
	$resultado2=mysqli_query($con, $sql2);
	if ($resultado2) {
		header("location: ../perfil/perfil.php");
	}else{
		echo "Error, se han borrado las publicacionespero no el anuncio";
		echo "</br>";
		echo "<a href='../perfil/perfil.php'>VOLVER</a>";
	}


?>