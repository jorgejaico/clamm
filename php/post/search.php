<?php
$con = mysqli_connect("localhost", "root", "", "bd_clamm");
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $con->query("SELECT * FROM tbl_tags WHERE nombre_tag LIKE '%".$searchTerm."%' ORDER BY nombre_tag ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['nombre_tag'];
}
//return json data
echo json_encode($data);
?>