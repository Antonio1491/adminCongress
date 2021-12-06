<?php
class Expositor extends Conexion{

    public function __construct(){

      parent::__construct();

    }

    public function expositores($id_congreso){
      $sql = "SELECT * FROM expositores WHERE id_congreso = '$id_congreso' ORDER BY id DESC";
      $resultado = $this->conexion_db->query($sql);
      $expositores = $resultado->fetch_all(MYSQLI_ASSOC);
      return $expositores;
    }
    public function getExpositor($id){
        $sql = "SELECT * FROM expositores WHERE id = '$id'";
        $resultado = $this->conexion_db->query($sql);
        $expositor = $resultado->fetch_all(MYSQLI_ASSOC);
        return $expositor;
      }

    public function registrarExpositor($expositor, $web, $imagen, $congreso){
        $sql = "INSERT INTO expositores VALUES (null, '$expositor', '$web', '$imagen', '$congreso')";
        $resultado = $this->conexion_db->query($sql);
        return $resultado;
    }

    public function eliminarFoto($columna, $id){
        $sql = "SELECT '$columna' FROM expositores WHERE id = $id ";
        $consulta = $this->conexion_db->query($sql);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        foreach ($resultado as $valor) {
          unlink($_SERVER['DOCUMENT_ROOT']."/congresoparques/img/uploads/leon/patrocinadores/".$valor["'.$columna.'"]);
        }
      }

    public function actualizarExpositor($patrocinador, $web, $categoria, $imagen, $imagen_banner, $id){
        if(empty($imagen_banner) && empty($imagen)){
            $sql = $this->conexion_db->query("UPDATE patrocinadores  SET 
                patrocinador = '$patrocinador',
                tipo = '$categoria',
                link = '$web'
                WHERE id = '$id'
            ");
            return true;
        }
        elseif($imagen_banner != "" && $imagen != ""){
            $eliminarFotoBanner = $this->eliminarFoto("imagen_banner", $id);
            $eliminarFotoSeccion = $this->eliminarFoto("imagen", $id);
            $sql = $this->conexion_db->query("UPDATE patrocinadores  SET 
                patrocinador = '$patrocinador',
                tipo = '$categoria',
                imagen_banner = '$imagen_banner',
                imagen = '$imagen',
                link = '$web'
                WHERE id_patrocinador = '$id'
            ");
            return true;
        }
        elseif($imagen_banner != "" && empty($imagen)){
            $eliminarFotoBanner = $this->eliminarFoto("imagen_banner", $id);
            $sql = $this->conexion_db->query("UPDATE patrocinadores  SET 
                patrocinador = '$patrocinador',
                tipo = '$categoria',
                imagen_banner = '$imagen_banner',
                link = '$web'
                WHERE id = '$id'
            ");
            return true;
        }
        elseif(empty($imagen_banner) && $imagen != ""){
            $eliminarFotoSeccion = $this->eliminarFoto("imagen", $id);
            $sql = $this->conexion_db->query("UPDATE patrocinadores  SET 
                patrocinador = '$patrocinador',
                tipo = '$categoria',
                imagen = '$imagen',
                link = '$web'
                WHERE id = '$id'
            ");
            return true;
        }
        else{
            return false;
        }
    }

    public function eliminar($id){
        $sql = $this->conexion_db->query("DELETE FROM patrocinadores WHERE id = $id ");
        return $sql;
    }
}
?>