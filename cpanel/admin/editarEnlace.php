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
          <h4>Conferencias</h4>
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

            $traer_datos = new Propuesta();

            $resultado = $traer_datos->descripcionPropuesta($id);

            foreach ($resultado as $valor) {

            echo '<form class="" action="actualizarEncuesta.php?id='.$id.'" method="post">
                  <fieldset>
                    <div class="row">
                      <div class="column medium-8">
                        <legend><h5>Edición de enlace para evaluar</h5></legend>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Propuesta:</label>
                        <input type="text" name="conferencia" value="'.$valor['conferencia'].'" placeholder="Nombre de la Conferencia" disabled>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Enlace:</label>
                        <input type="text" name="enlace" value="'.$valor['link'].'" placeholder="" required>
                      </div>
                    </div>
                   
                    <div class="row ">
                      <input type="submit" name="submit" value="Actualizar" class="button success">
                    </div>
                  </fieldset>
              </form>

          </div>';
}
 ?>


