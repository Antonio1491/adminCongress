<?php session_start();
include('../class/funciones.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta de Talleres</title>
    <?php require ("inc/head.php") ?>
  </head>
  <body>
    <main class="row expanded">
    <div class=" medium-2">
      <?php include("inc/menuEvento.php") ?>
    </div>
    <section class="column medium-10">
    <?php include('inc/header.php'); ?>
      <h1 class="tituloSeccion">Talleres</h1>
      <div class="column medium-12">
        <div class="row">
          <div class="column medium-12 ">
            <button type="button" name="button" id="agregar" class="button">
              <i class="fi-plus"></i> Agregar Taller
            </button>
          </div>
        </div>
        <div class="registro">
          <form class="" action="altaTaller.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <div class="row">
                <div class="column">
                  <legend><h5>Registro Taller</h5></legend>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Taller:</label>
                  <input type="text" name="taller" value="" placeholder="Nombre de Taller" required>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Taller (Inglés):</label>
                  <input type="text" name="taller_ing" value="" placeholder="Nombre de Taller" required>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Taller (Portugués):</label>
                  <input type="text" name="taller_port" value="" placeholder="Nombre de Taller" required>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Subtítulo:</label>
                  <input type="text" name="subtitulo" value="" placeholder="Subtítulo Taller" required>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Subtítulo (Inglés):</label>
                  <input type="text" name="subtitulo_ing" value="" placeholder="Subtítulo Taller" required>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Subtítulo (Portugués):</label>
                  <input type="text" name="subtitulo_port" value="" placeholder="Subtítulo Taller" required>
                </div>
              </div>
              <div class="row">
                <div class="column medium-2">
                  <label for="">Fecha (00/00/0000):</label>
                  <input type="date" name="fecha" value="" placeholder="Día/Mes/Año">
                </div>
                <div class="column medium-2">
                  <label for="">Inicio:</label>
                  <input type="time" name="inicio" value="" placeholder="00:00:00">
                </div>
                <div class="column medium-2">
                  <label for="">Fin:</label>
                  <input type="time" name="fin" value="" placeholder="00:00:00">
                </div>
                <div class="column medium-2">
                  <label for="">Capacidad:</label>
                  <input type="number" name="capacidad" value="" >
                </div>
              </div>
              <div class="row ">
                <div class="column medium-5">
                  <label for="">Tallerista:</label>
                  <input type="text" name="tallerista" value="" placeholder="" >
                </div>
                <div class="column medium-3">
                  <label>Tipo de taller:
                    <select name="tipo" required>
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
                <input type="hidden" name="evento" value="<?php echo $_SESSION["evento"]; ?>">
                <input type="submit" name="" value="Registrar" class="button success">
              </div>
            </fieldset>
          </form>
        </div>

      <div class="column medium-12" id="listaConferencias">
          <?php
              $talleres = new Taller();
              $respuesta = $talleres->listaTalleres($_SESSION["evento"]);
            echo "<table class='tablaResultados' id='tablaTalleres'>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Taller</th>
                        <th>fecha</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Capacidad</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>";
                    $num = 0;
                    foreach ($respuesta as $valor) {
                        $num++;
                        echo "<tr>
                        <td>".$num ."</td>
                        <td><img src='../../img/uploads/leon/talleres/".$valor['foto']."'></td>
                        <td>" .$valor['taller']. "</td>
                        <td>" .$valor['fecha']. "</td>
                        <td>" .$valor['inicio']. "</td>
                        <td>" .$valor['fin']. "</td>
                        <td>" .$valor['capacidad']. "</td>
                        <td>" .$valor['tipo']. "</td>
                        <td class='acciones'><a href='editarTaller.php?id=".$valor['id_taller']."' title='Editar'><i class='fi-pencil'></i></a> |
                        <a href='eliminarTaller.php?id=".$valor['id_taller']."' title='Eliminar' class='eliminar'><i class='fi-x'></i> </a></td>
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
    $('#tablaTalleres').DataTable(
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
