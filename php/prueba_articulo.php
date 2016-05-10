<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
		<link rel="stylesheet" href="../css/button.css" >
    </head>
    <body>
    	<?php include ("php/conexion/conexion.proc.php"); 
    	$sql = "SELECT tbl_articulo.*, tbl_tagarticulo.*, tbl_tags.* FROM tbl_articulo INNER JOIN tbl_tagarticulo ON id_articulo=articulo_tagarticulo INNER JOIN tbl_tags ON id_tag=tag_tagarticulo WHERE id_articulo=3";
    	$datos_articulo= mysqli_query($con,$sql);
        $datos_articulo2= mysqli_query($con,$sql);
    	if(mysqli_num_rows($datos_articulo) != 0){
	    	$valor=mysqli_fetch_array($datos_articulo);
	    		echo utf8_encode($valor['titulo_articulo'])."<br/>";
	    		echo utf8_encode($valor['texto_articulo'])."<br/>";
	    		while($valor2=mysqli_fetch_array($datos_articulo2)){
	    			echo "<button class='button'>".$valor2['nombre_tag']."</button>";
	    		}

	    }
    	?>
   	</body>
</html>