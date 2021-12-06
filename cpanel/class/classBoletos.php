<?php
class Boletos extends Conexion{

  public function __construct(){

    parent::__construct();

  }

  public function getBoletos($id_congreso)
  {
    $sql = "SELECT * FROM boletos
    INNER JOIN congresos on boletos.id_congreso = congresos.id_congreso
    WHERE boletos.id_congreso = '$id_congreso' ORDER BY id_boleto DESC";

    $resultado = $this->conexion_db->query($sql);

    $boletos = $resultado->fetch_all(MYSQLI_ASSOC);

    return $boletos;
  }

  public function getBoleto($id_boleto)
  {
    $sql = "SELECT * FROM boletos WHERE id_boleto = '$id_boleto' ";

    $resultado = $this->conexion_db->query($sql);

    $data = $resultado->fetch_all(MYSQLI_ASSOC);

    return $data;

  }

  public function mostrarBoletos($id)
  {
    $sql = "SELECT * FROM boletos
    INNER JOIN congresos on boletos.id_congreso = congresos.id_congreso
    WHERE boletos.id_boleto = '$id' ORDER BY id_boleto DESC";

    $resultado = $this->conexion_db->query($sql);

    $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);

    return $respuesta;

  }


  public function guardarDatosBoletos($nombre, $nombre_ing, $modalidad, $preciomxn, $preciousd, $desde_format, $hasta_format, $hora_inicio, $hora_fin, $descripcion, $descripcion_ing, $congreso)
  {

    $sql = "INSERT INTO boletos VALUES (null, '$nombre', '$nombre_ing', '$modalidad', '$preciomxn', '$preciousd', '$desde_format', '$hasta_format', '$hora_inicio', '$hora_fin', '$descripcion', '$descripcion_ing', '$congreso' )";

    $consulta = $this->conexion_db->query($sql);
    
    return $consulta;

  }

  public function actualizarBoleto($nombre, $nombre_ing, $modalidad, $preciomxn, $preciousd, $desde_format, $hasta_format, $hora_inicio, $hora_fin, $descripcion, $descripcion_ing, $id)
  {

    $sql = "UPDATE boletos SET
            boleto = '$nombre',
            boleto_ing = '$nombre_ing',
            modalidad = '$modalidad',
            precio_mxn = '$preciomxn',
            precio_usd = '$preciousd',
            desde = '$desde_format',
            hasta = '$hasta_format',
            hora_inicio = '$hora_inicio',
            hora_fin = '$hora_fin',
            descripcion = '$descripcion',
            descripcion_ing = '$descripcion_ing'
            WHERE id_boleto = '$id' ";

    $guardar = $this->conexion_db->query($sql);

    return $guardar;

  }

  public function eliminarBoleto($id) 
  {
    $sql = $this->conexion_db->query("DELETE FROM boletos
    WHERE id_boleto = $id ");

    return $sql; 
  }

}
?>