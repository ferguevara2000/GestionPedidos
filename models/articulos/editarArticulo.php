<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Accept, Authorization");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

include '../conexion.php';

$idArt = $_POST['id_art'];
$nomArt = $_POST['nom_art'];
$colArt = $_POST['col_art'];
$pesArt = $_POST['pes_art'];
$capArt = $_POST['cap_art'];
$plaFabArt = $_POST['pla_fab'];
$nivRie = $_POST['niv_rie'];

$sqlGetIdPlanta = "SELECT id_pla FROM plantas WHERE nom_pla='$plaFabArt'";
$resp = mysqli_query($conn,$sqlGetIdPlanta);
while ($row = mysqli_fetch_array($resp)) {
    $idPla = $row[0];
}

$sqlUpdDetArt = "UPDATE art_planta SET exi_art='$capArt',niv_rie_art='$nivRie', col_art='$colArt'
                WHERE id_art='$idArt' AND id_pla_per='$idPla'";

$sqlUpdArt = "UPDATE articulos SET nom_art='$nomArt', pes_art='$pesArt'
                WHERE id_art='$idArt'";

if ($conn->query($sqlUpdDetArt) === TRUE || $conn->query($sqlUpdArt) === TRUE)
{
    echo json_encode("Se edito correctamente");
}else{
    echo json_encode("Error".$sqlInsert.$mysqli->error);
}

$conn->close();
?>