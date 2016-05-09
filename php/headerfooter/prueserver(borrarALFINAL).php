	<?php
		$index = "index.php";
		echo "<b>$index</b>";
		$url_actual = $_SERVER["REQUEST_URI"];
		echo "<b>$url_actual</b>";
		$resultado = strpos($url_actual, $index);
		if ($resultado !== FALSE){
			echo "hola";

		}else{
			echo "error";
		}
	?>