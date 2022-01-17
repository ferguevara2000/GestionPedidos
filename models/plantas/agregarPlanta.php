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

$sqlInsert = "INSERT INTO plantas VALUES('$IdPlanta','$NombreP','$DireccionP','$TelefonoP')";

if ($conn->query($sqlInsert) === TRUE)
{
    echo json_encode("Se guardo correctamente");
}else{
    echo json_encode("Error".$sqlInsert.$mysqli->error);
}

$conn->close();

?>
