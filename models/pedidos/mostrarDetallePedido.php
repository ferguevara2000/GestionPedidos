<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Accept, Authorization");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

include '../conexion.php';

$sql = "SELECT * FROM detalle_ped";
$resp = $conn->query($sql);
$result = array();
if ($resp->num_rows > 0) {
    while ($row = $resp->fetch_assoc()) {
        array_push($result, $row);
    }
} else {
    $result = "No hay Detalle";
}
echo json_encode($result);
?>