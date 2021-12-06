<?php session_start();
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Bloque</title>
  </head>
<?php
$data = [
"bloque" => addslashes($_POST['bloque']),
"bloque_ing" => addslashes($_POST['bloque_ing']),
"fecha" => $_POST['fecha'],
"inicio" => $_POST['inicio'],
"fin" => $_POST['fin'],
"tipo" => $_POST['tipoBloque'],
"icono" => $_FILES["icono"],
"congreso" => $_POST['evento']
];
// $data = json_encode($data);
// var_dump(json_decode($data));
// die();

$programa = new Programa();
$resultado = $programa->guardarBloque(json_encode($data));
var_dump($resultado);
die();
 ?>
</html>
