<?php session_start();
include('../class/funciones.php');
$id = $_GET['id'];
$patrocinador = new Patrocinador();
$array_datos= $patrocinador->getPatrocinador($id);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Editar Patrocinador</title>
    <?php require ("inc/head.php") ?>
  </head>
  <body>
  <main class="row expanded">
    <div class=" medium-2">
      <?php include("inc/menuEvento.php") ?>
    </div>
    <section class="column medium-10">
    <header>
        <div class="">
          <h4></h4>
        </div>
        <div class="menuTop">
          <a href="index.php"><i class="fi-home"></i></a>
          <a href="closet.php"><i class="fi-power"></i></a>
        </div>
      </header>
      <h1 class="tituloSeccion">Editar Patrocinador</h1>
      <div class="column medium-12 contenido">
        <div class="">
          <?php

// $sql = "SELECT a.nombre, a.cargo, a.empresa, a.biografia, a.foto, a.id_conferencia, b.nombre
// FROM usuarios  AS a
// LEFT JOIN conferencias AS b ON a.id_conferencia = b.id_conferencia
// WHERE id_usuario = '$id' ";
// $resultado = $conexion->consultar($sql);

        foreach ($array_datos as $valor) {

        $tabla = '<div id="formularioUsuarios">
                  <form class="" action="actualizarPatrocinador.php?id='.$id.'" method="post" enctype="multipart/form-data">
                    <fieldset>';
      $tabla = $tabla.'
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Patrocinador:</label>
                        <input type="text" name="patrocinador" value="'.$valor['patrocinador'].'" placeholder="Nombre" >
                      </div>
                    </div>
                    ';

        $tabla = $tabla.'<div class="row ">
                          <div class="column medium-4">
                            <label for="">Web:</label>
                            <input type="text" name="web" value="'.$valor['link'].'" placeholder="Cargo">
                          </div>
                          <div class="column medium-4">
                            <label>Categoría:
                                <select name="categoria" required>
                                <option value="'.$valor['id'].'">'.$valor['tipo'].'</option>
                                <option value="Organizador">Organizador</option>
                                <option value="Socio Institucional">Socio Institucional</option>
                                <option value="Patrocinador Oro">Patrocinador Oro</option>
                                <option value="Patrocinador Plata">Patrocinador Plata</option>
                                <option value="Patrocinador Bronce">Patrocinador Bronce</option>
                                </select>
                            </label>
                            </div>
                        </div>';
      $tabla = $tabla.'<div class="row ">
                            <div class="column medium-8">
                                <label for="file">Imagen banner principal (300 x 125):</label>
                                <input type="file" name="imagen_banner" value="">
                            </div>
                        </div>';
      $tabla = $tabla.'<div class="row ">
                        <div class="column medium-8">
                            <label for="file">Imagen sección patrocinadores (foto geométrica):</label>
                            <input type="file" name="imagen" value="">
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