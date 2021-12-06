<?php session_start();
$id = $_GET['id'];
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php require ("inc/head.php") ?>
    <script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="../../js/vendor/what-input.js" type="text/javascript"></script>
    <script src="../../js/vendor/foundation.min.js" type="text/javascript"></script>
    <!-- <script type="text/javascript" src="../js/app.js"></script> -->
  </head>
  <body>
    <header>
      <div class="rows">
        <div class="column medium-10 medium-offset-2 text-center">
          <h4>Editar Evento</h4>
        </div>
      </div>
    </header>
    <main class="row expanded">
      <div class="medium-2">
        <?php include("inc/menu.php") ?>
      </div>
      <div class="column medium-10">
        <div class="">
          <?php

            $traer_datos = new Evento();
            $resultado = $traer_datos->mostrarEvento($id);
            foreach ($resultado as $valor) {
              echo '<form class="" action="actualizarEvento.php?id='.$id.'" method="post" enctype="multipart/form-data">
                  <fieldset>
                    <div class="row">
                      <div class="column">
                        <legend><h5>Actualizar Evento</h5></legend>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Evento:</label>
                        <input type="text" name="evento" value="'.$valor['evento'].'" placeholder="Evento" required>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Evento (Inglés):</label>
                        <input type="text" name="evento_ing" value="'.$valor['evento_ing'].'" placeholder="Evento (Inglés)" >
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Evento (Portugués):</label>
                        <input type="text" name="evento_port" value="'.$valor['evento_port'].'" placeholder="Evento (Portugués)" >
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="file">Fotografía:</label>
                        <input type="file" name="fotografia" >
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-2">
                        <label for="">Fecha:</label>
                        <input type="date" name="fecha" value="'.$valor['fecha'].'" placeholder="Fecha" required>
                      </div>
                      <div class="column medium-2">
                        <label for="">Hora Inicio:</label>
                        <input type="time" name="hora_inicio" value="'.$valor['hora_inicio'].'" placeholder="Hora" required>
                      </div>
                      <div class="column medium-2">
                        <label for="">Hora Fin:</label>
                        <input type="time" name="hora_fin" value="'.$valor['hora_fin'].'" placeholder="Hora" required>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Lugar:</label>
                        <input type="text" name="lugar" value="'.$valor['lugar'].'" placeholder="Lugar" required>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Lugar (Inglés):</label>
                        <input type="text" name="lugar_ing" value="'.$valor['lugar_ing'].'" placeholder="Lugar (Inglés)" >
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Lugar (Portugués):</label>
                        <input type="text" name="lugar_port" value="'.$valor['lugar_port'].'" placeholder="Lugar (Portugués)" >
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Descripción:</label>
                        <textarea name="descripcion" rows="4" cols="80" value="'.$valor['descripcion'].'">'.$valor['descripcion'].'</textarea>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Description (Inglés):</label>
                        <textarea name="descripcion_ing" rows="4" cols="80" value="'.$valor['descripcion_ing'].'">'.$valor['descripcion_ing'].'</textarea>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Descrição (Portugués):</label>
                        <textarea name="descripcion_port" rows="4" cols="80" value="'.$valor['descripcion_port'].'">'.$valor['descripcion_port'].'</textarea>
                      </div>
                    </div>

                    <div class="row ">
                      <input type="submit" name="" value="Actualizar" class="button success">
                    </div>
                  </fieldset>
                </form>';
            }
          ?>
