<?php
class Habitacion extends Conexion{

 public $id_hotel;

    public function __construct(){

      parent::__construct();

    }


    public function guardarHabitacion($tipoH,$modalidad,$precio,$id_hotel) {

       
       
       foreach($tipoH as $row => $value){
         $th=$tipoH[$row];
         $moda=$modalidad[$row];
         $price= $precio[$row];
       
        
         $sql = "INSERT INTO habitacion VALUES (null,'$th','$moda','$price', '$id_hotel')";
               $consulta = $this->conexion_db->query($sql);
       
       }
       
    
      if($consulta){
      $mensaje = '<script>
      Swal.fire({ title: "Datos guardados con exito",
          icon: "success",customClass: "swal-wide",}).then(okay => {
            if (okay) {
              window.location.href = "../admin/hoteles.php";

          }
        });
    
        </script>';

        return $mensaje;

      }else {
          $mensaje = '<script>
          Swal.fire({ title: "Error al guardar en la base de datos ",
              icon: "warning",customClass: "swal-wide",}).then(okay => {
                if (okay) {
                  window.location.href = "../admin/hoteles.php";
  
              }
            });
        
            </script>';
  
            return $mensaje;       
           }
      
      // return $consulta;
  
}
public function getHabitacion($id){
  $sql = $this->conexion_db->query("SELECT * FROM habitacion  WHERE id_hotel = '$id'");

$data = $sql->fetch_all(MYSQLI_ASSOC);
return $data;
}

public function getEditarHabitacion($id){
  $sql = $this->conexion_db->query("SELECT * FROM habitacion  WHERE id_habitacion = '$id'");

$data = $sql->fetch_all(MYSQLI_ASSOC);
return $data;

}

public function actualizarDatosHabitacion($tipo,$modalidad,$precio,$id){
  $sql = "UPDATE habitacion SET
  tipo_habitacion = '$tipo',
  modalidad = '$modalidad',
  precio = '$precio'
  WHERE id_habitacion = '$id' ";
$consultar = $this->conexion_db->query($sql); 
  if($consultar){
  $mensaje = '<script>
  Swal.fire({ title: "Datos acualizados con exito con exito",
      icon: "success",customClass: "swal-wide",}).then(okay => {
        if (okay) {
          window.location.href = "../admin/hoteles.php";

      }
    });

    </script>';

    return $mensaje;

  }else {
      $mensaje = '<script>
      Swal.fire({ title: "Error al actualizar en la base de datos ",
          icon: "warning",customClass: "swal-wide",}).then(okay => {
            if (okay) {
              window.location.href = "../admin/hoteles.php";

          }
        });
    
        </script>';

        return $mensaje;       
       }
  
  // return $consulta;
  
}

public function eliminarHabitacion($id) {
  $sql = $this->conexion_db->query("DELETE FROM habitacion
  WHERE id_habitacion = $id ");
   return $sql; 
  
  }
}
?>