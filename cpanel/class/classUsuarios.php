<?php
class Usuario extends Conexion
{
  public $usuario;
  public $password;
  public $fotografia;
  public $tipo;
  public $nombre;
  public $apellidos;

  public function __construct()
  {
    parent::__construct();
  }

  public function all($idCredencial)
  {

    if($idCredencial != 0 )
    {

      $sql = "SELECT id_congreso
        FROM credencial_congreso AS combinacion
        JOIN credenciales AS cred
        ON combinacion.id_credencial = cred.id_credencial
        WHERE combinacion.id_credencial = '$idCredencial'";
      
      $resultado = $this->conexion_db->query($sql);

      $congresos = $resultado->fetch_all(MYSQLI_ASSOC);
      

    }
    // 0 = usuario root
    else
    {
      $sql = "SELECT * FROM credenciales";

    }

    // $resultado = $this->conexion_db->query($sql);

    // $data = $resultado->fetch_all(MYSQLI_ASSOC);

    // return json_encode($data);

  }

  public function usuariosAsignados($idCongreso)
  {
    $sql = "SELECT * FROM credencial_congreso WHERE id_congreso = '$idCongreso'";

    $resultado = $this->conexion_db->query($sql);

    $data = $resultado->fetch_all(MYSQLI_ASSOC);

    return json_encode($data);
    
  }

  public function tipoUsuario()
  {
    //Despliega los diferentes dipos de usuario que puede dar de alta un administrdor
    $sql = "SELECT * FROM tipo_credenciales WHERE id_tipo != 0 ";

    $resultado = $this->conexion_db->query($sql);

    $data = $resultado->fetch_all(MYSQLI_ASSOC);

    return json_encode($data);
  }

  public function agregarUsuario(
    $nombre, 
    $apellidos, 
    $usuario, 
    $password, 
    $tipo, 
    $fotografia, 
    $congresos)
  {
    
    $password = password_hash($password, PASSWORD_DEFAULT);

    $fotografia = $this->saveFotografia($fotografia);

    $sql = "INSERT INTO credenciales VALUES(
      null, 
      '$nombre', 
      '$apellidos', 
      '$usuario', 
      '$password', 
      '$fotografia',
      '$tipo'
    )";

    $resultado = $this->conexion_db->query($sql);
    $resultado = true;
    
    if($resultado)
    {
      //consultar el id_credencial del nuevo usuario
      $sql ="SELECT id_credencial FROM credenciales ORDER BY id_credencial DESC LIMIT 1";
      $result = $this->conexion_db->query($sql);
      $idCredencial = $result->fetch_all(MYSQLI_ASSOC);
      $id = $idCredencial[0]['id_credencial'];

      foreach($congresos as $key => $value)
      {
        
      $sql = "INSERT INTO credencial_congreso 
              VALUES ('$id', '$value')" ;

      $resultado = $this->conexion_db->query($sql);

      }

      return true;

    }

    else{

      return false;

    }

    
  }

  //Método que válida el formato de una imagen
  public function validarImg($type, $size)
  {
    if(($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png") && ($size < 5000000))
    {
      return true;
    }
    return false;
  }

  public function saveFotografia($img)
  {
    $random=bin2hex(random_bytes(2));  //generar cadena random de 4 caracteres 
    $imgNameFormat = $random."-".mb_strtolower(str_replace(' ', '-', $img["name"]));

    if($this -> validarImg($img["type"], $img["size"]))
    {
      //directorio servidor
      // $dir = $_SERVER['DOCUMENT_ROOT'].'/cpanel/img/';
      //directorio local
      $dir = $_SERVER['DOCUMENT_ROOT'].'/congresos/cpanel/img/';

      if(move_uploaded_file($img["tmp_name"], $dir.$imgNameFormat))
      {
        return $imgNameFormat;
      }

    }
    return false;
  }


  /* Método que identifica los congresos del usuario */
  public function congresosByUsuario($idCredencial)
  {
    $sql = "SELECT * FROM credencial_congreso 
      JOIN congresos 
      ON credencial_congreso.id_congreso = congresos.id_congreso
      WHERE credencial_congreso.id_credencial = '$idCredencial' ";

    $resultado = $this->conexion_db->query($sql);

    $data = $resultado->fetch_all(MYSQLI_ASSOC);

    return json_encode($data);
  }

}


?>