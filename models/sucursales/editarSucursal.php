<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Accept, Authorization");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

include '../conexion.php';

$IdSucursal = $_POST['id_suc'];
$DireccionP = $_POST['dir_suc'];
$TelefonoP = $_POST['tel_suc'];
$CiudadS = $_POST['ciu_suc'];

$sqlInsert = "UPDATE sucursales SET  dir_suc = '$DireccionP', tel_suc = '$TelefonoP',ciu_suc = '$CiudadS' WHERE id_suc = '$IdSucursal'";

if ($conn->query($sqlInsert) === TRUE)
{
    echo json_encode("Se edito correctamente");
}else{
    echo json_encode("Error".$sqlInsert.$mysqli->error);
}

$conn->close();

?>
