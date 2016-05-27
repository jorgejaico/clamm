<html>
	<head>
	</head>
	<body>
		<?php
		session_start();
		$user = $_SESSION['id'];
		include("../conexion/conexion.proc.php");
		if(isset($_REQUEST['tipoPost'])){
			$sql = "INSERT INTO tbl_articulo (titulo_articulo, texto_articulo, usuario_articulo, portada_articulo, tipo_articulo) VALUES ('$_REQUEST[tiBlog]', '$_REQUEST[tBlog]', '$user', NULL, 1)";

		}else{
			$sql = "INSERT INTO tbl_articulo (titulo_articulo, texto_articulo, usuario_articulo, portada_articulo) VALUES ('$_REQUEST[tiBlog]', '$_REQUEST[tBlog]', '$user', NULL)";

		}
		// echo $sql;
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
		
		if(isset($_REQUEST['tipoPost'])){
			//header("location: ../blogArticulo/selectorblogs.php");
		}else{
			//header("location: ../blogArticulo/selectorarticulos.php");
		}
		?>
	</body>
</html>