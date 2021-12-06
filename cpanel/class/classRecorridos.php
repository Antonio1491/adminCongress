<?php
class Recorrido extends Conexion{

    public function __construct(){

      parent::__construct();

    }

    public function listaRecorridos(){
      $sql = "SELECT * FROM recorridos_turisticos";
      $resultado = $this->conexion_db->query($sql);
      $talleres = $resultado->fetch_all(MYSQLI_ASSOC);
      return $talleres;
    }

    public function registrarRecorrido($recorrido, $recorrido_ing, $recorrido_port,
                        $subtitulo, $subtitulo_ing, $subtitulo_port, $descripcion, $descripcion_ing,
                        $descripcion_port, $precio, $usd, $nota, $nota_ing, $nota_port, $evento){
      $sql = "INSERT INTO recorridos_turisticos VALUES
                          (null,'$recorrido', '$recorrido_ing',' $recorrido_port',
                          '$subtitulo', '$subtitulo_ing', '$subtitulo_port', '$descripcion', '$descripcion_ing',
                          '$descripcion_port', '$precio', '$usd', '$nota', '$nota_ing', '$nota_port', NULL, '$evento')";
      $resultado = $this->conexion_db->query($sql);
      return $resultado;
    }

    public function mostrarRecorrido($id){
      $resultado = $this->conexion_db->query("SELECT *
      FROM recorridos_turisticos
      WHERE id_recorrido = '$id' ");
      $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);
      return $respuesta;
    }

    // public function eliminarFoto($id){
    //   $sql = "SELECT icono FROM tema WHERE id_tema = $id ";
    //   $consulta = $this->conexion_db->query($sql);
    //   $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
    //   foreach ($resultado as $valor) {
    //     unlink("../../img/uploads/".$valor['icono']);
    //   }
    // }

    public function actualizarRecorrido($recorrido, $recorrido_ing, $recorrido_port,
                        $subtitulo, $subtitulo_ing, $subtitulo_port, $descripcion, $descripcion_ing,
                        $descripcion_port, $precio, $usd, $nota, $nota_ing, $nota_port, $id){

      $sql = "UPDATE recorridos_turisticos SET
              recorrido = '$recorrido',
              recorrido_ing = '$recorrido_ing',
              recorrido_port = '$recorrido_port',
              subtitulo = '$subtitulo',
              subtitulo_ing = '$subtitulo_ing',
              subtitulo_port = '$subtitulo_port',
              descripcion = '$descripcion',
              descripcion_ing = '$descripcion_ing',
              descripcion_port = '$descripcion_port',
              precio = '$precio',
              precio_dolares = '$usd',
              nota = '$nota',
              nota_ing = '$nota_ing',
              nota_port = '$nota_port'
              WHERE id_recorrido = '$id'
              ";
      $consultar = $this->conexion_db->query($sql);
      return $consultar;
    }

    // public function actualizarSinFoto($tema, $tema_ing, $tema_port,
    //                 $descripcion, $descripcion_ing, $descripcion_port, $id){
    //   $sql = "UPDATE temas SET
    //   tema = '$tema',
    //   tema_ing = '$tema_ing',
    //   tema_port = '$tema_port',
    //   descripcion = '$descripcion',
    //   descripcion_ing = '$descripcion_ing',
    //   descripcion_port = '$descripcion_port'
    //   WHERE id_tema = '$id'
    //           ";
    //   $consultar = $this->conexion_db->query($sql);
    // }

    public function eliminar($id){
     $sql = $this->conexion_db->query("DELETE FROM recorridos_turisticos
    WHERE id_recorrido = $id ");
     return $sql;
    }

  }

 ?>
