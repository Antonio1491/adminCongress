<?php  session_start();

require('../inc/clases2.php');

$nombre_presentacion = $_FILES['presentacion']['name'];

$tipo_presentacion = $_FILES['presentacion']['type'];

$carpeta_temporal_presentacion = $_FILES['presentacion']['tmp_name'];

$nombre_video = $_FILES['video']['name'];

$tipo_video = $_FILES['video']['type'];

$carpeta_temporal_video = $_FILES['video']['tmp_name'];

$link = $_POST['link'];

$id_usuario = $_SESSION['id_usuario'];

$cargar = new Conferencista();

$resultado = $cargar->cargarDocumentos($nombre_presentacion, $tipo_presentacion,
                                        $carpeta_temporal_presentacion, $nombre_video,
                                        $tipo_video, $carpeta_temporal_video,
                                        $link, $id_usuario);

if ($resultado) {

  $mensaje = header("Location: documentacion.php");

  echo $mensaje;

}

else{

  echo"<script language='JavaScript'>
      alert('Error: Alguno de los formatos no es permitido');
      </script>";
  echo "<script>window.history.go(-1);</script>";

}


//extension videos admitidos: video/mp4, video/x-ms-wmv


 ?>
