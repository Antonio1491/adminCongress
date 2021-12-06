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
    <script src="../js/vendor/what-input.js" type="text/javascript"></script>
    <script src="../js/vendor/foundation.min.js" type="text/javascript"></script>
    <!-- <script type="text/javascript" src="../js/app.js"></script> -->
  </head>
  <body>
    <header>
      <div class="rows">
        <div class="column medium-10 medium-offset-2 text-center">
          <h4>Editar Taller</h4>
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

            $traer_datos = new Taller();
            $resultado = $traer_datos->mostrarTaller($id);
            foreach ($resultado as $valor) {
              echo '<form class="" action="actualizarTaller.php?id='.$id.'" method="post" enctype="multipart/form-data">
                  <fieldset>
                    <div class="row">
                      <div class="column">
                        <legend><h5>Registro Taller</h5></legend>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Taller:</label>
                        <input type="text" name="taller" value="'.$valor['taller'].'" placeholder="Nombre de la Conferencia" required>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Taller (Inglés):</label>
                        <input type="text" name="taller_ing" value="'.$valor['taller_ing'].'" placeholder="Nombre de la Conferencia" required>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Taller (Portugés):</label>
                        <input type="text" name="taller_port" value="'.$valor['taller_port'].'" placeholder="Nombre de la Conferencia">
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Subtítulo:</label>
                        <input type="text" name="subtitulo" value="'.$valor['subtitulo'].'" placeholder="Subtítulo Taller" required>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Subtítulo (Inglés):</label>
                        <input type="text" name="subtitulo_ing" value="'.$valor['subtitulo_ing'].'" placeholder="Subtítulo Taller" required>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Subtítulo (Portugués):</label>
                        <input type="text" name="subtitulo_port" value="'.$valor['subtitulo_port'].'" placeholder="Subtítulo Taller" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="column medium-2">
                        <label for="">Fecha (00/00/0000):</label>
                        <input type="date" name="fecha" value="'.$valor['fecha'].'" placeholder="Día/Mes/Año">
                      </div>
                      <div class="column medium-2">
                        <label for="">Inicio:</label>
                        <input type="time" name="inicio" value="'.$valor['inicio'].'" placeholder="00:00:00">
                      </div>
                      <div class="column medium-2">
                        <label for="">Fin:</label>
                        <input type="time" name="fin" value="'.$valor['fin'].'" placeholder="00:00:00">
                      </div>
                      <div class="column medium-2">
                        <label for="">Capacidad:</label>
                        <input type="number" name="capacidad" value="'.$valor['capacidad'].'" >
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-5">
                        <label for="">Tallerista:</label>
                        <input type="text" name="tallerista" value="'.$valor['tallerista'].'" placeholder="" >
                      </div>
                      <div class="column medium-3">
                        <label>Tipo de taller:
                          <select name="tipo" required>
                          <option value="'.$valor['tipo'].'">'.$valor['tipo'].'</option>
                            <option value="Vivencial">Vivencial</option>
                            <option value="Curricular">Curricular</option>
                          </select>
                        </label>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="file">Fotografía:</label>
                        <input type="file" name="fotografia" value="">
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Descripción:</label>
                        <textarea name="descripcion" rows="4" cols="80" value= "'.$valor['descripcion'].'">'.$valor['descripcion'].'</textarea>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Descripción (Inglés):</label>
                        <textarea name="descripcion_ing" rows="4" cols="80" value="'.$valor['descripcion_ing'].'">'.$valor['descripcion_ing'].'</textarea>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Descripción (Portugués):</label>
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
