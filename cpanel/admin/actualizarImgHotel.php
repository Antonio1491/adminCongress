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


$logotipoTmp = $_FILES["img"]['tmp_name'];
$logotipoType = $_FILES["img"]['type'];
$logotipo = $_FILES["img"]['name'];
$logotipoSize = $_FILES["img"]['size'];
$id = $_POST['id'];


// echo $nombre_hotel;
// echo $logotipo;
// echo $ubicacion;
// echo $clave_reserv;
// echo $numero;
// echo $email;
// echo $congreso;
// echo $id;



 $nombreAnterior = $actualizarDatosHoteles ->consultaNombreImgAnterior($id);

 foreach($nombreAnterior as $nom){

    $nom = $nom['url_img'];

}

 $dirEliminar = $_SERVER['DOCUMENT_ROOT'].'/cpanel/img_hotel/'.$nom;


$img = $actualizarDatosHoteles -> setImg($logotipo,$logotipoType,$logotipoSize);



$datos = $actualizarDatosHoteles->actualizarImgHotel($img,$id);

if($datos)
    {
       $actualizarDatosHoteles -> guardarImg($img,$logotipoTmp);
    //    $id_hotel= $actualizarDatosHoteles ->getIdHotel();
        // $habitacion = $actualizarDatosHoteles -> guardarHabitacion($tipoH,$modalidad,$precio);
        unlink($dirEliminar);

        echo $datos;

    }else {
        echo $datos;
    }





 ?>
