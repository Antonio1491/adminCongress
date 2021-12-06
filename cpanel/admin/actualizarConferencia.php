<?php session_start();
include('../class/funciones.php');

$id = $_GET['id'];

$conferencia = $_POST['conferencia'];
$conferencia_ing = addslashes($_POST['conferencia_ing']);
$conferencia_port = addslashes($_POST['conferencia_port']);
$fecha = $_POST['fecha'];
$hora = $_POST['inicio'];
$hora_fin = $_POST['fin'];
$lugar = $_POST['lugar'];
$tema = $_POST['tema'];
$tipo = $_POST['tipo'];
$descripcion = addslashes($_POST['descripcion']);
$descripcion_ing = addslashes($_POST['descripcion_ing']);
$descripcion_port = addslashes($_POST['descripcion_port']);
$objetivo1 = addslashes($_POST['objetivo1']);
$objetivo2 = addslashes($_POST['objetivo2']);
$objetivo3 = addslashes($_POST['objetivo3']);
$registro = new Conferencia();

$resultado = $registro->actualizar($conferencia, $conferencia_ing, $conferencia_port, $fecha, $hora, $hora_fin,
                                  $lugar, $tema, $tipo, $descripcion, $descripcion_ing, $descripcion_port,
                                  $objetivo1, $objetivo2, $objetivo3, $id);

  if ($resultado) {

      $mensaje = "<script>window.history.go(-2);</script>";

      echo $mensaje;

      }

      else{

        echo"<script language='JavaScript'>
              alert('Error: No pudimos actualizar');
              </script>";
        echo "<script>window.history.go(-2);</script>";

      }


 ?>
