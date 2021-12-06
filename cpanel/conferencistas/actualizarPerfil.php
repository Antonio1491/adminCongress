<?php session_start();
  require ("../inc/clases2.php");
  $id = $_GET['id'];

  $nombre = $_POST['nombre'];
  $cargo = $_POST['cargo'];
  $empresa = $_POST['empresa'];
  $biografia = addslashes($_POST['biografia']);

  $actualizar = new ActualizarUsuario();

  $resultado = $actualizar->actualizarPerfil($nombre, $cargo, $empresa, $biografia, $id);

  if ($resultado) {

      $mensaje = "<script>window.history.go(-2);</script>";

      echo $mensaje;

      }

      else{

        echo"<script language='JavaScript'>
              alert('Error: No pudimos actualizar');
              </script>";
        echo "<script>window.history.go(-1);</script>";

      }

 ?>
