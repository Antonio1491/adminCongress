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

<?php session_start();
include('../class/funciones.php');

$nombre = filtrado($_POST['nombre']);
$lugar = $_POST['lugar'];
$codigo = $_POST['codigo'];
$inicio = $_POST['inicio'];
$hora_inicio = $_POST['hora_inicio'];
$fin = $_POST['fin'];
$hora_fin = $_POST['hora_fin'];
$modalidad = $_POST['modalidad'];
$recinto = filtrado($_POST['recinto']);
$idioma = $_POST['idioma'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$youtube = $_POST['youtube'];
$twitter = $_POST['twitter'];
$descripcion = filtrado($_POST['descripcion']);
$descripcion_ing = filtrado($_POST['descripcion_ing']);

$logotipo = $_FILES["logotipo"];

$registrar = new Congreso();
$guardar = $registrar->agregar($nombre, $lugar, $codigo, $inicio, $hora_inicio, $fin, $hora_fin, $modalidad, $recinto, $idioma, $email, $telefono, $facebook, $instagram, $youtube, $twitter, $descripcion, $descripcion_ing, $logotipo);

  if ($guardar) {
      $mensaje = '
      <script>
Swal.fire({
        icon: "success",
        title: "Congreso agregado con éxito",
        text: "Se agrego con éxito el registro"
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
                text: "No pudimos crear el evento"
              }).then((result) => {
                if (result.isConfirmed) {
                  window.history.go(-1);
                }
              })
        
        </script>';
      }
 ?>

</body>
</html>