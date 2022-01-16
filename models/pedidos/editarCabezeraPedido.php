<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Accept, Authorization");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

include '../conexion.php';

$Id = $_POST['id_ped'];
$Fecha = $_POST['fec_ped'];
$Sucursal = $_POST['ped_suc_per'];

$sqlInsert = "UPDATE pedidos SET fec_ped = '$Fecha', ped_suc_per = '$Sucursal'WHERE id_ped = '$Id'";

if ($mysqli->query($sqlInsert) === TRUE)
{
    echo json_encode("Se edito correctamente");
}else{
    echo json_encode("Error".$sqlInsert.$mysqli->error);
}

$mysqli->close();

?>
