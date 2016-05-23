<?php
session_start();
require("db/db.php");
$idB = $_REQUEST['idB'];
$sqlB = "SELECT * FROM tbl_comentario WHERE articulo_comentario = '$idB' ORDER BY id_comentario ASC";
$result = mysqli_query($con, $sqlB);
while($row=mysqli_fetch_array($result)){
	$sqlComent = "SELECT*FROM tbl_usuario WHERE id_usuario = $row[usuario_comentario]";
	$usuComent = mysqli_query($con, $sqlComent);
	$datosUsu=mysqli_fetch_array($usuComent);
echo "<div class='comments_content'>";
if(isset($_SESSION['id'])){

	if($_SESSION['id'] == $row['usuario_comentario']){
		echo "<h4><a href='delete.php?id=" . $row['id_comentario'] . "&idB=".$idB."'> X</a></h4>";
	}
}
echo "<h1>" . $datosUsu['usuario'] . "</h1>";
echo "<h2>" . $row['fecha_comentario'] . "</h2></br></br>";
echo "<h3>" . $row['texto_comentario'] . "</h3>";
echo "</div>";
}
mysqli_close($con);

?>