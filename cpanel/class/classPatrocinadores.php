<?php
class Patrocinador extends Congreso{

    public function __construct(){

      parent::__construct();

    }

    public function getCategoriasPatrocinadores()
    {
        $sql = "SELECT * FROM categorias_patrocinadores";

        $resultado = $this->conexion_db->query($sql);

        $array_categorias = $resultado->fetch_all(MYSQLI_ASSOC);

        return $array_categorias;
    }

    public function patrocinadores($id_congreso)
    {
      $sql = "SELECT * FROM patrocinadores WHERE id_congreso = '$id_congreso' ORDER BY id_patrocinador DESC";

      $resultado = $this->conexion_db->query($sql);

      $patrocinadores = $resultado->fetch_all(MYSQLI_ASSOC);

      return $patrocinadores;
    }

    public function getPatrocinador($id)
    {
        $sql = "SELECT * FROM patrocinadores WHERE id_patrocinador = '$id'";

        $resultado = $this->conexion_db->query($sql);

        $patrocinador = $resultado->fetch_all(MYSQLI_ASSOC);

        return $patrocinador;
      }

    public function registrarPatrocinador($patrocinador, $web, $categoria,
    $imgBanner, $imgSeccion, $congreso)
    {

        //formateamos y guardamos el logotipo del evento en el directorio
        $imgBanner = $this->saveImg($imgBanner, $congreso);
        $imgSeccion = $this->saveImg($imgSeccion, $congreso);

        $sql = "INSERT INTO patrocinadores VALUES (null, '$patrocinador', '$imgBanner',  '$imgSeccion', '$web', '$categoria', '$congreso')";

        $resultado = $this->conexion_db->query($sql);

        //aquí se guarda la img el método ya existe en class congresos

        return $resultado;
    }

    public function eliminarFoto($columna, $id)
    {
        $sql = "SELECT '$columna' FROM patrocinadores WHERE id_patrocinador = $id ";

        $consulta = $this->conexion_db->query($sql);

        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        foreach ($resultado as $valor) 
        {
          unlink($_SERVER['DOCUMENT_ROOT']."/congresoparques/img/uploads/leon/patrocinadores/".$valor["'.$columna.'"]);
        }

      }

    public function actualizarPatrocinador($patrocinador, $web, $categoria, $imagen, $imagen_banner, $id)
    {
        if(empty($imagen_banner) && empty($imagen))
        {
            $sql = $this->conexion_db->query("UPDATE patrocinadores  SET 
                patrocinador = '$patrocinador',
                tipo = '$categoria',
                link = '$web'
                WHERE id_patrocinador = '$id'
            ");

            return true;

        }

        elseif($imagen_banner != "" && $imagen != "")
        {
            $eliminarFotoBanner = $this->eliminarFoto("imagen_banner", $id);

            $eliminarFotoSeccion = $this->eliminarFoto("imagen", $id);

            $sql = $this->conexion_db->query("UPDATE patrocinadores  SET 
                patrocinador = '$patrocinador',
                tipo = '$categoria',
                imagen_banner = '$imagen_banner',
                imagen = '$imagen',
                link = '$web'
                WHERE id_patrocinador = '$id'
            ");

            return true;

        }

        elseif($imagen_banner != "" && empty($imagen))
        {
            $eliminarFotoBanner = $this->eliminarFoto("imagen_banner", $id);

            $sql = $this->conexion_db->query("UPDATE patrocinadores  SET 
                patrocinador = '$patrocinador',
                tipo = '$categoria',
                imagen_banner = '$imagen_banner',
                link = '$web'
                WHERE id_patrocinador = '$id'
            ");

            return true;

        }

        elseif(empty($imagen_banner) && $imagen != "")
        {
            $eliminarFotoSeccion = $this->eliminarFoto("imagen", $id);
            $sql = $this->conexion_db->query("UPDATE patrocinadores  SET 
                patrocinador = '$patrocinador',
                tipo = '$categoria',
                imagen = '$imagen',
                link = '$web'
                WHERE id_patrocinador = '$id'
            ");

            return true;

        }

        else
        {

            return false;

        }
    }

    public function eliminarPatrocinador($id)
    {
        $sql = $this->conexion_db->query("DELETE FROM patrocinadores WHERE id_patrocinador = $id ");

        return $sql;

    }
}
?>