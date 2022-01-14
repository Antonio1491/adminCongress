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
if ($resultado) {
  $mensaje = '
  <script>
Swal.fire({
    icon: "success",
    title: "Agregado con éxito",
    text: "Datos guardados correctamente"
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
</html>
