<!DOCTYPE html>
<html lang="en">
<head>
<?php require ("inc/head.php") ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
</head>
<body>
<?php  session_start();
require ("inc/head.php");

include('../class/funciones.php');

$id = $_GET['id'];

$eliminar = new Patrocinador();

$resultado = $eliminar->eliminarPatrocinador($id);

if ($resultado) {

    echo  '<script>
    Swal.fire({ title: "Registro eliminado con éxito ",
        icon: "success",customClass: "swal-wide",}).then(okay => {
          if (okay) {
            window.location.href = "patrocinadores.php";

        }
      });
  
      </script>';

}

else{

    echo  '<script>
    Swal.fire({ title: "Error al guardar en la base de datos ",
        icon: "warning",customClass: "swal-wide",}).then(okay => {
          if (okay) {
            window.location.href = "patrocinadores.php";

        }
      });
  
      </script>';
    //   echo "<script>window.history.go(-1);</script>";

}

 ?>
 </body>
 </html>