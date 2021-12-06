<?php

class Tallerista extends Conexion{

    public function __construct(){

      parent::__construct();

    }
        //registro de talleristas
        public function registroTallerista($nombre, $apellidos, $cargo, 
        $cargo_ing, $cargo_port, $empresa,
        $empresa_ing, $empresa_port, $biografia, 
        $biografia_ing, $biografia_port,
        $taller, $fotografia, $evento){

        $resultado = $this->conexion_db->query("INSERT INTO talleristas
        VALUES ( null, '$nombre', '$apellidos', '$cargo','$cargo_ing', '$cargo_port',
        '$empresa', '$empresa_ing', '$empresa_port', '$taller', '$fotografia', 
        '$biografia', '$biografia_ing', '$biografia_port', '$evento')");

        return $resultado;

        }

        //Mostrar los datos del conferencista para editar
        public function mostrarDatosEdit($id){

        $resultado = $this->conexion_db->query("SELECT a.id_tallerista, a.nombre, a.apellidos, a.cargo,
        a.cargo_ing, a.cargo_port, a.empresa, a.empresa_ing, a.empresa_port, b.id_taller, a.fotografia, a.biografia, 
        a.biografia_ing, a.biografia_port, b.taller
        FROM talleristas AS a
        LEFT JOIN talleres AS b ON b.id_taller = a.id_taller
        WHERE a.id_tallerista = $id ");

        return $resultado;

        }


        //Actualizar datos del tallerista sin foto
        public function actualizarSinFoto($nombre, $apellidos, $cargo, 
        $cargo_ing, $cargo_port, $empresa,
        $empresa_ing, $empresa_port, $biografia, 
        $biografia_ing, $biografia_port,
        $taller, $id){

        $sql = "UPDATE talleristas SET nombre = '$nombre',
        apellidos = '$apellidos',
        cargo = '$cargo',
        cargo_ing = '$cargo_ing',
        cargo_port = '$cargo_port',
        empresa = '$empresa',
        empresa_ing = '$empresa_ing',
        empresa_port = '$empresa_port',
        id_taller = '$taller',
        biografia = '$biografia',
        biografia_ing = '$biografia_ing',
        biografia_port = '$biografia_port'
        WHERE id_tallerista = '$id' ";

        $resultado = $this->conexion_db->query($sql);

        return $resultado;
        }

      public function eliminarFoto($id){
      $sql = "SELECT fotografia FROM talleristas WHERE id_tallerista = $id ";
      $consulta = $this->conexion_db->query($sql);
      $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        foreach ($resultado as $valor) {
        unlink($_SERVER['DOCUMENT_ROOT']."/img/uploads/leon/talleristas/".$valor['fotografia']);
        }

      }

      //Actualizar datos del tallerista con foto nueva
      public function actualizarTallerista($nombre, $apellidos, $cargo, $cargo_ing, $cargo_port, $empresa, $empresa_ing, $empresa_port,
      $biografia, $biografia_ing, $biografia_port, $fotografia, $taller, $id){
      $eliminarFoto = $this->eliminarFoto($id);

      $sql = "UPDATE talleristas SET nombre = '$nombre',
      apellidos = '$apellidos',
      cargo = '$cargo',
      cargo_ing = '$cargo_ing',
      cargo_port = '$cargo_port',
      empresa = '$empresa',
      empresa_ing = '$empresa_ing',
      empresa_port = '$empresa_port',
      id_taller = '$taller',
      fotografia = '$fotografia',
      biografia = '$biografia',
      biografia_ing = '$biografia_ing',
      biografia_port = '$biografia_port'
      WHERE id_tallerista = '$id' ";

      $consulta = $this->conexion_db->query($sql);

      return $consulta;
      }

    // Eliminar tallerista
    public function eliminar($id){
      $sql = $this->conexion_db->query("DELETE FROM talleristas WHERE id_tallerista = $id ");
      return $sql;
}

}
?>