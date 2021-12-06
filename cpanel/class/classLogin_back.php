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
              }
                  if ($nivel == 1) {
                      $mensaje = header("Location: ../admin/index.php?id=$id_usuario");
                      return $mensaje;
                    }
                    else if($nivel == 3){
                      $mensaje = header("Location: ../admin/propuestas_calificar.php?id=$id_usuario");
                      return $mensaje;
                    }
                    else {
                      $mensaje = header("Location: ../conferencistas/index.php?id=$id_usuario");
                      return $mensaje;
                    }
        }
        else {
          $mensaje = "Usuario o contraseña incorrectos";
          return $mensaje;
        }

      }
      else {
        $mensaje = "Completa los datos faltantes";

        return $mensaje;
      }
  }
  

}
// ==============  Fin sistema de login ================

 ?>
