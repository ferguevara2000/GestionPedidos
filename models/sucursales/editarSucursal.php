<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Accept, Authorization");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

include '../conexion.php';

$IdSucursal = $_POST['id_suc'];
$DireccionS = $_POST['dir_pla'];
$TelefonoS = $_POST['tel_pla'];
$CiudadS = $_POST['ciu_suc'];
$ClienteS = $_POST['cli_suc_per'];

$sqlInsert = "UPDATE sucursales SET  dir_suc = '$DireccionP', tel_suc = '$TelefonoP',cli_suc_per = '$ClienteS'  WHERE id_suc = '$IdSucursales'";

if ($mysqli->query($sqlInsert) === TRUE)
{
    echo json_encode("Se edito correctamente");
}else{
    echo json_encode("Error".$sqlInsert.$mysqli->error);
}

$mysqli->close();

?>
