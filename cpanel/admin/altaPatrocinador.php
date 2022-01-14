<!DOCTYPE html>
<html lang="en">
<head>
<?php require ("inc/head.php") ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alta Patrocinador</title>
  <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
</head>
<body>
<?php session_start();
include('../class/funciones.php');

if (isset($_POST["patrocinador"])){

  $patrocinador = filtrado($_POST['patrocinador']);
  $web= filtrado($_POST['web']);
  $categoria= filtrado($_POST['categoria']);

  $imgBanner = $_FILES["imagenBanner"];
  $imgSeccion = $_FILES["imagenSeccion"];

  $congreso = $_POST['evento'];
  $guardar = new Patrocinador();
  
  $nuevoPatrocinador = $guardar->registrarPatrocinador($patrocinador, $web, $categoria,
                      $imgBanner, $imgSeccion, $congreso);

    if ($nuevoPatrocinador) {
      $mensaje = '
      <script>
      Swal.fire({
        icon: "success",
        title: "Datos Guardados",
        text: ""
      }).then((result) => {
        if (result.isConfirmed) {
          window.history.go(-1);
        }
      })

    </script>
      
      ';
      echo $mensaje;
      }
      else{
        echo'<script>
        Swal.fire({
                icon: "error",
                title: "Error",
                text: "No pudimos guardar los datos"
              }).then((result) => {
                if (result.isConfirmed) {
                  window.history.go(-1);
                }
              })
        
        </script>';
      }
  

}


 ?>