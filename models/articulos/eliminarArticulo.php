<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Accept, Authorization");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

include "../conexion.php";

$idArt = $_POST['id_art'];

$sqlDelDetArt = "DELETE FROM art_planta WHERE id_art='$idArt'";

$sqlDelArt = "DELETE FROM articulos WHERE id_art='$idArt'";

if ($conn->query($sqlDelDetArt) === TRUE && $conn->query($sqlDelArt) === TRUE)
{
    echo json_encode("Se elimino correctamente");
}
$conn->close();

?>