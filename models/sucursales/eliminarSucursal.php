<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Accept, Authorization");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");


include "../conexion.php";

$IdSucursal = $_POST['id_suc'];

$sqlInsert = "DELETE FROM sucursales WHERE id_suc = '$IdSucursales'";
$result = $mysqli->query($sqlInsert);

if ($result){
    echo json_encode(array('success'=>true));
} else {
    echo json_encode("Error".$sqlInsert.$mysqli->error);
}

$mysqli->close();

?>

