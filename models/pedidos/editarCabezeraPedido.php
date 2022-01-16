<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Accept, Authorization");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

include '../conexion.php';

$Id = $_POST['id_ped'];
$Fecha = $_POST['fec_ped'];
$Sucursal = $_POST['ped_suc_per'];

$sqlGetIdPlanta = "SELECT id_suc FROM sucursales WHERE id_suc='$Sucursal'";
$resp = mysqli_query($conn,$sqlGetIdPlanta);
while ($row = mysqli_fetch_array($resp)) {
    $idSuc = $row[0];
}

$sqlInsert = "UPDATE pedidos SET fec_ped = '$Fecha', ped_suc_per = '$idSuc'WHERE id_ped = '$Id'";

if ($mysqli->query($sqlInsert) === TRUE)
{
    echo json_encode("Se edito correctamente");
}else{
    echo json_encode("Error".$sqlInsert.$mysqli->error);
}

$mysqli->close();

?>
