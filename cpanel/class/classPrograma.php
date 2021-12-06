<?php
class Programa extends Conexion{

  public function __construct()
  {
    parent::__construct();
  }

  public function programa($congreso)
  {
    $sql = "SELECT * FROM programa WHERE id_congreso = '$congreso' ";

    $resultado = $this->conexion_db->query($sql);

    $programa = $resultado->fetch_all(MYSQLI_ASSOC);

    return json_encode($programa["0"]);
  }

  public function guardarBloque($data)
  {
    $data = json_decode($data);

    $sql = "INSERT INTO programa VALUES (
      null,
      'icono',
      '$data->fecha',
      '$data->inicio',
      '$data->fin',
      '$data->bloque', 
      '$data->bloque_ing', 
      '$data->tipo', 
      '$data->congreso'
      )"; 

    $resultado = $this->conexion_db->query($sql);

    return $resultado;
  }

  public function eliminar($id)
  {
    $sql = $this->conexion_db->query("DELETE FROM eventos_sociales WHERE id_evento = '$id' ");

    return $sql;
  }



  }

 ?>
