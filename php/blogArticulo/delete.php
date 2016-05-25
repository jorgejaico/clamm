<?php
require("db/db.php");

if(isset($_REQUEST['id'])){
	$id = $_REQUEST['id'];
	$sqlD = "DELETE FROM tbl_comentario WHERE id_comentario='$id'";
mysqli_query($con, $sqlD);
header("location: ../blogArticulo/blog.php?idB=".$_REQUEST['idB']);
}
mysqli_close($con);
?>