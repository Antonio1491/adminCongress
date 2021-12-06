<?php
class Congreso extends Conexion{

    public function __construct(){

      parent::__construct();

    }

    public function listaCongresos(){
      $sql = "SELECT * FROM congresos";
      $consulta = $this->conexion_db->query($sql);
      $datos = $consulta->fetch_all(MYSQLI_ASSOC);
      // $prueba = "pruebas";
      return $datos;
      // return $prueba;
    }

    public function datosCongreso($evento){
      $sql = "SELECT * FROM congresos WHERE id_congreso = '$evento' ";
      $consulta = $this->conexion_db->query($sql);
      $datos = $consulta->fetch_all(MYSQLI_ASSOC);
      return $datos;
    }

    public function actualizar($codigo, $nombre, $lugar, $inicio, $hora_inicio, $fin, $hora_fin, $modalidad, $recinto, $idioma, $email, $telefono,  $facebook, $instagram, $youtube, $twitter, $descripcion, $descripcion_ing, $logotipo){
      
      $sql = "UPDATE congresos SET
              nombre_evento = '$nombre',
              descripcion = '$descripcion',
              descripcion_ing = '$descripcion_ing',
              lugar = '$lugar',
              fecha_inicio = '$inicio',
              fecha_fin = '$fin',
              hora_inicio= '$hora_inicio',
              hora_fin = '$hora_fin',
              modalidad ='$modalidad',
              recinto = '$recinto',
              idioma = '$idioma',
              facebook = '$facebook',
              instagram = '$instagram',
              twitter = '$twitter',
              youtube = '$youtube',
              email = '$email',
              telefono = '$telefono'          
              WHERE id_congreso = '$codigo' ";
        $consulta = $this->conexion_db->query($sql);

        // if($consulta){
        //   echo 'bien';
        // }else{
        //   echo'hubo un error en la base de datos';
        // }
        return $consulta;
    }

    public function formathora($hora){
      $hora_final= date('H:i A', strtotime($hora));
      return $hora_final;

    }
    public function formathora12($hora){
      $hora_final= date('h:i A', strtotime($hora));
      return $hora_final;

    }


}

?>