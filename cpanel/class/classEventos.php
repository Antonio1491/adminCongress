<?php
class Evento extends Conexion{

    public function __construct(){

      parent::__construct();

    }

    public function listaEventos($evento){
      $sql = "SELECT * FROM eventos_sociales WHERE id_congreso = '$evento' ";
      $resultado = $this->conexion_db->query($sql);
      $talleres = $resultado->fetch_all(MYSQLI_ASSOC);
      return $talleres;
    }

    public function registrarEvento($evento, $evento_ing, $evento_port, $nombre_evento,
                    $nombre_evento_ing, $nombre_evento_port, $fecha, $hora, $lugar, $lugar_ing, $lugar_port,
                     $descripcion, $descripcion_ing, $descripcion_port, $fotografia, $congreso){
      $sql = "INSERT INTO eventos_sociales VALUES
                  (null, '$evento', '$evento_ing', '$evento_port', '$nombre_evento',
                  '$nombre_evento_ing', '$nombre_evento_port', '$descripcion', '$descripcion_ing',
                  '$descripcion_port','$fecha', '$hora', '$lugar', '$lugar_ing', '$lugar_port',
                   '$fotografia', '$congreso')";
      $resultado = $this->conexion_db->query($sql);
      return $resultado;
    }

    public function mostrarEvento($id){
      $resultado = $this->conexion_db->query("SELECT * FROM eventos_sociales
      WHERE id_evento = '$id' ");
      $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);
      return $respuesta;
    }

    public function eliminarFoto($id){
      $sql = "SELECT fotografia FROM eventos_sociales
              WHERE id_evento = $id ";
      $consulta = $this->conexion_db->query($sql);
      $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
      foreach ($resultado as $valor) {
        unlink("uploads/eventos/".$valor['foto']);
      }
    }

    public function actualizar($evento, $evento_ing, $evento_port, $fecha, $hora_inicio, $hora_fin, $lugar, $lugar_ing, $lugar_port,
                     $descripcion, $descripcion_ing, $descripcion_port, $fotografia, $id){

      $eliminarFoto = $this->eliminarFoto($id);

      $sql = "UPDATE eventos_sociales SET
              evento = '$evento',
              evento_ing = '$evento_ing',
              evento_port = '$evento_port',
              descripcion = '$descripcion',
              descripcion_ing = '$descripcion_ing',
              descripcion_port = '$descripcion_port',
              fecha = '$fecha',
              hora_inicio = '$hora_inicio',
              hora_fin = '$hora_fin',
              lugar = '$lugar',
              lugar_ing = '$lugar_ing',
              lugar_port = '$lugar_port',
              fotografia = '$fotografia'
              WHERE id_evento = '$id'
              ";
      $consultar = $this->conexion_db->query($sql);
    }

    public function actualizarSinFoto($evento, $evento_ing, $evento_port, $fecha, 
              $hora_inicio, $hora_fin, $lugar, $lugar_ing, $lugar_port, $descripcion, 
              $descripcion_ing, $descripcion_port, $id){
      $sql = "UPDATE eventos_sociales SET
              evento = '$evento',
              evento_ing = '$evento_ing',
              evento_port = '$evento_port',
              descripcion = '$descripcion',
              descripcion_ing = '$descripcion_ing',
              descripcion_port = '$descripcion_port',
              fecha = '$fecha',
              hora_inicio = '$hora_inicio',
              hora_fin = '$hora_fin',
              lugar = '$lugar',
              lugar_ing = '$lugar_ing',
              lugar_port = '$lugar_port'
              WHERE id_evento = '$id'
              ";
      $consultar = $this->conexion_db->query($sql);
    }


    public function eliminar($id){
     $sql = $this->conexion_db->query("DELETE FROM eventos_sociales
    WHERE id_evento = $id ");
     return $sql;
    }

  }

 ?>
