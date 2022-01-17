<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Accept, Authorization");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

include '../conexion.php';

$sqlJoin = "SELECT P.id_cli_per, C.nom_cli, DP.id_ped_per, A.nom_art, DP.cat_ped, P.fec_ped, S.dir_suc
            FROM detalle_ped DP, pedidos P, sucursales S, clientes C, articulos A
            WHERE S.id_suc=P.ped_suc_per AND P.id_cli_per=C.id_cli AND S.id_suc=P.ped_suc_per
            AND P.id_ped=DP.id_ped_per AND DP.id_art=A.id_art";

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