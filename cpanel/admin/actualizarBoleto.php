<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.all.min.js"></script> 
  <link rel="stylesheet" href="../css/foundation/foundation.min.css">
  <title>Document</title>
</head>
<body>
</body>
</html>
<?php session_start();
include('../class/funciones.php');
?>

<?php
$nombre = filtrado($_POST['nombre']);
$nombre_ing = filtrado($_POST['nombre_ing']);
$modalidad = $_POST['modalidad'];
$preciomxn = $_POST['preciomxn'];
$preciousd = $_POST['preciousd'];
$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$hora_inicio = $_POST['hora_inicio'];
$hora_fin = $_POST['hora_fin'];
$descripcion = filtrado($_POST['descripcion']);
$descripcion_ing = filtrado($_POST['descripcion_ing']);
$id_boleto= $_POST['id_boleto'];

$desde_format = date('Y-m-d H:i:s',strtotime($desde));
$hasta_format = date('Y-m-d H:i:s',strtotime($hasta));

$boletos = new boletos();
$actualizar = $boletos->actualizarBoleto($nombre, $nombre_ing, $modalidad, $preciomxn, $preciousd, $desde_format,$hasta_format, $hora_inicio, $hora_fin, $descripcion, $descripcion_ing, $id_boleto);


if($actualizar)
    {
      echo'<script>
      Swal.fire({ title: "Datos guardados con éxito",
          icon: "success",customClass: "swal-wide",}).then(okay => {
            if (okay) {
              window.location.href = "../admin/boletos.php";

          }
        });
  
      </script>';

    }
    else {
        echo '<script>
        Swal.fire({ title: "Error al guardar en la base de datos ",
            icon: "warning",customClass: "swal-wide",}).then(okay => {
              if (okay) {
                window.location.href = "../admin/boletos.php";

            }
          });
      
          </script>';
        }
 ?>

