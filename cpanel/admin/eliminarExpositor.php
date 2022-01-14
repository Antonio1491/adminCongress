<?php
include('../class/funciones.php');
$id = $_GET['id'];

$eliminar = new Expositor();

$resultado = $eliminar->eliminar($id);

if ($resultado) {

      echo "<script>window.history.go(-1);</script>";
}
else{
  echo  '<script>
  Swal.fire({ title: "Error al eliminar el registro ",
      icon: "warning",customClass: "swal-wide",}).then(okay => {
        if (okay) {
          window.history.go(-1);
      }
    });
    </script>';

}

 ?>