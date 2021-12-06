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

    public function actualizar($lugar, $codigo, $inicio, $fin, $pr_miem,
                              $pr_gral, $costo_miem, $costo_gral, $pr_vivencial, $pr_curricular, $pr_fiesta,
                              $pr_expo,$pr_miem_d, $pr_gral_d, $costo_miem_d, $costo_gral_d, $pr_vivencial_d, 
                              $pr_curricular_d, $pr_fiesta_d, $pr_expo_d, $id){
        $sql = "UPDATE congresos SET
              id_congreso = '$codigo',
              lugar = '$lugar',
              inicio = '$inicio',
              fin = '$fin',
              preventa_miembros = '$pr_miem',
              preventa_gral = '$pr_gral',
              precio_final_miembros = '$costo_miem',
              precio_final_gral = '$costo_gral',
              precio_vivencial = '$pr_vivencial',
              precio_curricular = '$pr_curricular',
              precio_fiesta = '$pr_fiesta',
              precio_expo = '$pr_expo',
              preventa_miembros_dolar = '$pr_miem_d',
              preventa_gral_dolar = '$pr_gral_d',
              precio_final_miembros_dolar = '$costo_miem_d',
              precio_final_gral_dolar = '$costo_gral_d',
              precio_vivencial_dolar = '$pr_vivencial_d',
              precio_curricular_dolar = '$pr_curricular_d',
              precio_fiesta_dolar = '$pr_fiesta_d',
              precio_expo_dolar = '$pr_expo_d'
              WHERE id_congreso = '$id' ";
        $consulta = $this->conexion_db->query($sql);
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