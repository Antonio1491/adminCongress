<?php session_start();
$id = $_GET['id'];
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Usuarios</title>
  </head>
<?php

$usuario = $_POST['usuario'];
$password = $_POST['password'];
$prioridad = $_POST['prioridad'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$cargo = $_POST['cargo'];
$cargo_ing = addslashes($_POST['cargo_ing']);
$cargo_port = addslashes($_POST['cargo_port']);
$empresa = $_POST['empresa'];
$empresa_ing = addslashes($_POST['empresa_ing']);
$empresa_port = addslashes($_POST['empresa_port']);
$conferencia = $_POST['conferencia'];
$pais = $_POST['pais'];
$ciudad = $_POST['ciudad'];
$biografia = addslashes($_POST['biografia']);
$biografia_ing = addslashes($_POST['biografia_ing']);
$biografia_port = addslashes($_POST['biografia_port']);
$fotografia = $_FILES['fotografia']['name'];

$actualizar = new Conferencistas();

if ($_FILES['fotografia']['name'] == "") {
  //Actualizar sin foto nueva
  $actualizarConferencista = $actualizar->actualizarSinFoto($usuario, $password, $nombre, $apellidos, $cargo, $cargo_ing, $cargo_port, $empresa, $empresa_ing, $empresa_port,
                                   $biografia, $biografia_ing, $biografia_port, $pais, $ciudad, $conferencia, $id, $prioridad);

  $mensaje = "<script>window.history.go(-2);</script>";
  echo $mensaje;

}
else{
  $actualizarConferencista = $actualizar->actualizarConferencista($usuario, $password, $nombre, $apellidos, $cargo, $cargo_ing, $cargo_port, $empresa, $empresa_ing, $empresa_port,
                                   $biografia, $biografia_ing, $biografia_port, $pais, $ciudad, $fotografia, $conferencia, $id, $prioridad);

  $extraerNombre = $_FILES['fotografia']['tmp_name'];
  $destino= $_SERVER['DOCUMENT_ROOT'].'/img/uploads/leon/conferencistas/' ;
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
