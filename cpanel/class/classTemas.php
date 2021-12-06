<?php
class Tema extends Conexion{

    public function __construct(){

      parent::__construct();

    }

    public function listaTemas(){
      $sql = "SELECT * FROM temas";
      $resultado = $this->conexion_db->query($sql);
      $talleres = $resultado->fetch_all(MYSQLI_ASSOC);
      return $talleres;
    }

    public function temasCongreso($evento){
      $sql = "SELECT * FROM temas_congreso 
      LEFT JOIN temas ON temas_congreso.tema = temas.id_tema 
      WHERE temas_congreso.congreso = '$evento' ";
      $resultado = $this->conexion_db->query($sql);
      $temas = $resultado->fetch_all(MYSQLI_ASSOC);
      return $temas;
    }

    public function registrarTema($tema, $tema_ing, $tema_port,
                    $descripcion, $descripcion_ing, $descripcion_port, $icono){
      $sql = "INSERT INTO temas VALUES
      (null,'$tema', '$tema_ing', '$tema_port', '$descripcion', '$descripcion_ing', '$descripcion_port', '$icono')";
      $resultado = $this->conexion_db->query($sql);
      return $resultado;
    }

    public function mostrarTema($id){
      $resultado = $this->conexion_db->query("SELECT *
      FROM temas
      WHERE id_tema = '$id' ");
      $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);
      return $respuesta;
    }

    public function eliminarFoto($id){
      $sql = "SELECT icono FROM temas WHERE id_tema = $id ";
      $consulta = $this->conexion_db->query($sql);
      $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
      foreach ($resultado as $valor) {
        unlink("uploads/ejes/".$valor['icono']);
      }
    }


    public function actualizar($tema, $tema_ing, $tema_port,
                    $descripcion, $descripcion_ing, $descripcion_port, $icono, $id){

      $eliminarFoto = $this->eliminarFoto($id);

      $sql = "UPDATE temas SET
              tema = '$tema',
              tema_ing = '$tema_ing',
              tema_port = '$tema_port',
              descripcion = '$descripcion',
              descripcion_ing = '$descripcion_ing',
              descripcion_port = '$descripcion_port',
              icono = '$icono'
              WHERE id_tema = '$id'
              ";
      $consultar = $this->conexion_db->query($sql);
    }

    public function actualizarSinFoto($tema, $tema_ing, $tema_port,
                    $descripcion, $descripcion_ing, $descripcion_port, $id){
      $sql = "UPDATE temas SET
      tema = '$tema',
      tema_ing = '$tema_ing',
      tema_port = '$tema_port',
      descripcion = '$descripcion',
      descripcion_ing = '$descripcion_ing',
      descripcion_port = '$descripcion_port'
      WHERE id_tema = '$id'
              ";
      $consultar = $this->conexion_db->query($sql);
    }

    public function eliminar($id){
     $sql = $this->conexion_db->query("DELETE FROM temas_congreso
    WHERE id = '$id' ");
     return $sql;
    }

  }

 ?>
