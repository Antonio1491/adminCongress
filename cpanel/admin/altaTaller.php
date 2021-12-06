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
$taller= $_POST['taller'];
$taller_ing= addslashes($_POST['taller_ing']);
$taller_port= addslashes($_POST['taller_port']);
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
$extraerNombre = $_FILES['fotografia']['tmp_name'];
$destino= $_SERVER['DOCUMENT_ROOT'].'/img/uploads/leon/talleres/' ;
// $destino = "uploads/talleres/".$fotografia ;
$evento = $_POST['evento'];

$insertar = new Taller();
$nuevoTaller = $insertar->registrarTaller($taller, $taller_ing, $taller_port, $subtitulo, 
                $subtitulo_ing, $subtitulo_port, $fecha,
                $inicio, $fin, $capacidad, $tallerista, $tipo,
                $descripcion, $descripcion_ing, $descripcion_port, $fotografia, $evento);

    if ($nuevoTaller) {
      move_uploaded_file($extraerNombre,$destino.$fotografia);
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
