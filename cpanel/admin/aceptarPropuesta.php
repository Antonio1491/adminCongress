<?php session_start();
include('../class/funciones.php');
$propuestas = new Propuesta();

$id_propuesta = $_GET['id'];

$actualizarStatus = $propuestas->aceptarPropuesta($id_propuesta);

echo "<script>window.history.go(-1);</script>";



 ?>
