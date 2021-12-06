<?php session_start();
$id = $_GET['id'];
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar</title>
  </head>
<?php

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$cargo = $_POST['cargo'];
$cargo_ing = addslashes($_POST['cargo_ing']);
$cargo_port = addslashes($_POST['cargo_port']);
$empresa = $_POST['empresa'];
$empresa_ing = addslashes($_POST['empresa_ing']);
$empresa_port = addslashes($_POST['empresa_port']);
$taller = $_POST['taller'];

$biografia = addslashes($_POST['biografia']);
$biografia_ing = addslashes($_POST['biografia_ing']);
$biografia_port = addslashes($_POST['biografia_port']);
$fotografia = $_FILES['fotografia']['name'];

$actualizar = new Tallerista();

if ($_FILES['fotografia']['name'] == "") {
  //Actualizar sin foto nueva
  $actualizarTallerista = $actualizar->actualizarSinFoto($nombre, $apellidos, $cargo, $cargo_ing, $cargo_port, $empresa, $empresa_ing, $empresa_port,
                                   $biografia, $biografia_ing, $biografia_port, $taller, $id);

  $mensaje = "<script>window.history.go(-2);</script>";
  echo $mensaje;

}
else{
  $actualizarTallerista = $actualizar->actualizarTallerista($nombre, $apellidos, $cargo, $cargo_ing, $cargo_port, $empresa, $empresa_ing, $empresa_port,
                                   $biografia, $biografia_ing, $biografia_port, $fotografia, $taller, $id);

  $extraerNombre = $_FILES['fotografia']['tmp_name'];
  $destino= $_SERVER['DOCUMENT_ROOT'].'/img/uploads/leon/talleristas/' ;
  echo move_uploaded_file($extraerNombre,$destino.$fotografia);

  $mensaje = "<script>window.history.go(-2);</script>";
  echo $mensaje;

}


// if ($resultado) {
//
//           $mensaje = "<script>window.history.go(-2);</script>";
//
//           echo $mensaje;
//     }
//     else{
//     echo"<script language='JavaScript'>
//     alert('Error: No pudimos actualizar');
//     </script>";
//     echo "<script>window.history.go(-2);</script>";
//     }

?>
</html>
