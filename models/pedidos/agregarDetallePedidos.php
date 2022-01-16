<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Accept, Authorization");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

include '../conexion.php';

$Id = $_POST['id_ped_per'];
$Cantidad = $_POST['cat_ped'];
$Articulo = $_POST['id_art'];

$sqlGetIdPlanta = "SELECT id_art FROM articulos WHERE nom_art='$Articulo'";
$resp = mysqli_query($conn,$sqlGetIdPlanta);
while ($row = mysqli_fetch_array($resp)) {
    $idArt = $row[0];
}

$sqlGetIdPlanta = "SELECT exi_art FROM art_planta WHERE id_art='$idArt'";
$resp = mysqli_query($conn,$sqlGetIdPlanta);
while ($row = mysqli_fetch_array($resp)) {
    $existencia = $row[0];
}

if ($existencia < $Cantidad){
    echo json_encode("La cantidad excede el stock");
}else{
    $sqlResta = "UPDATE art_planta SET exi_art = exi_art - '$Cantidad' WHERE id_art = '$idArt'";

    $sqlInsert = "INSERT INTO detalle_ped VALUES('$Id','$Cantidad','$idArt')";

    if ($mysqli->query($sqlInsert) === TRUE && $mysqli->query($sqlResta) === TRUE)
    {
        echo json_encode("Se guardo correctamente");
    }else{
        echo json_encode("Error".$sqlInsert.$mysqli->error);
    }

    $mysqli->close();
}



?>
