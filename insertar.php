<?php
include("clases/conect.php");
$tipo = $_POST['tipo'];

$fecha = date("Y-m-d");
$hora = date("H:i:s");

$q   = "INSERT INTO data values ('','$tipo','$fecha','$hora')";
$res = mysql_query($q) or die (mysql_error());

$arrayjson[] = array(
					'tipo'         => $tipo,//
					'hora'         => $hora,//
);

echo json_encode($arrayjson);
?>