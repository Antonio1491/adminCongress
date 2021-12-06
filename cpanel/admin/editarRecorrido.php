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
          <h4>Editar Recorrido</h4>
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

            $traer_datos = new Recorrido();
            $resultado = $traer_datos->mostrarRecorrido($id);
            foreach ($resultado as $valor) {
              echo '<form class="" action="actualizarRecorrido.php?id='.$id.'" method="post" enctype="multipart/form-data">
                  <fieldset>
                    <div class="row">
                      <div class="column">
                        <legend><h5>Actualizar Recorrido</h5></legend>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Recorrido:</label>
                        <input type="text" name="recorrido" value="'.$valor['recorrido'].'" placeholder="Recorrido" required>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Travel (Inglés):</label>
                        <input type="text" name="recorrido_ing" value="'.$valor['recorrido_ing'].'" placeholder="Recorrido (Inglés)" >
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Visita Turística (Portugués):</label>
                        <input type="text" name="recorrido_port" value="'.$valor['recorrido_port'].'" placeholder="Recorrido (Portugués)" >
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Subtítulo:</label>
                        <input type="text" name="subtitulo" value="'.$valor['subtitulo'].'" placeholder="Subtítulo" >
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Subtitle (Inglés):</label>
                        <input type="text" name="subtitulo_ing" value="'.$valor['subtitulo_ing'].'" placeholder="Subtítulo (Inglés)" >
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Subtítulo (Portugués):</label>
                        <input type="text" name="subtitulo_port" value="'.$valor['subtitulo_port'].'" placeholder="Subtítulo (Portugués)" >
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Descripción:</label>
                        <textarea name="descripcion" rows="4" cols="80" value="'.$valor['descripcion'].'"></textarea>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Description (Inglés):</label>
                        <textarea name="descripcion_ing" rows="4" cols="80" value="'.$valor['descripcion_ing'].'"></textarea>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Descrição (Portugués):</label>
                        <textarea name="descripcion_port" rows="4" cols="80" value="'.$valor['descripcion_port'].'"></textarea>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-2">
                        <label for="">Precio:</label>
                        <input type="number" step="any" name="precio" placeholder="$" value="'.$valor['precio'].'">
                      </div>
                      <div class="column medium-2">
                        <label for="">Price:</label>
                        <input type="number" step="any" name="precio_dolares" placeholder="$ USD" value="'.$valor['precio_dolares'].'">
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Nota:</label>
                        <input type="text" name="nota" value="'.$valor['nota'].'" placeholder="Notas" >
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Note (Inglés):</label>
                        <input type="text" name="nota_ing" value="'.$valor['nota_ing'].'" placeholder="Notas (Inglés)" >
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Nota (Portugués):</label>
                        <input type="text" name="nota_port" value="'.$valor['nota_port'].'" placeholder="Notas (Portugués)" >
                      </div>
                    </div>
                    <div class="row ">
                      <input type="submit" name="" value="Actualizar" class="button success">
                    </div>
                  </fieldset>
                </form>';
            }
          ?>
