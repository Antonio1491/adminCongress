<?php require ("inc/head.php") ?>

<?php
include('../class/funciones.php');

$id = $_GET['id'];

$eliminar = new Hoteles();

$resultado = $eliminar->eliminarHotel($id);

if ($resultado) {

    echo  '<script>
    Swal.fire({ title: "Registro eliminado con exito ",
        icon: "success",customClass: "swal-wide",}).then(okay => {
          if (okay) {
            window.location.href = "hoteles.php";

        }
      });
  
      </script>';

}

else{

    echo  '<script>
    Swal.fire({ title: "Error al eliminar el registro ",
        icon: "warning",customClass: "swal-wide",}).then(okay => {
          if (okay) {
            window.location.href = "hoteles.php";

        }
      });
  
      </script>';
    //   echo "<script>window.history.go(-1);</script>";

}

?>
