<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Accept, Authorization");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

include '../conexion.php';

$IdPlanta = $_POST['id_pla'];
$NombreP = $_POST['nom_pla'];
$DireccionP = $_POST['dir_pla'];
$TelefonoP = $_POST['tel_pla'];

$sqlInsert = "UPDATE plamtas SET nom_pla = '$NombreP', dir_pla = '$DireccionP', tel_pla = '$TelefonoP'  WHERE id_pla = '$IdPlanta'";

if ($mysqli->query($sqlInsert) === TRUE)
{
    echo json_encode("Se edito correctamente");
}else{
    echo json_encode("Error".$sqlInsert.$mysqli->error);
}

$mysqli->close();

?>
