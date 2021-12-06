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
$actualizarDatosHoteles = new Hoteles();


$nombre_hotel = $_POST['nombre'];
// $logotipoTmp = $_FILES["logo_empresa"]['tmp_name'];
// $logotipoType = $_FILES["logo_empresa"]['type'];
// $logotipo = $_FILES["logo_empresa"]['name'];
// $logotipoSize = $_FILES["logo_empresa"]['size'];


$ubicacion = $_POST['ubicacion'];
$clave_reserv = $_POST['clave_reserv'];
$numero = $_POST['numero'];
$email = $_POST['email'];
$congreso = $_POST['congreso'];
$id = $_POST['id'];
// $img = $_POST['img'];


// echo $nombre_hotel;
// echo $logotipo;
// echo $ubicacion;
// echo $clave_reserv;
// echo $numero;
// echo $email;
// echo $congreso;
// echo $id;


// $img = $actualizarDatosHoteles -> setImg($logotipo,$logotipoType,$logotipoSize);



$datos = $actualizarDatosHoteles->actualizarDatosHotel($nombre_hotel,$ubicacion,$clave_reserv,$numero,$email,$congreso ,$id);

if($datos)
    {
    //    $actualizarDatosHoteles -> guardarImg($img,$logotipoTmp);
    //    $id_hotel= $actualizarDatosHoteles ->getIdHotel();
        // $habitacion = $actualizarDatosHoteles -> guardarHabitacion($tipoH,$modalidad,$precio);
   
        echo $datos;

    }else {
        echo $datos;
    }





 ?>
