<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Accept, Authorization");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

include '../conexion.php';

$Cedula = $_POST['id_cli'];
$Nombre = $_POST['nom_cli'];
$Saldo = $_POST['sal_cli'];
$Credito = $_POST['lim_cre_cli'];
$Descuento = $_POST['des_cli'];

$sqlInsert = "UPDATE clientes SET nom_cli = '$Nombre', sal_cli = '$Saldo', lim_cre_cli = '$Credito', des_cli = '$Descuento'  WHERE id_cli = '$Cedula'";

if ($mysqli->query($sqlInsert) === TRUE)
{
    echo json_encode("Se edito correctamente");
}else{
    echo json_encode("Error".$sqlInsert.$mysqli->error);
}

$mysqli->close();

?>
