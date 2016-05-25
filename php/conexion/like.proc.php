<?php
	session_start();
	$likes = 0;
	if(isset($_REQUEST['idB'])){
		$id = $_REQUEST['idB'];
	}else{
		$id = $_REQUEST['idArt'];
	}
	include("conexion.proc.php");
	$sql = "SELECT*FROM tbl_likes WHERE articulo_likes=".$id;
	$sql_datos = mysqli_query($con, $sql);
	while ($datos = mysqli_fetch_array($sql_datos)) {
		if ($datos['articulo_likes']==$id && $datos['usuario_likes']==$_SESSION['id']){
			$likes++;
		}
	}
	if ($likes==0){
		$sql_sumar_like = "INSERT INTO tbl_likes (articulo_likes, usuario_likes) VALUES ('$id', '$_SESSION[id]')";
		$sumar_like = mysqli_query($con, $sql_sumar_like);
		if(isset($_REQUEST['idB'])){
			header("location: ../blogArticulo/blog.php?idB=$id");
		}else{
			header("location: ../blogArticulo/articulo.php?idArt=$id");
		}

	}else{
		$sql_sumar_like = "DELETE FROM tbl_likes WHERE usuario_likes = $_SESSION[id] AND articulo_likes = $id";
		$sumar_like = mysqli_query($con, $sql_sumar_like);
		if(isset($_REQUEST['idB'])){
			header("location: ../blogArticulo/blog.php?idB=$id");
		}else{
			header("location: ../blogArticulo/articulo.php?idArt=$id");
		}
	}
?>