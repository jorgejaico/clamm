<?php
session_start();
$name = $_SESSION['id'];
$comments = $_REQUEST['comments'];
$idB = $_REQUEST['idB'];

require("db/db.php");

$sqlInsert = "INSERT INTO tbl_comentario(usuario_comentario, texto_comentario, articulo_comentario) VALUES('$name','$comments','$idB')";
echo $sqlInsert;
mysqli_query($con, $sqlInsert);

$result = mysqli_query($con, "SELECT * FROM tbl_comentario ORDER BY id_comentario ASC");
while($row=mysqli_fetch_array($result)){
echo "<div class='comments_content'>";
echo "<h4><a href='delete.php?id=" . $row['id_comentario'] . "'> X</a></h4>";
echo "<h1>" . $row['usuario_comentario'] . "</h1>";
echo "<h2>" . $row['fecha_comentario'] . "</h2></br></br>";
echo "<h3>" . $row['texto_comentario'] . "</h3>";
echo "</div>";
}
mysqli_close($con);
?>