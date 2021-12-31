<?php

$servername = "localhost";
$user = "root";
$password = "";
$dbname = "gestionpedidos";

$conn = mysqli_connect($servername,$user,$password,$dbname);
$mysqli = new mysqli($servername,$user,$password,$dbname);

if (!$mysqli)
{
    die("Error en la conexion".mysqli_connect_error());
}

?>
