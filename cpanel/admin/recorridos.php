<?php session_start();
include('../class/funciones.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Ejes Temáticos</title>
    <?php require ("inc/head.php") ?>

  </head>
  <body>
    <header>
      <div class="rows">
        <div class="column medium-10 medium-offset-2 text-center">
          <h4>Recorridos Turísticos</h4>
        </div>
      </div>
    </header>
    <main class="row expanded">
      <div class="medium-2">
        <?php include("inc/menu.php") ?>
      </div>
      <div class="column medium-10">
      <div class="row text-center">
          <div class="column medium-12 text-center"><br>
            <button type="button" name="button" id="agregar" class="button">
              <i class="fi-plus"></i> Agregar Recorrido Turístico
            </button>
          </div>
        </div>
        <div class="registro">
          <form class="" action="altaRecorrido.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <div class="row">
                <div class="column">
                  <legend><h5>Registro Recorrido Turístico</h5></legend>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Recorrido:</label>
                  <input type="text" name="recorrido" value="" placeholder="Recorrido" required>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Travel (Inglés):</label>
                  <input type="text" name="recorrido_ing" value="" placeholder="Recorrido (Inglés)" >
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Visita Turística (Portugués):</label>
                  <input type="text" name="recorrido_port" value="" placeholder="Recorrido (Portugués)" >
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Subtítulo:</label>
                  <input type="text" name="subtitulo" value="" placeholder="Subtítulo" >
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Subtitle (Inglés):</label>
                  <input type="text" name="subtitulo_ing" value="" placeholder="Subtítulo (Inglés)" >
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Subtítulo (Portugués):</label>
                  <input type="text" name="subtitulo_port" value="" placeholder="Subtítulo (Portugués)" >
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Descripción:</label>
                  <textarea name="descripcion" rows="4" cols="80"></textarea>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Description (Inglés):</label>
                  <textarea name="descripcion_ing" rows="4" cols="80"></textarea>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Descrição (Portugués):</label>
                  <textarea name="descripcion_port" rows="4" cols="80"></textarea>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-2">
                  <label for="">Precio:</label>
                  <input type="number" step="any" name="precio" placeholder="$">
                </div>
                <div class="column medium-2">
                  <label for="">Price:</label>
                  <input type="number" step="any" name="precio_dolares" placeholder="$ USD">
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Nota:</label>
                  <input type="text" name="nota" value="" placeholder="Notas" >
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Note (Inglés):</label>
                  <input type="text" name="nota_ing" value="" placeholder="Notas (Inglés)" >
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Nota (Portugués):</label>
                  <input type="text" name="nota_port" value="" placeholder="Notas (Portugués)" >
                </div>
              </div>
              <div class="row ">
                <input type="hidden" name="evento" value="CPL2020">
                <input type="submit" name="" value="Registrar" class="button success">
              </div>
            </fieldset>
          </form>
        </div>

      <div class="row" id="listaConferencias">
          <?php
              $talleres = new Recorrido();
              $respuesta = $talleres->listaRecorridos();
            echo "<table class='tablaResultados'>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Recorrido</th>
                        <th>Subtitulo</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>";
                    $num = 0;
                    foreach ($respuesta as $valor) {
                        $num++;
                        echo "<tr>
                        <td>".$num ."</td>

                        <td>" .$valor['recorrido']. "</td>
                        <td>" .$valor['subtitulo']. "</td>
                        <td> $ " .$valor['precio']. "</td>
                        <td class='acciones'><a href='editarRecorrido.php?id=".$valor['id_recorrido']."' title='Editar'><i class='fi-pencil'></i></a> |
                        <a href='eliminarRecorrido.php?id=".$valor['id_recorrido']."' title='Eliminar' class='eliminar'><i class='fi-x'></i> </a></td>
                        </tr>";
                      }
                    echo "
                    </tbody>
                  </table>";
           ?>

      </div>
    </div>

    </main>
    <footer></footer>
    <script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="../js/vendor/what-input.js" type="text/javascript"></script>
    <script src="../js/vendor/foundation.min.js" type="text/javascript"></script>
    <script>
    $(document).foundation();

    $(document).ready(function(){
    $("#agregar").click(function(){
      $(".registro").fadeToggle();
    });
    });
    </script>
  </body>
</html>
