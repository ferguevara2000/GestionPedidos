<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Accept, Authorization");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

include '../conexion.php';

$Id = $_POST['id_ped_per'];
$Cantidad = $_POST['cat_ped'];
$Articulo = $_POST['id_art'];

$sqlInsert = "INSERT INTO detalle_ped VALUES('$Id','$Cantidad','$Articulo')";

if ($mysqli->query($sqlInsert) === TRUE)
{
    echo json_encode("Se guardo correctamente");
}else{
    echo json_encode("Error".$sqlInsert.$mysqli->error);
}

$mysqli->close();

?>
