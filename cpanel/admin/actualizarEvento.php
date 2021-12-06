<?php session_start();
$id = $_GET['id'];
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar Evento</title>
  </head>
<?php

$evento= addslashes($_POST['evento']);
$evento_ing= addslashes($_POST['evento_ing']);
$evento_port= addslashes($_POST['evento_port']);
$fecha = $_POST['fecha'];
$hora_inicio= $_POST['hora_inicio'];
$hora_fin= $_POST['hora_fin'];
$lugar= addslashes($_POST['lugar']);
$lugar_ing= addslashes($_POST['lugar_ing']);
$lugar_port= addslashes($_POST['lugar_port']);
$descripcion = addslashes($_POST['descripcion']);
$descripcion_ing = addslashes($_POST['descripcion_ing']);
$descripcion_port = addslashes($_POST['descripcion_port']);
$fotografia = $_FILES['fotografia']['name'];
$actualizar = new Evento();

if ($_FILES['fotografia']['name'] == "") {
  //Actualizar sin foto nueva
  $actualizarTaller = $actualizar->actualizarSinFoto($evento, $evento_ing, $evento_port, $fecha, 
                      $hora_inicio, $hora_fin, $lugar, $lugar_ing, $lugar_port, $descripcion, 
                      $descripcion_ing, $descripcion_port, $id);
  $mensaje = "<script>window.history.go(-2);</script>";
  echo $mensaje;
}
else{
  $actualizarTaller = $actualizar->actualizar($evento, $evento_ing, $evento_port, $fecha, $hora_inicio, 
                      $hora_fin, $lugar, $lugar_ing, $lugar_port, $descripcion, $descripcion_ing, 
                      $descripcion_port, $fotografia, $id);

  // $extraerNombre = $_FILES['fotografia']['tmp_name'];
  // $destino = "uploads/eventos/".$fotografia ;
  // copy($extraerNombre, $destino);

  $extraerNombre = $_FILES['fotografia']['tmp_name'];
  $destino= $_SERVER['DOCUMENT_ROOT'].'/img/uploads/leon/eventos/' ;
  echo move_uploaded_file($extraerNombre,$destino.$fotografia);

  $mensaje = "<script>window.history.go(-2);</script>";
  echo $mensaje;

}

?>
</html>
