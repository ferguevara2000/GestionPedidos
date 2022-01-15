<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Accept, Authorization");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

include '../conexion.php';

$sqlJoin = "SELECT A.*, P.nom_pla, D.niv_rie_art, D.exi_art, D.col_art
            FROM articulos A, plantas P, art_planta D
            WHERE  A.id_art = D.id_art AND D.id_pla_per = P.id_pla";

$resp = $conn->query($sqlJoin);
$result = array();
if ($resp->num_rows > 0) {
    while ($row = $resp->fetch_assoc()) {
        array_push($result, $row);
    }
} else {
    $result = "No hay Articulos";
}
echo json_encode($result);

$conn->close();
?>