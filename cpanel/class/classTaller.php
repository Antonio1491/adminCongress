<?php
class Taller extends Conexion{

    public function __construct(){

      parent::__construct();

    }

    public function listaTalleres($id_congreso){
      $sql = "SELECT * FROM talleres WHERE id_congreso = '$id_congreso' ORDER BY id_taller DESC";
      $resultado = $this->conexion_db->query($sql);
      $talleres = $resultado->fetch_all(MYSQLI_ASSOC);
      return $talleres;
    }
    public function talleristas($id_congreso){
      $sql = "SELECT * FROM talleristas WHERE id_congreso = '$id_congreso' ";
      $resultado = $this->conexion_db->query($sql);
      $talleristas = $resultado->fetch_all(MYSQLI_ASSOC);
      return $talleristas;
    }

    





  //Taller
    public function registrarTaller($taller, $taller_ing, $taller_port, $subtitulo, 
                    $subtitulo_ing, $subtitulo_port, $fecha,
                    $inicio, $fin, $capacidad, $tallerista, $tipo,
                    $descripcion, $descripcion_ing, $descripcion_port, $fotografia, $evento){
      $sql = "INSERT INTO talleres VALUES
      (null, '$taller', '$taller_ing', '$taller_port',  '$subtitulo', 
                    '$subtitulo_ing', '$subtitulo_port','$descripcion', '$descripcion_ing','$descripcion_port',
      '$fecha', '$inicio', '$fin', '$tallerista', '$capacidad', '$tipo', '$fotografia',1 , '$evento')";
      $resultado = $this->conexion_db->query($sql);
      return $resultado;
    }

    public function mostrarTaller($id){
      $resultado = $this->conexion_db->query("SELECT *
      FROM talleres
      WHERE id_taller = '$id' ");
      $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);
      return $respuesta;
    }

    public function eliminarFoto($id){
      $sql = "SELECT foto FROM talleres WHERE id_taller = $id ";
      $consulta = $this->conexion_db->query($sql);
      $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
      foreach ($resultado as $valor) {
        unlink($_SERVER['DOCUMENT_ROOT']."/congresoparques/img/uploads/leon/talleres/".$valor['foto']);
      }
    }

    public function actualizar($taller, $taller_ing, $taller_port, $subtitulo, 
    $subtitulo_ing, $subtitulo_port, $fecha,
                    $inicio, $fin, $capacidad, $tallerista, $tipo,
                    $descripcion, $descripcion_ing, $descripcion_port, $fotografia, $id){

      $eliminarFoto = $this->eliminarFoto($id);

      $sql = "UPDATE talleres SET
              taller = '$taller',
              taller_ing = '$taller_ing',
              taller_port = '$taller_port',
              subtitulo = '$subtitulo',
              subtitulo_ing = '$subtitulo_ing',
              subtitulo_port = '$subtitulo_port',
              descripcion = '$descripcion',
              descripcion_ing = '$descripcion_ing',
              descripcion_port = '$descripcion_port',
              fecha = '$fecha',
              inicio = '$inicio',
              fin = '$fin',
              tallerista = '$tallerista',
              capacidad = '$capacidad',
              tipo = '$tipo',
              foto = '$fotografia'
              WHERE id_taller = '$id'
              ";
      $consultar = $this->conexion_db->query($sql);
    }

    public function actualizarSinFoto($taller, $taller_ing, $taller_port, $subtitulo, 
    $subtitulo_ing, $subtitulo_port, $fecha,
                    $inicio, $fin, $capacidad, $tallerista, $tipo,
                    $descripcion, $descripcion_ing, $descripcion_port, $id){
      $sql = "UPDATE talleres SET
              taller = '$taller',
              taller_ing = '$taller_ing',
              taller_port = '$taller_port',
              subtitulo = '$subtitulo',
              subtitulo_ing = '$subtitulo_ing',
              subtitulo_port = '$subtitulo_port',
              descripcion = '$descripcion',
              descripcion_ing = '$descripcion_ing',
              descripcion_port = '$descripcion_port',
              fecha = '$fecha',
              inicio = '$inicio',
              fin = '$fin',
              tallerista = '$tallerista',
              capacidad = '$capacidad',
              tipo = '$tipo'
              WHERE id_taller = '$id'
              ";
      $consultar = $this->conexion_db->query($sql);
    }


    public function eliminar($id){
     $sql = $this->conexion_db->query("DELETE FROM talleres
    WHERE id_taller = $id ");
     return $sql;
    }

  }

 ?>
