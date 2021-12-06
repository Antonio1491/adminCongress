<?php session_start();
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Taller</title>
  </head>
<?php
$evento= addslashes($_POST['evento']);
$evento_ing= addslashes($_POST['evento_ing']);
$evento_port= addslashes($_POST['evento_port']);
$nombre_evento= addslashes($_POST['nombre_evento']);
$nombre_evento_ing= addslashes($_POST['nombre_evento_ing']);
$nombre_evento_port= addslashes($_POST['nombre_evento_port']);
$fecha = $_POST['fecha'];
$hora= $_POST['hora'];
$lugar= addslashes($_POST['lugar']);
$lugar_ing= addslashes($_POST['lugar_ing']);
$lugar_port= addslashes($_POST['lugar_port']);
$descripcion = addslashes($_POST['descripcion']);
$descripcion_ing = addslashes($_POST['descripcion_ing']);
$descripcion_port = addslashes($_POST['descripcion_port']);

$fotografia = $_FILES['fotografia']['name'];
$extraerNombre = $_FILES['fotografia']['tmp_name'];
$destino = "uploads/eventos/".$fotografia ;
$congreso = $_POST['congreso'];

$insertar = new Evento();
$nuevoEvento = $insertar->registrarEvento($evento, $evento_ing, $evento_port, $nombre_evento,
                $nombre_evento_ing, $nombre_evento_port, $fecha, $hora, $lugar, $lugar_ing, $lugar_port,
                 $descripcion, $descripcion_ing, $descripcion_port, $fotografia, $congreso);

    if ($nuevoEvento) {
      copy($extraerNombre, $destino);
      $mensaje = header("Location:". getenv('HTTP_REFERER'));
      echo $mensaje;
      }
    else{
      echo"<script language='JavaScript'>
          alert('Error: No pudimos realizar el registro');
          </script>";
      echo "<script>window.history.go(-1);</script>";
    }

 ?>
</html>
