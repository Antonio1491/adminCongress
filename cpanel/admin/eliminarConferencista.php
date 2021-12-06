<?php
include('../class/funciones.php');

$id = $_GET['id'];

$eliminar = new Conferencistas();

$resultado = $eliminar->eliminar($id);

if ($resultado) {

      $mensaje = header("Location:". getenv('HTTP_REFERER'));

      echo $mensaje;

}

else{

      echo"<script language='JavaScript'>
      alert('No pudimos eliminar el registro');
      </script>";
      echo "<script>window.history.go(-1);</script>";

}

 ?>
