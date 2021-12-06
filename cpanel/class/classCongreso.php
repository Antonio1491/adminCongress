<?php
class Congreso extends Conexion
{
  public $dirCongreso;

    public function __construct(){

      parent::__construct();

    }

    public function listaCongresos()
    {
      $sql = "SELECT * FROM congresos";
      $consulta = $this->conexion_db->query($sql);
      $datos = $consulta->fetch_all(MYSQLI_ASSOC);
      return $datos;
    }

    public function datosCongreso($evento)
    {
      $sql = "SELECT * FROM congresos WHERE id_congreso = '$evento' ";

      $consulta = $this->conexion_db->query($sql);

      $datos = $consulta->fetch_all(MYSQLI_ASSOC);

      return $datos;
    }

    public function logoById($idCongreso)
    {
      $sql = "SELECT * FROM congresos WHERE id_congreso = '$idCongreso' ";

      $consulta = $this->conexion_db->query($sql);

      $datos = $consulta->fetch_all(MYSQLI_ASSOC);

      return $datos = json_encode($datos[0]["logotipo"]);
    }

    public function actualizar($codigo, $nombre, $lugar, $inicio, $hora_inicio, $fin, $hora_fin, $modalidad, $recinto, $idioma, $email, $telefono,  $facebook, $instagram, $youtube, $twitter, $descripcion, $descripcion_ing, $logotipo)
    {
      if($logotipo != NULL)
      {
        $eliminarLogotipo = $this->eliminarLogotipo($codigo);

        //formateamos y guardamos el logotipo del evento en el directorio
        $logotipo = $this->saveImg($logotipo, $codigo);
      }

      $sql = "UPDATE congresos SET
              nombre_evento = '$nombre',
              descripcion = '$descripcion',
              descripcion_ing = '$descripcion_ing',
              lugar = '$lugar',
              fecha_inicio = '$inicio',
              fecha_fin = '$fin',
              hora_inicio= '$hora_inicio',
              hora_fin = '$hora_fin',
              modalidad = '$modalidad',
              recinto = '$recinto',
              idioma = '$idioma',
              facebook = '$facebook',
              instagram = '$instagram',
              twitter = '$twitter',
              youtube = '$youtube',
              email = '$email',
              telefono = '$telefono',
              logotipo = '$logotipo'
              WHERE id_codigo= '$codigo' ";

        $consulta = $this->conexion_db->query($sql);
        return $consulta;
    }

    /*
      EL método crea el evento y sus respectivos directorios
    */
    public function agregar($nombre, $lugar, $codigo, $inicio, $hora_inicio, $fin, $hora_fin, $modalidad, $recinto, $idioma, $email, $telefono,  $facebook, $instagram, $youtube, $twitter, $descripcion, $descripcion_ing, $logotipo)
    {
      /** crear directorio **/
      
      // - Verifica la existencia del directorio
      if(!is_dir("$codigo"))
      {
        //directorio del evento producción (servidor)
        // $dir = $_SERVER['DOCUMENT_ROOT'].'/'.$codigo;
        //directorio local
        $dir = $_SERVER['DOCUMENT_ROOT'].'/congresos/'.$codigo;
        mkdir("$dir", 0777) or die ("no se puede crear la carpeta en $dir");
        $dir = $dir.'/img';
        //directorio de img
        mkdir("$dir", 0777) or die ("no se puede crear la carpeta en $dir");
        $this->dirCongreso = $dir;
      }

      //se creo el directorio
      if(file_exists($this->dirCongreso))
      {
      //formateamos y guardamos el logotipo del evento en el directorio
      $logotipo = $this->saveImg($logotipo, $codigo);

      $sql = "INSERT INTO congresos VALUES ('$codigo', '$nombre', '$descripcion', '$descripcion_ing', '$lugar', '$inicio', '$fin', '$hora_inicio', '$hora_fin', '$modalidad', '$recinto', '$idioma', '$facebook', '$instagram', '$youtube', '$twitter', '$email', '$telefono', '$logotipo')";

      $resultado = $this->conexion_db->query($sql);
      
      return $resultado;

      }
      else{
        // el directorio no existe
        return false;
      }
      
    }

    public function formathora($hora)
    {
      $hora_final= date('H:i A', strtotime($hora));
      return $hora_final;

    }

    public function formathora12($hora)
    {
      $hora_final= date('h:i A', strtotime($hora));
      return $hora_final;
    }

    public function eliminar($id_congreso)
    {
      $sql = $this->conexion_db->query("DELETE FROM congresos WHERE id_congreso = '$id_congreso' ");
      return $sql;
    }

    public function eliminarLogotipo($codigo)
    {
      $sql = "SELECT logotipo FROM congresos WHERE id_congreso = '$codigo' ";
      $consulta = $this->conexion_db->query($sql);
      $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

      foreach ($resultado as $valor) 
      {
        //directorio servidor
        // unlink($_SERVER['DOCUMENT_ROOT']."/$codigo/img/".$valor['logotipo']);
        //diretorio local
        unlink($_SERVER['DOCUMENT_ROOT']."/congresos/$codigo/img/".$valor['logotipo']);
        return true;
      }

      return false;

    }
  
  
    //Método que válida el formato de una imagen
  public function validarImg($type, $size)
  {
    if(($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png") && ($size < 5000000))
    {
      return true;
    }
    return false;
  }

  //Método setea el nombre de la imagen y la válida devolviendo el nuevo nombre
  public function saveImg($img, $codigo)
  {
    $random=bin2hex(random_bytes(2));  //generar cadena random de 4 caracteres 
    $imgNameFormat = "$codigo-".$random."-".mb_strtolower(str_replace(' ', '-', $img["name"]));

    if($this -> validarImg($img["type"], $img["size"]))
    {
      //directorio servidor
      $dir = $_SERVER['DOCUMENT_ROOT'].'/'.$codigo.'/img/';
      //directorio local
      $dir = $_SERVER['DOCUMENT_ROOT'].'/congresos/'.$codigo.'/img/';

      if(move_uploaded_file($img["tmp_name"], $dir.$imgNameFormat))
      {
        return $imgNameFormat;
      }

    }
    return false;
  }



}

?>