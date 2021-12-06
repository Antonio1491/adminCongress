<?php session_start();
$id = $_GET['id'];
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar Taller</title>
  </head>
<?php

$taller= $_POST['taller'];
$taller_ing = addslashes($_POST['taller_ing']);
$taller_port = addslashes($_POST['taller_port']);
$subtitulo = addslashes($_POST['subtitulo']);
$subtitulo_ing = addslashes($_POST['subtitulo_ing']);
$subtitulo_port = addslashes($_POST['subtitulo_port']);
$fecha = $_POST['fecha'];
$inicio = $_POST['inicio'];
$fin = $_POST['fin'];
$capacidad = $_POST['capacidad'];
$tallerista = $_POST['tallerista'];
$tipo = $_POST['tipo'];
$descripcion = addslashes($_POST['descripcion']);
$descripcion_ing = addslashes($_POST['descripcion_ing']);
$descripcion_port = addslashes($_POST['descripcion_port']);

$fotografia = $_FILES['fotografia']['name'];


$actualizar = new Taller();

if ($_FILES['fotografia']['name'] == "") {
  //Actualizar sin foto nueva
  $actualizarTaller = $actualizar->actualizarSinFoto($taller, $taller_ing, $taller_port, $subtitulo, 
                  $subtitulo_ing, $subtitulo_port, $fecha,
                  $inicio, $fin, $capacidad, $tallerista, $tipo,
                  $descripcion, $descripcion_ing, $descripcion_port, $id);

  $mensaje = "<script>window.history.go(-2);</script>";
  echo $mensaje;

}
else{
  $actualizarTaller = $actualizar->actualizar($taller, $taller_ing, $taller_port, $subtitulo, 
                  $subtitulo_ing, $subtitulo_port, $fecha,
                  $inicio, $fin, $capacidad, $tallerista, $tipo,
                  $descripcion, $descripcion_ing, $descripcion_port, $fotografia, $id);

                  $extraerNombre = $_FILES['fotografia']['tmp_name'];
                  $destino= $_SERVER['DOCUMENT_ROOT'].'/congresoparques/img/uploads/leon/talleres/' ;
                  echo move_uploaded_file($extraerNombre,$destino.$fotografia);

  $mensaje = "<script>window.history.go(-2);</script>";
  echo $mensaje;

}

?>
</html>
