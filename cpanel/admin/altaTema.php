<?php session_start();
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Ejes</title>
  </head>
<?php
$tema= $_POST['tema'];
$tema_ing= addslashes($_POST['tema_ing']);
$tema_port = addslashes($_POST['tema_port']);
$descripcion = addslashes($_POST['descripcion']);
$descripcion_ing = addslashes($_POST['descripcion_ing']);
$descripcion_port = addslashes($_POST['descripcion_port']);

$icono = $_FILES['icono']['name'];
$extraerNombre = $_FILES['icono']['tmp_name'];
$destino = "uploads/ejes/".$icono ;

$insertar = new Tema();
$nuevoTaller = $insertar->registrarTema($tema, $tema_ing, $tema_port,
                $descripcion, $descripcion_ing, $descripcion_port, $icono);

    if ($nuevoTaller) {
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
