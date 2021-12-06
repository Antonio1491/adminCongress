<?php session_start();
require ("../class/funciones.php");

$firma1 = $_POST['usoDeImagen'];
$firma2 = $_POST['distribucionMaterial'];

$agregar_firma = new Conferencistas();

$respuesta = $agregar_firma->firmar($_SESSION['id_usuario'], $firma1, $firma2);

if ($respuesta) {

  $mensaje = header("Location: acuerdos.php");

  echo $mensaje;

}

else{

  echo"<script language='JavaScript'>
        alert('Error: No pudimos actualizar');
        </script>";
  echo "<script>window.history.go(-1);</script>";

}

?>
