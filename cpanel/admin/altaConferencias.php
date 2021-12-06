<?php session_start();
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Recorrido</title>
  </head>
<?php
$conferencia = filtrado($_POST['conferencia']);
$conferencia_ing = filtrado($_POST['conferencia_ing']);
$conferencia_port = filtrado($_POST['conferencia_port']);
$fecha = $_POST['fecha'];
$hora = $_POST['inicio'];
$hora_fin = $_POST['fin'];
$lugar = $_POST['lugar'];
$tema = $_POST['tema'];
$tipo = $_POST['tipo'];
$descripcion = filtrado($_POST['descripcion']);
$descripcion_ing = filtrado($_POST['descripcion_ing']);
$descripcion_port = filtrado($_POST['descripcion_port']);
$objetivo1 = filtrado($_POST['objetivo1']);
$objetivo2 = filtrado($_POST['objetivo2']);
$objetivo3 = filtrado($_POST['objetivo3']);
$evento = $_POST['evento'];

// function filtrado($datos){
//   $datos = trim($datos); // Elimina espacios antes y después de los datos
//   $datos = stripslashes($datos); // Elimina backslashes \
//   $datos = addslashes($datos); // Inserta un \ para los apostrofes del texto (textos en inglés)
//   $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
//   return $datos;
// }
$registro = new Conferencia();

$resultado = $registro->registrar($conferencia, $conferencia_ing, $conferencia_port, $fecha, $hora, $hora_fin,
                                  $lugar, $tema, $tipo, $descripcion, $descripcion_ing,
                                  $descripcion_port, $objetivo1, $objetivo2, $objetivo3, $evento);

// var_dump($resultado);
// die();
if ($resultado) {

  $mensaje = header("Location:". getenv('HTTP_REFERER'));

  echo $mensaje;

  }
else{
  echo"<script language='JavaScript'>
      alert('Error: No pudimos realizar el registro');
      </script>";
  echo "<script>window.history.go(-1);</script>";
}


// $sql = "INSERT INTO conferencias VALUES (null, '$conferencia', '$fecha', '$hora', '$hora_fin', '$lugar',
//   '$descripcion', '$tema' )";
// $conexion->insertarDatos($sql);

 ?>
</html>