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
$insertarDatosBoletos = new Habitacion();

$tipoH = $_POST['tipoH'];
$modalidad = $_POST['modalidad'];
$precio = $_POST['precio'];
$id_hotel =$_POST['id'];



// $img = $insertarDatosBoletos -> setImg($logotipo,$logotipoType,$logotipoSize);



$datos = $insertarDatosBoletos->guardarHabitacion($tipoH,$modalidad,$precio,$id_hotel);

if($datos)
    {
//     //    $insertarDatosBoletos -> guardarImg($img,$logotipoTmp);
//     //    $id_hotel= $insertarDatosBoletos ->getIdHotel();
//     //     $habitacion = $insertarDatosBoletos -> guardarHabitacion($tipoH,$modalidad,$precio);
   
        echo $datos;

    }else {
        echo $datos;
    }
     




 ?>
