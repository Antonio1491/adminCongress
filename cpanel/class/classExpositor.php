<?php
class Expositor extends Conexion{

    public function __construct(){

      parent::__construct();

    }
    
    //Este método devuelbe la lista de expositores existentes para el congreso correspondiente
    public function getExpositores($congreso){

      $sql = "SELECT * FROM expositores WHERE id_congreso = '$congreso' ";
      $resultado = $this->conexion_db->query($sql);
      $expositores = $resultado->fetch_all(MYSQLI_ASSOC);

      return $expositores;

    }

    public function getExpositor($id){

      $sql = "SELECT * FROM expositores WHERE id_expositor = '$id' ";
      $resultado = $this->conexion_db->query($sql);
      $expositores = $resultado->fetch_all(MYSQLI_ASSOC);

      return $expositores;

    }

    public function guardarExpositor($expositor, $respresentante, $email, $url, $img, $congreso){

      $sql = "INSERT INTO expositores VALUES (null,'$expositor', '$respresentante',' $email', '$url', '$img', '$congreso')";
      $resultado = $this->conexion_db->query($sql);

      return $resultado;
    }


    public function eliminarFoto($id){
      $sql = "SELECT imagen FROM expositores WHERE id_expositor = '$id' ";
      $consulta = $this->conexion_db->query($sql);
      $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

      foreach ($resultado as $valor){
        unlink($_SERVER['DOCUMENT_ROOT']."/congresoparques/img/uploads/expositores/".$valor["'.$columna.'"]);
      }

    }

  public function actualizarExpositor($expositor, $representante, $email, $url, $img, $id){

      if(empty($img)){
          $sql = $this->conexion_db->query("UPDATE expositores  SET 
             nombre_expositor = '$expositor',
              representante = '$representante',
              email = '$email',
              url = '$url'
              WHERE id_expositor = '$id'
          ");
          return true;
      }
      elseif($img != ""){
           $eliminarFoto = $this->eliminarFoto($id);
          $sql = $this->conexion_db->query("UPDATE expositores  SET 
              nombre_expositor = '$expositor',
              representante = '$representante',
              email = '$email',
              url = '$url',
              imagen = '$img',
              WHERE id_expositor = '$id'
          ");
          return true;
      }
     
      else{
          return false;
      }

  }

  public function eliminar($id){

      $sql = $this->conexion_db->query("DELETE FROM expositores WHERE id_expositor = $id ");
      
      if($sql){
        $this -> eliminarFoto($id);
      }

      return $sql;
  }

}