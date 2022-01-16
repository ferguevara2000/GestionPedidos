<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Accept, Authorization");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

include '../conexion.php';

$Id = $_POST['id_ped_per'];
$Cantidad = $_POST['cat_ped'];
$Articulo = $_POST['id_art'];

$sqlInsert = "UPDATE detalle_ped SET cat_ped = '$Cantidad', id_art = '$Articulo' WHERE id_ped_per = '$Id'";

if ($mysqli->query($sqlInsert) === TRUE)
{
    echo json_encode("Se edito correctamente");
}else{
    echo json_encode("Error".$sqlInsert.$mysqli->error);
}

$mysqli->close();

?>