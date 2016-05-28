<html>
	<head>
	</head>
	<body>
		<?php
		session_start();
		$user = $_SESSION['id'];
		$portada = $_FILES["portada"]["name"];
		include("../conexion/conexion.proc.php");
		if(!isset($_REQUEST['tipoPost'])){
			$sql = "INSERT INTO tbl_articulo (titulo_articulo, texto_articulo, usuario_articulo, portada_articulo, tipo_articulo) VALUES ('$_REQUEST[tiBlog]', '$_REQUEST[tBlog]', '$user', '$portada', 1)";
			move_uploaded_file($_FILES["portada"]["tmp_name"], "../../usuarios/".$_SESSION['usuario']."/".$_FILES["portada"]["name"]);
		}else{
			$sql = "INSERT INTO tbl_articulo (titulo_articulo, texto_articulo, usuario_articulo, portada_articulo) VALUES ('$_REQUEST[tiBlog]', '$_REQUEST[tBlog]', '$user', '$portada')";
			move_uploaded_file($_FILES["portada"]["tmp_name"], "../../usuarios/".$_SESSION['usuario']."/".$_FILES["portada"]["name"]);
		}
		echo $sql;
		if(isset($_REQUEST['skills'])){
			if($_REQUEST['skills'] != ""){
				$sqlTagBuscar = "SELECT*FROM tbl_tags WHERE nombre_tag='$_REQUEST[skills]'";
				$sqlTagBuscarCon = mysqli_query($con, $sqlTagBuscar);
				if($sqlDatosTag = mysqli_num_rows($sqlTagBuscarCon) == 0){
					$sqlTag = "INSERT INTO tbl_tags (nombre_tag) VALUES ('$_REQUEST[skills]')";
					$tag1 = mysqli_query($con, $sqlTag);
				}
			}
		}
		if(isset($_REQUEST['skills2'])){
			if($_REQUEST['skills2'] != ""){
				$sqlTagBuscar2 = "SELECT*FROM tbl_tags WHERE nombre_tag='$_REQUEST[skills2]'";
				$sqlTagBuscarCon2 = mysqli_query($con, $sqlTagBuscar2);
				if($sqlDatosTag2 = mysqli_num_rows($sqlTagBuscarCon2) == 0){
					$sqlTag2 = "INSERT INTO tbl_tags (nombre_tag) VALUES ('$_REQUEST[skills2]')";
					$tag2 = mysqli_query($con, $sqlTag2);
				}
			}
		}
		if(isset($_REQUEST['skills3'])){
			if($_REQUEST['skills3'] != ""){
				$sqlTagBuscar3 = "SELECT*FROM tbl_tags WHERE nombre_tag='$_REQUEST[skills3]'";
				$sqlTagBuscarCon3 = mysqli_query($con, $sqlTagBuscar3);
				if($sqlDatosTag3 = mysqli_num_rows($sqlTagBuscarCon3) == 0){
					$sqlTag3 = "INSERT INTO tbl_tags (nombre_tag) VALUES ('$_REQUEST[skills3]')";
					$tag3 = mysqli_query($con, $sqlTag3);
				}
			}
		}
		if(isset($_REQUEST['skills4'])){
			if($_REQUEST['skills4'] != ""){
				$sqlTagBuscar4 = "SELECT*FROM tbl_tags WHERE nombre_tag='$_REQUEST[skills4]'";
				echo $sqlTagBuscar4;
				$sqlTagBuscarCon4 = mysqli_query($con, $sqlTagBuscar4);
				if($sqlDatosTag4 = mysqli_num_rows($sqlTagBuscarCon4) == 0){
					$sqlTag4 = "INSERT INTO tbl_tags (nombre_tag) VALUES ('$_REQUEST[skills4]')";
					$tag4 = mysqli_query($con, $sqlTag4);
				}
			}
		}
		$resultado=mysqli_query($con, $sql);

		
$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
$path = "../../usuarios/".$_SESSION['usuario']."/"; // Upload directory
$count = 0;
$sqlBuscar = "SELECT*FROM tbl_articulo WHERE titulo_articulo = '$_REQUEST[tiBlog]' AND usuario_articulo = '$user'";
$sqlBuscarCon = mysqli_query($con, $sqlBuscar);
$sqlDatosBuscar = mysqli_fetch_array($sqlBuscarCon);
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to exeicute all files
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$name is not a valid format";
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files 
	            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name))
	            	$nombreFoto = $name;
	            $sqlInsert = "INSERT INTO tbl_imgarticulo (nombre_imgarticulo, articulo_imgarticulo) VALUES ('$nombreFoto', '$sqlDatosBuscar[id_articulo]')";
	            mysqli_query($con, $sqlInsert);
	            $count++; // Number of successfully uploaded file
	        }
	    }
	}
}
		if(isset($_REQUEST['skills'])){
			$sqlTagBuscars = "SELECT*FROM tbl_tags WHERE nombre_tag='$_REQUEST[skills]'";
			echo $sqlTagBuscars;
			$sqlTagBuscarCons = mysqli_query($con, $sqlTagBuscars);
			$sqlDatosTags = mysqli_fetch_array($sqlTagBuscarCons);
			$sqlTagArt = "INSERT INTO tbl_tagarticulo (tag_tagarticulo, articulo_tagarticulo) VALUES ('$sqlDatosTags[id_tag]', '$sqlDatosBuscar[id_articulo]')";
			mysqli_query($con, $sqlTagArt);
		}
		if(isset($_REQUEST['skills2'])){
			$sqlTagBuscars2 = "SELECT*FROM tbl_tags WHERE nombre_tag='$_REQUEST[skills2]'";
			$sqlTagBuscarCons2 = mysqli_query($con, $sqlTagBuscars2);
			$sqlDatosTags2 = mysqli_fetch_array($sqlTagBuscarCons2);
			$sqlTagArt2 = "INSERT INTO tbl_tagarticulo (tag_tagarticulo, articulo_tagarticulo) VALUES ('$sqlDatosTags2[id_tag]', '$sqlDatosBuscar[id_articulo]')";
			echo $sqlTagArt2;
			mysqli_query($con, $sqlTagArt2);
		}
		if(isset($_REQUEST['skills3'])){
			$sqlTagBuscars3 = "SELECT*FROM tbl_tags WHERE nombre_tag='$_REQUEST[skills3]'";
			$sqlTagBuscarCons3 = mysqli_query($con, $sqlTagBuscars3);
			$sqlDatosTags3 = mysqli_fetch_array($sqlTagBuscarCons3);
			$sqlTagArt3 = "INSERT INTO tbl_tagarticulo (tag_tagarticulo, articulo_tagarticulo) VALUES ('$sqlDatosTags3[id_tag]', '$sqlDatosBuscar[id_articulo]')";
			mysqli_query($con, $sqlTagArt3);
		}
		if(isset($_REQUEST['skills4'])){
			$sqlTagBuscars4 = "SELECT*FROM tbl_tags WHERE nombre_tag='$_REQUEST[skills4]'";
			$sqlTagBuscarCons4 = mysqli_query($con, $sqlTagBuscars4);
			$sqlDatosTags4 = mysqli_fetch_array($sqlTagBuscarCons4);
			$sqlTagArt4 = "INSERT INTO tbl_tagarticulo (tag_tagarticulo, articulo_tagarticulo) VALUES ('$sqlDatosTags4[id_tag]', '$sqlDatosBuscar[id_articulo]')";
			mysqli_query($con, $sqlTagArt4);		
		}
		if(!isset($_REQUEST['tipoPost'])){
			header("location: ../blogArticulo/selectorblogs.php");
		}else{
			header("location: ../blogArticulo/selectorarticulos.php");
		}
		?>
	</body>
</html>