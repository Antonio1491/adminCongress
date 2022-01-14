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
$congresos = $_POST["congreso"];
if(empty($_POST["congreso"])){
  //no hay datos
}
else{

  $nombre = filtrado($_POST['nombre']);
  $apellidos = filtrado($_POST['apellidos']);
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];
  $tipo = $_POST['tipo'];
  $fotografia = $_FILES['fotografia'];
  $congresos = $_POST["congreso"];

  $registrar = new Usuario();
  $guardar = $registrar->agregarUsuario(
    $nombre, 
    $apellidos, 
    $usuario, 
    $password, 
    $tipo, 
    $fotografia, 
    $congresos);

}

  if ($guardar) {
      $mensaje = '
      <script>
Swal.fire({
        icon: "success",
        title: "Registro exitoso",
        text: "Datos almacenados correctamente"
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
                text: "No pudimos procesar la solicitud"
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