<?php
class Conferencia extends Conexion{

    public function __construct(){

      parent::__construct();

    }

    public function listaConferencias($evento){
      $sql = "SELECT * FROM conferencias
      WHERE status = 'aceptada'
      AND id_congreso = '$evento'
      ORDER BY id_conferencia DESC";
      $resultado = $this->conexion_db->query($sql);
      $conferencias = $resultado->fetch_all(MYSQLI_ASSOC);
      return $conferencias;
    }

    public function temas(){
      $sql = "SELECT * FROM temas";
      $resultado = $this->conexion_db->query($sql);
      $tipoConferencia = $resultado->fetch_all(MYSQLI_ASSOC);
      return $tipoConferencia;
    }

    public function conferenciaTipo(){
      $sql = "SELECT * FROM tipo_conferencia";
      $resultado = $this->conexion_db->query($sql);
      $tipoConferencia = $resultado->fetch_all(MYSQLI_ASSOC);
      return $tipoConferencia;
    }

    public function mostrarConferencia($id){
      $resultado = $this->conexion_db->query("SELECT a.conferencia,
      a.conferencia_ing, a.conferencia_port, a.id_tema, a.id_tipo, a.descripcion, a.descripcion_ing, a.descripcion_port, a.objetivo1,
      a.objetivo2, a.objetivo3, a.fecha,
      a.inicio, a.fin, a.salon, b.id_tema, b.tema, t.tipo
      FROM conferencias AS a
      LEFT JOIN temas as b ON b.id_tema = a.id_tema
      LEFT JOIN tipo_conferencia as t ON t.id_tipo = a.id_tipo
      WHERE id_conferencia = '$id' AND a.id_congreso = 'CPL2020' ");
      $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);
      return $respuesta;
    }

    public function registrar($conferencia, $conferencia_ing, $conferencia_port, $fecha, $hora, $hora_fin,
                                      $lugar, $tema, $tipo, $descripcion, $descripcion_ing,
                                      $descripcion_port, $objetivo1, $objetivo2, $objetivo3, $evento){
      $sql = "INSERT INTO conferencias VALUES
      (null, '$conferencia', '$conferencia_ing', '$conferencia_port', '$tema', '$tipo', '$descripcion',
      '$descripcion_ing', '$descripcion_port', null, '$objetivo1', '$objetivo2', '$objetivo3', null,
      NULL, NULL, NULL, 'aceptada', '$fecha', '$hora', '$hora_fin', '$lugar', null, '$evento')";
      $resultado = $this->conexion_db->query($sql);
      return $resultado;
    }

    public function actualizar($conferencia, $conferencia_ing, $conferencia_port, $fecha, $hora, $hora_fin,
                                      $lugar, $tema, $tipo, $descripcion, $descripcion_ing, $descripcion_port,
                                      $objetivo1, $objetivo2, $objetivo3, $id){
    $sql = "UPDATE conferencias SET
              conferencia = '$conferencia',
              conferencia_ing = '$conferencia_ing',
              conferencia_port = '$conferencia_port',
              id_tema = '$tema',
              id_tipo = '$tipo',
              descripcion = '$descripcion',
              descripcion_ing = '$descripcion_ing',
              descripcion_port = '$descripcion_port',
              objetivo1 = '$objetivo1',
              objetivo2 = '$objetivo2',
              objetivo3 = '$objetivo3',
              fecha = '$fecha',
              inicio = '$hora',
              fin = '$hora_fin',
              salon = '$lugar'
              WHERE id_conferencia = '$id' ";

      $resultado = $this->conexion_db->query($sql);

      return $resultado;
    }

    public function eliminar($id){
     $sql = $this->conexion_db->query("DELETE FROM conferencias WHERE id_conferencia = $id ");
     return $sql;
    }

  }

 ?>
