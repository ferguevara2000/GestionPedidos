<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Accept, Authorization");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

include "../conexion.php";

$idArt = $_POST['id_art'];
$plaFabArt = $_POST['pla_fab'];

$sqlGetIdPlanta = "SELECT id_pla FROM plantas WHERE nom_pla='$plaFabArt'";
$resp = mysqli_query($conn,$sqlGetIdPlanta);
while ($row = mysqli_fetch_array($resp)) {
    $idPla = $row[0];
}

$sqlDelDetArt = "DELETE FROM art_planta WHERE id_art='$idArt' AND id_pla_per='$idPla'";

$sqlDelArt = "DELETE FROM articulos WHERE id_art='$idArt'";

if ($conn->query($sqlDelDetArt) === TRUE || $conn->query($sqlDelArt) === TRUE)
{
    echo json_encode("Se edito correctamente");
}else{
    echo json_encode("Error".$sqlInsert.$mysqli->error);
}

$conn->close();

?>