<?php session_start();
include('../class/funciones.php');
$id = $_GET['id'];
$expositor = new Expositor();
$array_datos= $expositor->getExpositor($id);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Editar Expositor</title>
    <?php require ("inc/head.php") ?>
  </head>
  <body>
    <header>
      <div class="rows">
        <div class="column medium-10 medium-offset-2 text-center">
          <h4>Editar datos del Expositor</h4>
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


        foreach ($array_datos as $valor) {

        $tabla = '<div id="formularioUsuarios">
                  <form class="" action="actualizarExpositor.php?id='.$id.'" method="post" enctype="multipart/form-data">
                    <fieldset>';
      $tabla = $tabla.'
                    <div class="row ">
                      <div class="column medium-6">
                        <label for="">Expositor/Empresa:</label>
                        <input type="text" name="expositor" value="'.$valor['nombre_expositor'].'" placeholder="Nombre" >
                      </div>
                      <div class="column medium-6">
                            <label for="">Web:</label>
                            <input type="text" name="web" value="'.$valor['url'].'" placeholder="Cargo">
                          </div>
                    </div>
                    ';

        $tabla = $tabla.'<div class="row ">
                          <div class="column medium-6">
                            <label>E-mail de contacto: </label>
                            <input type="text" name="email" value="'.$valor['email'].'" placeholder="E-mail del Representante" required>
                          </div>
                          <div class="column medium-6">
                        <label for="">Nombre del Representante:</label>
                          <input type="text" name="representante" value="'.$valor['representante'].'" placeholder="Cargo">
                        </div>
                        </div>';
    
      
      $tabla = $tabla.'<div class="row ">
                        <div class="column medium-8">
                            <label for="file">Imagen sección Expo :</label>
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