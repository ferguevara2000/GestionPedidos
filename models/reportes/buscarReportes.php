<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Accept, Authorization");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");


include '../conexion.php';
$cedula = $_POST['cedula'];

$sqlJoin = "SELECT C.id_cli, C.nom_cli, DP.id_ped_per, P.fec_ped, S.dir_suc
        FROM detalle_ped DP, pedidos P, sucursales S, clientes C 
        WHERE S.cli_suc_per = '$cedula' AND S.id_suc=P.ped_suc_per
        AND P.id_ped=DP.id_ped_per";
$resp = $conn->query($sqlJoin);
$result = array();
if ($resp->num_rows > 0) {
    while ($row = $resp->fetch_assoc()) {
        array_push($result, $row);
    }
} else {
    $result = "No hay Reportes";
}
echo json_encode($result);

$conn->close();

?>