<?php
session_start();
include('../class/funciones.php');
$id = $_GET["id"];

if(isset($_POST["submit"])){
    $enlace = $_POST["enlace"];
    $actualizarLink = new Propuesta();
    $actualizar = $actualizarLink->actualizarLink($id, $enlace);
    if ($actualizar) {
        echo "<script language='JavaScript'>
        alert('Guardado con éxito');
        </script>";
        echo "<script>window.history.go(-1);</script>";
    }
    else{
        echo "<script language='JavaScript'>
        alert('Error: No pudimos actualizar');
        </script>";
        echo "<script>window.history.go(-2);</script>";
    }
}
else{
    echo "No se enviarón los datos";
}

?>