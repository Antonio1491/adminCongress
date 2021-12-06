<?php session_start();
include('../class/funciones.php');

if (isset($_POST["submit"])){

  $expositor = filtrado($_POST['expositor']);
  $web= filtrado($_POST['web']);
  $email= filtrado($_POST['email']);
  $representante= filtrado($_POST['representante']);

  $imagen = $_FILES['imagen']['name'];
  $extraerNombre = $_FILES['imagen']['tmp_name'];
  $destino= '../../img/uploads/expositores/' ;


  $congreso = $_POST['evento'];

  $insertar = new Expositor();
  $nuevoExpositor = $insertar->guardarExpositor($expositor, $representante, $email, $web,
                       $imagen, $congreso);

      if ($nuevoExpositor) {
        $carpeta = "../../img/uploads/expositores";
          if(!is_dir($destino)){
            //crea una carpeta y le asigna todos los permisos
            mkdir($carpeta, 0777) or die ("no se puede crear la carpeta");
          }
          else{
            
          }
          move_uploaded_file($extraerNombre,$destino.$imagen);
          $mensaje = header("Location:". getenv('HTTP_REFERER'));
          echo $mensaje;
        }
      else{
        echo"<script language='JavaScript'>
            alert('Error: No pudimos realizar el registro');
            </script>";
        echo "<script>window.history.go(-1);</script>";
      }

}


 ?>