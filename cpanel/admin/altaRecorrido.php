<?php session_start();
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Recorrido</title>
  </head>
<?php
$recorrido = $_POST['recorrido'];
$recorrido_ing = addslashes($_POST['recorrido_ing']);
$recorrido_port = addslashes($_POST['recorrido_port']);
$subtitulo = $_POST['subtitulo'];
$subtitulo_ing = addslashes($_POST['subtitulo_ing']);
$subtitulo_port = addslashes($_POST['subtitulo_port']);
$descripcion = addslashes($_POST['descripcion']);
$descripcion_ing = addslashes($_POST['descripcion_ing']);
$descripcion_port = addslashes($_POST['descripcion_port']);
$precio = $_POST['precio'];
$usd = $_POST['precio_dolares'];
$nota = addslashes($_POST['nota']);
$nota_ing = addslashes($_POST['nota_ing']);
$nota_port = addslashes($_POST['nota_port']);
$evento = $_POST['evento'];

// $icono = $_FILES['icono']['name'];
// $extraerNombre = $_FILES['icono']['tmp_name'];
// $destino = "../../img/uploads/".$icono ;

$insertar = new Recorrido();
$nuevoRecorrido = $insertar->registrarRecorrido($recorrido, $recorrido_ing, $recorrido_port,
                    $subtitulo, $subtitulo_ing, $subtitulo_port, $descripcion, $descripcion_ing,
                    $descripcion_port, $precio, $usd, $nota, $nota_ing, $nota_port, $evento);

    if ($nuevoRecorrido) {
      // copy($extraerNombre, $destino);
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
