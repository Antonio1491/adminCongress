<?php session_start();
$id = $_GET['id'];
include('../class/funciones.php');

$patrocinador = $_POST['patrocinador'];
$web= $_POST['web'];
$categoria= $_POST['categoria'];

$actualizar = new Patrocinador();

$imagen_banner = $_FILES['imagen_banner']['name'];
$imagen = $_FILES['imagen']['name'];

$modificar = $actualizar->actualizarPatrocinador($patrocinador, $web, $categoria, $imagen, $imagen_banner, $id);

if($modificar){
   echo"<script>window.history.go(-2);</script>";
}
else{
    echo"<script language='JavaScript'>
        alert('Error: No pudimos actualizar el registro');
        </script>";
    echo "<script>window.history.go(-1);</script>";
  }
?>