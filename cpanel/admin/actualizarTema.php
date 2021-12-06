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

$tema= $_POST['tema'];
$tema_ing= addslashes($_POST['tema_ing']);
$tema_port = addslashes($_POST['tema_port']);
$descripcion = addslashes($_POST['descripcion']);
$descripcion_ing = addslashes($_POST['descripcion_ing']);
$descripcion_port = addslashes($_POST['descripcion_port']);

$icono = $_FILES['icono']['name'];

$actualizar = new Tema();

if ($_FILES['icono']['name'] == "") {
  //Actualizar sin foto nueva
  $actualizarTaller = $actualizar->actualizarSinFoto($tema, $tema_ing, $tema_port,
                  $descripcion, $descripcion_ing, $descripcion_port, $id);

  $mensaje = "<script>window.history.go(-2);</script>";
  echo $mensaje;

}
else{
  $actualizarTaller = $actualizar->actualizar($tema, $tema_ing, $tema_port,
                  $descripcion, $descripcion_ing, $descripcion_port, $icono, $id);

  $extraerNombre = $_FILES['icono']['tmp_name'];
  $destino = "uploads/ejes/".$icono;
  copy($extraerNombre, $destino);

  $mensaje = "<script>window.history.go(-2);</script>";
  echo $mensaje;

}

?>
</html>
