<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Accept, Authorization");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

include '../conexion.php';

$IdSucursal = $_POST['id_suc'];
$DireccionS = $_POST['dir_suc'];
$TelefonoS = $_POST['tel_suc'];
$CiudadS = $_POST['ciu_suc'];


$sqlInsert = "INSERT INTO sucursales VALUES('$IdSucursal','$DireccionS','$TelefonoS','$CiudadS')";

if ($mysqli->query($sqlInsert) === TRUE)
{
    echo json_encode("Se guardo correctamente");
}else{
    echo json_encode("Error".$sqlInsert.$mysqli->error);
}

$mysqli->close();

?>
