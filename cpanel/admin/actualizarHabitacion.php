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
$actualizarDatosHoteles = new Habitacion();

$tipo = $_POST['tipo'];
$modalidad = $_POST['modalidad'];
$precio = $_POST['precio'];
$id = $_POST['id'];


// echo $tipo;
// echo $modalidad;
// echo $precio;
// echo $id;



$datos = $actualizarDatosHoteles->actualizarDatosHabitacion($tipo,$modalidad,$precio,$id);

if($datos)
    {
    //    $id_hotel= $actualizarDatosHoteles ->getIdHotel();
        // $habitacion = $actualizarDatosHoteles -> guardarHabitacion($tipoH,$modalidad,$precio);

        echo $datos;

    }else {
        echo $datos;
    }

 ?>
