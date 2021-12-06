<?php
    class Voluntarios extends Conexion
    {
      public function __construct(){
        parent::__construct();
      }

      public function voluntarios($evento){
        $sql = "SELECT a.id_voluntario, a.nombre, a.apellido_paterno, a.apellido_materno, a.email,
              a.celular, a.universidad, a.nivel_estudios, a.semblanza, a.razones, 
              c.turno, c.fecha, c.hora_inicio, hora_fin
              FROM voluntarios as a 
              LEFT JOIN turnos_asignados as b
              ON a.id_voluntario = b.id_voluntario
              LEFT JOIN turnos_voluntarios as c
              ON b.turno1 = c.id_turno
              WHERE a.id_congreso = '$evento' ORDER BY a.id_voluntario DESC";
        $resultado = $this->conexion_db->query($sql);
        $array = $resultado->fetch_all(MYSQLI_ASSOC);
        return $array;
      }

      public function infoVoluntario($id){
        $sql = "SELECT a.nombre, a.apellido_paterno, a.apellido_materno, a.email,
        a.celular, a.universidad, a.nivel_estudios, a.semblanza, a.razones, 
        c.turno, c.fecha, c.hora_inicio, hora_fin
        FROM voluntarios as a 
        LEFT JOIN turnos_asignados as b
        ON a.id_voluntario = b.id_voluntario
        LEFT JOIN turnos_voluntarios as c
        ON b.turno1 = c.id_turno
        WHERE a.id_voluntario = '$id' ";
        $resultado = $this->conexion_db->query($sql);
        $array = $resultado->fetch_all(MYSQLI_ASSOC);
        return $array;
      }

    }
?>


