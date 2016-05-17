<?php

require("db/db.php");
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