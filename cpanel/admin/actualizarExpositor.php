<?php session_start();
$id = $_GET['id'];
include('../class/funciones.php');

$expositor = filtrado($_POST['expositor']);
$web= filtrado($_POST['web']);
$email= filtrado($_POST['email']);
$representante= filtrado($_POST['representante']);

$imagen = $_FILES['imagen']['name'];
$extraerNombre = $_FILES['imagen']['tmp_name'];
$destino= '../../img/uploads/expositores/' ;

$actualizar = new Expositor();
$modificar = $actualizar->actualizarExpositor($expositor, $representante, $email, $web, $imagen, $id);

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