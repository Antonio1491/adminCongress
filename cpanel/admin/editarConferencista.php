<?php session_start();
include('../class/funciones.php');
$id = $_GET['id'];
$conferencista = new Conferencistas();
$array_datos_usuario = $conferencista->mostrarDatosEdit($id);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edición Conferencias</title>
    <?php require ("inc/head.php") ?>
  </head>
  <body>
    <header>
      <div class="rows">
        <div class="column medium-10 medium-offset-2 text-center">
          <h4>Conferencistas</h4>
        </div>
      </div>
    </header>
    <main class="row expanded">
      <div class="medium-2">
        <?php include("inc/menu.php") ?>
      </div>
      <div class="column medium-10 contenido">
        <div class="">
          <?php

// $sql = "SELECT a.nombre, a.cargo, a.empresa, a.biografia, a.foto, a.id_conferencia, b.nombre
// FROM usuarios  AS a
// LEFT JOIN conferencias AS b ON a.id_conferencia = b.id_conferencia
// WHERE id_usuario = '$id' ";
// $resultado = $conexion->consultar($sql);

        foreach ($array_datos_usuario as $valor) {

        $tabla = '<div id="formularioUsuarios">
                  <form class="" action="actualizarConferencista.php?id='.$id.'" method="post" enctype="multipart/form-data">
                    <fieldset>';

        $tabla = $tabla.'<div class="row ">
                        <div class="column medium-4">
                          <label for="">Usuario (e-mail):</label>
                          <input type="text" name="usuario" value="'.$valor['usuario'].'" placeholder="Usuario" >
                        </div>
                        <div class="column medium-4">
                          <label for="">Password:</label>
                          <input type="text" name="password" value="'.$valor['password'].'" placeholder="" >
                        </div>
                        <div class="column medium-2">
                           <label for="">Prioridad:</label>
                           <select class="" name="prioridad">';
                           switch ($valor['prioridad']) {
                             case 1:
                               $prioridad = "Alta";
                               break;
                            case 2:
                              $prioridad = "Media";
                              break;
                            case 3:
                              $prioridad = "Baja";
                              break;
                           }
      $tabla = $tabla.'<option value="'.$valor['prioridad'].'">'.$prioridad.'</option>
                             <option value="1">Alta</option>
                             <option value="2">Media</option>
                             <option value="3">Baja</option>
                           </select>
                         </div>
                      </div>
                    <div class="row ">
                      <div class="column medium-4">
                        <label for="">Nombre:</label>
                        <input type="text" name="nombre" value="'.$valor['nombre'].'" placeholder="Nombre" >
                      </div>
                      <div class="column medium-4">
                        <label for="">Apellidos:</label>
                        <input type="text" name="apellidos" value="'.$valor['apellidos'].'" placeholder="Apellidos" >
                      </div>
                    </div>
                    ';

        $tabla = $tabla.'<div class="row ">
                          <div class="column medium-4">
                            <label for="">Cargo:</label>
                            <input type="text" name="cargo" value="'.$valor['cargo'].'" placeholder="Cargo">
                          </div>
                          <div class="column medium-4">
                            <label for="">Empresa:</label>
                            <input type="text" name="empresa" value="'.$valor['empresa'].'" placeholder="Empresa" >
                          </div>
                        </div>';
      $tabla = $tabla.'<div class="row ">
                        <div class="column medium-4">
                          <label for="">Cargo (Inglés):</label>
                          <input type="text" name="cargo_ing" value="'.$valor['cargo_ing'].'" placeholder="Cargo">
                        </div>
                        <div class="column medium-4">
                          <label for="">Empresa (Inglés):</label>
                          <input type="text" name="empresa_ing" value="'.$valor['empresa_ing'].'" placeholder="Empresa" >
                        </div>
                      </div>';
      $tabla = $tabla.'<div class="row ">
                      <div class="column medium-4">
                      <label for="">Cargo (Portugués):</label>
                      <input type="text" name="cargo_port" value="'.$valor['cargo_port'].'" placeholder="Cargo">
                      </div>
                      <div class="column medium-4">
                      <label for="">Empresa (Portugués):</label>
                      <input type="text" name="empresa_port" value="'.$valor['empresa_port'].'" placeholder="Empresa" >
                      </div>
                      </div>';
        $tabla = $tabla.'<div class="row">
                        <div class="column medium-4">
                          <label for="">País:</label>
                          <input type="text" name="pais" value="'.$valor['pais'].'" placeholder="País, Ciudad" required>
                        </div>
                        <div class="column medium-4">
                          <label for="">Ciudad:</label>
                          <input type="text" name="ciudad" value="'.$valor['ciudad'].'" placeholder="País, Ciudad" required>
                        </div>
                      </div>';
        $tabla = $tabla.'<div class="row ">
                          <div class="column medium-8">
                            <label for="">Biografía:</label>
                            <textarea name="biografia" rows="4" cols="1" value="'. $valor['biografia'].'">'.  $valor['biografia'].'</textarea>
                          </div>
                        </div>';
        $tabla = $tabla.'<div class="row ">
                          <div class="column medium-8">
                            <label for="">Biografía (Inglés):</label>
                            <textarea name="biografia_ing" rows="4" cols="1" value="'.$valor['biografia_ing'].'">'.$valor['biografia_ing'].'</textarea>
                            </div>
                            </div>';
          $tabla = $tabla.'<div class="row ">
                            <div class="column medium-8">
                              <label for="">Biografía (Portugués):</label>
                              <textarea name="biografia_port" rows="4" cols="1" value="'.$valor['biografia_port'].'">'.$valor['biografia_port'].'</textarea>
                              </div>
                              </div>';
        $tabla = $tabla. '<div class="row ">
                            <div class="column medium-8">
                              <label for="">Fotografía:</label>
                              <input type="file" name="fotografia" value="">
                            </div>
                          </div>
                          <div class="row">
                            <div class="column medium-8">
                            <label>Conferencía:
                              <select name="conferencia">
                              <option value="'.$valor['id_conferencia'].'">'.$valor['conferencia'].'</option>';
                                $lista_conferencias = new Conferencia();
                                $lista_desplegable = $lista_conferencias->listaConferencias($_SESSION["evento"]);
                                foreach ($lista_desplegable as $value) {
        $tabla = $tabla.        '<option value="'.$value['id_conferencia'].'">'.$value['conferencia'].'</option>';
                                }
        $tabla = $tabla.'    </select>
                            </label>
                          </div>
                        </div>';
        $tabla = $tabla . '<div class="row">
                            <div class="column">
                              <input type="submit" name="" value="Actualizar" class="success button">
                            </div>
                          </div>
                          </fieldset>
                        </form>
                      </div>';
        }

        echo $tabla;
















 ?>
