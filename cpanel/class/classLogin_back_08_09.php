
<?php
// =================  Sistema de login   =========================
class Login extends Conexion{

  public function __construct(){

    parent::__construct();

  }

  public function verificarCampos($us, $pas){

    if ((isset ($us) && $us != '') && (isset ($pas) && $pas != ''))  {

        // echo "tenemos datos" . $us . " - ". $pas;
        $sql = $this->conexion_db->query("SELECT * FROM credenciales
                                    WHERE usuario = '$us'
                                    AND password = '$pas' ");

        $respuesta = $sql->fetch_all(MYSQLI_ASSOC);

        

        if ($respuesta) {
              foreach ($respuesta as $valor){
                $id_usuario = $valor['id_credenciales'];
                $nivel = $valor['tipo'];
                //el nivel es el tipo de usuario: admin, conferencista, comité , etc.
                if (session_status() == PHP_SESSION_NONE) {
                  session_start();
              }
                $usuario = $valor['usuario'];
                $_SESSION['usuario'] = $usuario; // $username coming from the form, such as $_POST['username']

              }
                  if ($nivel == 1) {
                    $mensaje = '<script>
                    Swal.fire({ title: "Bienvenido '.$_SESSION['usuario'].' ",
                        icon: "success",customClass: "swal-wide",}).then(okay => {
                          if (okay) {
                            window.location.href = "../admin/index.php?id='.$id_usuario.'";
                        }
                      });
                  
                      </script>';
                    echo  $mensaje;
                     
                      return $mensaje;
                    }
                    else if($nivel == 3){
                      $mensaje3 = '<script>
                      Swal.fire({ title: "BIENVENIDO ",
                          icon: "success",customClass: "swal-wide",}).then(okay => {
                            if (okay) {
                              window.location.href = "../admin/propuestas_calificar.php?id='.$id_usuario.'";
                          }
                        });
                    
                        </script>';
                      echo  $mensaje3;
                      // $mensaje = header("Location: ../admin/propuestas_calificar.php?id=$id_usuario");
                      return $mensaje3;
                    }
                    else {
                      $mensaje2 = '<script>
                      Swal.fire({ title: "BIENVENIDO ",
                          icon: "success",customClass: "swal-wide",}).then(okay => {
                            if (okay) {
                              window.location.href = "../conferencistas/index.php?id='.$id_usuario.'";
                          }
                        });
                    
                        </script>';
                      echo  $mensaje2;
                      return $mensaje2;

                      // $mensaje = header("Location: ../conferencistas/index.php?id=$id_usuario");
                      // return $mensaje;
                    }
        }
        else {
          $mensaje = '<script>
        Swal.fire({ title: "Usuario o contraseña incorrecto",
            icon: "error",customClass: "swal-wide",}).then(okay => {
              if (okay) {
                window.location.href = "../index.html";

            }
          });
      
          </script>';

        return $mensaje;
        }

      }
      else {
        $mensaje = '<script>
        Swal.fire({ title: "Completa todos los campos ",
            icon: "warning",customClass: "swal-wide",}).then(okay => {
              if (okay) {
                window.location.href = "../index.html";

            }
          });
      
          </script>';

        return $mensaje;
      }
  }


  public function verificaLogin(){
    if (empty($_SESSION['usuario'])) {

      echo '<script>
      Swal.fire({ title: "Ups",
          text: "Introduce correctamente tus credenciales para ver esta seccion",
          icon: "error",customClass: "swal-wide",}).then(okay => {
            if (okay) {
             window.location.href = "../index.html";
           }
         });
    
    </script>';
    exit;
    
    }

    return true;
  }

}
// ==============  Fin sistema de login ================

 ?>
