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
    <main class="row expanded">
      <div class="medium-2">
        <?php include("inc/menu.php") ?>
      </div>
      <div class="column medium-10"><br>
      <header>
        <div class="">
          <h4></h4>
        </div>
        <div class="menuTop">
          <a href="index.php"><i class="fi-home"></i></a>
          <a href="closet.php"><i class="fi-power"></i></a>
        </div>
      </header>
      <h1 class="tituloSeccion">Editar Congreso</h1>
        <div class="">
          <?php
            $traer_datos = new Congreso();
            $resultado = $traer_datos->datosCongreso($id);
            foreach ($resultado as $valor) {
              $hora = $valor['hora_inicio'];
              $hora_inicio= $traer_datos->formathora($hora);

              echo '<form class="" action="actualizarCongreso.php?id='.$id.'" method="post" enctype="multipart/form-data">
                  <fieldset>
                    <div class="row">
                      <div class="column">
                        <legend><h5>Datos Congreso:</h5></legend>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-3">
                        <label for="">Código :</label>
                        <input type="text" name="codigo" value="'.$valor['id_congreso'].'" readonly="readonly">
                      </div>
                      <div class="column medium-3">
                        <label for="">Nombre del Evento:</label>
                        <input type="text" name="nombre" value="'.$valor['nombre_evento'].'" >
                      </div>
                      <div class="column medium-3">
                        <label for="">Lugar:</label>
                        <input type="text" name="lugar" value="'.$valor['lugar'].'" >
                      </div>
                      <div class="column medium-3">
                        <label for="">Logotipo :</label>
                        <input type="file" name="logotipo">
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-3">
                        <label for="">Desde:</label>
                        <input type="date" name="inicio" value="'.$valor['fecha_inicio'].'" >
                      </div>
                      <div class="column medium-2">
                        <label for="">:</label>
                        <input type="time" name="hora_inicio" value="'.$valor['hora_inicio'].'">
                      </div>
                      <div class="column medium-3">
                        <label for="">Hasta:</label>
                        <input type="date" name="fin" value="'.$valor['fecha_fin'].'" >
                      </div>
                      <div class="column medium-2">
                        <label for="">:</label>
                        <input type="time" name="hora_fin" value="'.$valor['hora_fin'].'">
                      </div>
                      <div class="column medium-2">
                        <label for="">Modalidad:</label>
                        <select name="modalidad" id="">
                          <option value="'.$valor['modalidad'].'">'.$valor['modalidad'].'</option>
                          <option value="Presencial">Presencial</option>
                          <option value="Virtual">Virtual</option>
                          <option value="Híbrido">Híbrido</option>
                        </select>
                      </div>      
                    </div>
                    <div class="row">
                      <div class="column medium-5">
                        <label for="">Recinto:</label>
                        <input type="text" name="recinto" value="'.$valor['recinto'].'" >
                      </div>
                      <div class="column medium-2">
                        <label for="">Idioma:</label>
                        <select name="idioma" id="">
                          <option value="'.$valor['idioma'].'">'.$valor['idioma'].'</option>
                          <option value="Español">Español</option>
                          <option value="Inglés">Inglés</option>
                        </select>
                      </div>
                      <div class="column medium-3">
                        <label for="">E-mail:</label>
                        <input type="email" name="email" value="'.$valor['email'].'">
                      </div>
                      <div class="column medium-2">
                        <label for="">Teléfono:</label>
                        <input type="number" name="telefono"  value="'.$valor['telefono'].'">
                      </div>
                    </div>
                    <div class="row">
                      <div class="column medium-3">
                        <label for="">Facebook:</label>
                        <input type="text" name="facebook"  value="'.$valor['facebook'].'">
                      </div>
                      <div class="column medium-3">
                        <label for="">Instagram:</label>
                        <input type="text" name="instagram"  value="'.$valor['instagram'].'">
                      </div>
                      <div class="column medium-3">
                        <label for="">Youtube:</label>
                        <input type="text" name="youtube"  value="'.$valor['youtube'].'">
                      </div>
                      <div class="column medium-3">
                        <label for="">Twitter:</label>
                        <input type="text" name="twitter"  value="'.$valor['twitter'].'">
                      </div>
                    </div>
                    <div class="row">
                      <div class="column medium-6">
                        <label for="">Descripción:</label>
                        <textarea name="descripcion" rows="4" cols="80" value="'.$valor['descripcion'].'">'.$valor['descripcion'].'</textarea>
                      </div>
                      <div class="column medium-6">
                        <label for="">Descripción (Inglés):</label>
                        <textarea name="descripcion_ing" rows="4" cols="80" value="'.$valor['descripcion_ing'].'">'.$valor['descripcion_ing'].'</textarea>
                      </div>
                      
                    </div>
                    <div class="row column-12 align-center">
                      <button type="submit" name=""  class="button">
                        <i class="fi-save"></i> Guardar
                      </button>
                    </div>
                  </fieldset>
                </form>';
            }
          ?>
