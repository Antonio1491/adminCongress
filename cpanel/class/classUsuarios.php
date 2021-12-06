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

  public function all()
  {

    $sql = "SELECT cred.nombre, cred.apellido, cred.fotografia, cred.tipo, cat.tipo
      FROM credenciales as cred
      INNER JOIN tipo_credenciales as cat
      ON cred.tipo = cat.id_tipo
      WHERE cred.tipo = '1' OR cred.tipo = '3' ";

    $resultado = $this->conexion_db->query($sql);

    $data = $resultado->fetch_all(MYSQLI_ASSOC);

    return json_encode($data);

  }

  public function tipoUsuario()
  {
    $sql = "SELECT * FROM tipo_credenciales";

    $resultado = $this->conexion_db->query($sql);

    $data = $resultado->fetch_all(MYSQLI_ASSOC);

    return json_encode($data);
  }

}


?>