<?php session_start();
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Talleristas</title>
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
// $prioridad = $_POST['prioridad'];

$evento = $_POST['evento'];

$tallerista = new Tallerista();
$registro = $tallerista->registroTallerista($nombre, $apellidos, $cargo, 
                                            $cargo_ing, $cargo_port, $empresa,
                                            $empresa_ing, $empresa_port, $biografia, 
                                            $biografia_ing, $biografia_port,
                                            $taller, $fotografia, $evento);

    if ($registro) {

      $extraerNombre = $_FILES['fotografia']['tmp_name'];
      $destino= $_SERVER['DOCUMENT_ROOT'].'/img/uploads/leon/talleristas/' ;
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
