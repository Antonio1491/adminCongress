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
          <h4>Editar Tema</h4>
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

            $traer_datos = new Tema();
            $resultado = $traer_datos->mostrarTema($id);
            foreach ($resultado as $valor) {
              echo '<form class="" action="actualizarTema.php?id='.$id.'" method="post" enctype="multipart/form-data">
                  <fieldset>
                    <div class="row">
                      <div class="column">
                        <legend><h5>Actualizar Tema</h5></legend>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Tema:</label>
                        <input type="text" name="tema" value="'.$valor['tema'].'" placeholder="Nombre del Tema" required>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Theme (Inglés):</label>
                        <input type="text" name="tema_ing" value="'.$valor['tema_ing'].'" placeholder="Nombre de la Conferencia" >
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Tema (Portugués):</label>
                        <input type="text" name="tema_port" value="'.$valor['tema_port'].'" placeholder="Nombre de la Conferencia" >
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="file">Icono:</label>
                        <input type="file" name="icono" value="">
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
                        <label for="">Description (Inglés):</label>
                        <textarea name="descripcion_ing" rows="4" cols="80" value="'.$valor['descripcion_ing'].'">'.$valor['descripcion_ing'].'</textarea>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">descrição (Portugués):</label>
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
