<?php
class Hoteles extends Conexion{

 public $id_hotel;

    public function __construct(){

      parent::__construct();

    }

public function guardarDatosHotel($nombre_hotel,$img,$ubicacion,$clave_reserv,$numero,$email,$congreso) {

        $sql = "INSERT INTO hotel VALUES (null,'$nombre_hotel','$img' ,'$ubicacion', '$clave_reserv', '$numero', '$email', '$congreso' )";
        $consulta = $this->conexion_db->query($sql);
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
public function actualizarDatosHotel($nombre_hotel,$ubicacion,$clave_reserv,$numero,$email,$congreso,$id) {

  $sql = "UPDATE hotel SET
  nombre_hotel = '$nombre_hotel',
  ubicacion = '$ubicacion',
  clave_reservacion = '$clave_reserv',
  numero_contacto = '$numero',
  correo_contacto = '$email',
  id_congreso = '$congreso'
  WHERE id_hotel = '$id' ";
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

public function getHoteles($evento) {
    $sql = $this->conexion_db->query("SELECT * FROM hotel 
    INNER JOIN congresos ON hotel.id_congreso =congresos.id_congreso
    WHERE hotel.id_congreso = '$evento'");

$data = $sql->fetch_all(MYSQLI_ASSOC);
return $data;

}

public function getHotelEditar($id){
  $sql = $this->conexion_db->query("SELECT * FROM hotel 
   
    WHERE id_hotel = '$id'");

$data = $sql->fetch_all(MYSQLI_ASSOC);
return $data;
}

public function validarImg($type,$size)
{



  if(($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png") && ($size < 5000000))
  {
   
    return true;

  }

  return false;

}

public function setImg($logotipo,$logotipoType,$logotipoSize)
{
  
  $random=bin2hex(random_bytes(2));  //generar cadena random de 4 caracteres 

  $imgName = "anpr-".$random.mb_strtolower(str_replace(' ', '-', $logotipo));

 if($this -> validarImg($logotipoType,$logotipoSize))
 {

  return $imgName;

 }

 return false;

}

public function guardarImg($img,$logotipoTmp)
{

  $dir = $_SERVER['DOCUMENT_ROOT'].'/cpanel/img_hotel';

  if(move_uploaded_file($logotipoTmp, $dir."/".$img))
  {
    return true;
  }

  return false;

}

public function getIdHotel(){
  $sql = ("SELECT * FROM hotel ORDER BY id_hotel DESC LIMIT 1");
  $consulta = $this->conexion_db->query($sql);
  $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

foreach ($resultado as $exp) {
  $id = $exp['id_hotel'];
}
$this->id_hotel = $id;


}
// public function guardarHabitacion($valor,$valor2,$valor3){
//   $id_h = $this->id_hotel;
 
 
//  foreach($valor as $row => $value){
//    $th=$valor[$row];
//    $moda=$valor2[$row];
//    $price= $valor3[$row];
 
  
//    $sql = "INSERT INTO habitacion VALUES (null,'$th','$moda','$price', '$id_h')";
//          $consulta = $this->conexion_db->query($sql);
 
//  }
 
 
//  if($consulta){
//    return true;
//  }else{
//    return false;
//  }
 
//  }


public function actualizarImgHotel($img,$id){
  $sql = "UPDATE hotel SET
  url_img = '$img'
  WHERE id_hotel = '$id' ";
$consultar = $this->conexion_db->query($sql); 
  if($consultar){
  $mensaje = '<script>
  Swal.fire({ title: "Datos acualizados con exito",
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
  
}
public function eliminarHotel($id) {
  $sql = $this->conexion_db->query("DELETE FROM hotel
  WHERE id_hotel = $id ");
   return $sql; 
  
  }
  
  
    public function consultaNombreImgAnterior($id){
    $sql = ("SELECT url_img FROM hotel WHERE id_hotel = $id");
    $consulta = $this->conexion_db->query($sql);
    $resultado = $consulta->fetch_all(MYSQLI_ASSOC);


    return $resultado;
  }








}
?>