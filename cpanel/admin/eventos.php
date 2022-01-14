<?php session_start();
include('../class/funciones.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Eventos</title>
    <?php require ("inc/head.php") ?>

  </head>
  <body>
    <main class="row expanded">
    <div class=" medium-2">
      <?php include("inc/menuEvento.php") ?>
    </div>
    <section class="column medium-10">
    <?php include('inc/header.php'); ?>
      <h1 class="tituloSeccion">Eventos Sociales</h1>
      <div class="column medium-12">
        <div class="row ">
          <div class="column medium-12">
            <button type="button" name="button" id="agregar" class="button">
              <i class="fi-plus"></i> Agregar Evento
            </button>
          </div>
        </div>
        <div class="registro">
          <form class="" action="altaEvento.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <div class="row">
                <div class="column">
                  <legend><h5>Registro Eventos</h5></legend>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Evento:</label>
                  <input type="text" name="evento" value="" placeholder="Evento" required>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Evento (Inglés):</label>
                  <input type="text" name="evento_ing" value="" placeholder="Evento (Inglés)" >
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Evento (Portugués):</label>
                  <input type="text" name="evento_port" value="" placeholder="Evento (Portugués)" >
                </div>
              </div>
              
              <div class="row ">
                <div class="column medium-8">
                  <label for="file">Fotografía:</label>
                  <input type="file" name="fotografia" value="">
                </div>
              </div>
              <div class="row ">
                <div class="column medium-4">
                  <label for="">Fecha:</label>
                  <input type="date" name="fecha" value="" placeholder="Fecha" required>
                </div>
                <div class="column medium-4">
                  <label for="">Hora:</label>
                  <input type="time" name="hora" value="" placeholder="Hora" required>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Lugar:</label>
                  <input type="text" name="lugar" value="" placeholder="Lugar" required>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Lugar (Inglés):</label>
                  <input type="text" name="lugar_ing" value="" placeholder="Lugar (Inglés)" >
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Lugar (Portugués):</label>
                  <input type="text" name="lugar_port" value="" placeholder="Lugar (Portugués)" >
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
                  <label for="">Descripción (Inglés):</label>
                  <textarea name="descripcion_ing" rows="4" cols="80"></textarea>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Descripción (Portugués):</label>
                  <textarea name="descripcion_port" rows="4" cols="80"></textarea>
                </div>
              </div>
              <div class="row ">
              <input type="hidden" name="congreso" value="<?php echo $_SESSION["evento"]; ?>">
                <input type="submit" name="" value="Registrar" class="button success">
              </div>
            </fieldset>
          </form>
        </div>

      <div class="" id="listaConferencias">
          <?php
              $talleres = new Evento();
              $respuesta = $talleres->listaEventos($_SESSION["evento"]);
            echo "<table class='tablaResultados' id='tablaFiestas'>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>evento</th>
                        <th>fecha</th>
                        <th>hora</th>
                        <th>lugar</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>";
                    $num = 0;
                    foreach ($respuesta as $valor) {
                        $num++;
                        echo "<tr>
                        <td>".$num ."</td>
                        <td>" .$valor['evento']. "</td>
                        <td>" .$valor['fecha']. "</td>
                        <td>" .$valor['hora_inicio']." - ".$valor['hora_fin']."</td>
                        <td>" .$valor['lugar']. "</td>
                        <td class='acciones'><a href='editarEvento.php?id=".$valor['id_evento']."' title='Editar'><i class='fi-pencil'></i></a> |
                        <a href='eliminarEvento.php?id=".$valor['id_evento']."' title='Eliminar' class='eliminar'><i class='fi-x'></i> </a></td>
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

    <script charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script charset="utf8" src="https://cdn.datatables.net/1.11.3/js/dataTables.foundation.min.js"></script>

    <script charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script>
    $(document).foundation();

    $(document).ready(function(){
    $("#agregar").click(function(){
      $(".registro").fadeToggle();
    });
    });
    </script>
        <script>
    $(document).ready(function() {
    $('#tablaFiestas').DataTable(
      {
        "processing": true,
          "order": [[ 0, "asc" ]],
          "pageLength" : 15,
          "lengthMenu" : [15, 20, 50, 100, 200, 500],
          "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
          },
          
      }
    );
} );
  </script> 
  <?php require('inc/footer.php') ?>
  </body>
</html>
