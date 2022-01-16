<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Accept, Authorization");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

include '../conexion.php';

$Id = $_POST['id_ped_per'];
$Cantidad = $_POST['cat_ped'];
$Articulo = $_POST['id_art'];

$sqlGetIdPlanta = "SELECT id_art FROM articulos WHERE nom_art='$Articulo'";
$resp = mysqli_query($conn,$sqlGetIdPlanta);
while ($row = mysqli_fetch_array($resp)) {
    $idArt = $row[0];
}

$sqlInsert = "UPDATE detalle_ped SET cat_ped = '$Cantidad', id_art = '$idArt' WHERE id_ped_per = '$Id' AND id_art = $idArt";

if ($mysqli->query($sqlInsert) === TRUE)
{
    echo json_encode("Se edito correctamente");
}else{
    echo json_encode("Error".$sqlInsert.$mysqli->error);
}

$mysqli->close();

?>