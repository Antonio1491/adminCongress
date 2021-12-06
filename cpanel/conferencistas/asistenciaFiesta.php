<?php  session_start();

require('../inc/clases2.php');
$asistir = $_POST["asistir"];

$confirmar = new Conferencista();
$respuesta = $confirmar->confirmarFiesta($_SESSION['id_usuario'], $asistir);

if ($respuesta) {
  $mensaje = header("Location: invitaciones.php");
  echo $mensaje;
}
else{
  echo"<script language='JavaScript'>
        alert('Error: No pudimos registrar tu asistencia');
        </script>";
  echo "<script>window.history.go(-1);</script>";
}
?>
