<?php
session_start();
require("db/db.php");
if(isset($_REQUEST['idB'])){
	$id = $_REQUEST['idB'];
}else{
	$id = $_REQUEST['idArt'];
}
$sqlB = "SELECT * FROM tbl_comentario WHERE articulo_comentario = '$id' ORDER BY id_comentario ASC";
$result = mysqli_query($con, $sqlB);
while($row=mysqli_fetch_array($result)){
	$sqlComent = "SELECT*FROM tbl_usuario WHERE id_usuario = $row[usuario_comentario]";
	$usuComent = mysqli_query($con, $sqlComent);
	$datosUsu=mysqli_fetch_array($usuComent);
echo "<div class='comments_content'>";
if(isset($_SESSION['id'])){

	if($_SESSION['id'] == $row['usuario_comentario']){
		echo "<div class='eliminarcoment'>";
		echo "<h4><a href='delete.php?id=" . $row['id_comentario'] . "&idB=".$id."'> Eliminar Comentario </a></h4>";
		echo "</div>";
	}


}
echo "<div class='coment'>";
echo "<h5>" . utf8_encode($datosUsu['usuario']) . "</h1>";
echo "<h6>" . utf8_encode($row['fecha_comentario']) . "</h2></br></br>";
echo "<h3>" . utf8_encode($row['texto_comentario']) . "</h3>";
echo "</div>";
echo "</div>";
echo "<div class='page_content'>";
echo "</div>";
}
mysqli_close($con);

?>