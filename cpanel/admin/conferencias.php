<?php session_start();
include('../class/funciones.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta de Conferencias</title>
    <?php require ("inc/head.php") ?>
    
  </head>
  <body>
    <main class="row expanded">
    <div class=" medium-2">
      <?php include("inc/menuEvento.php") ?>
    </div>
    <section class="column medium-10">
    <header>
        <div class="">
          <h4></h4>
        </div>
        <div class="menuTop">
          <a href="index.php"><i class="fi-home"></i></a>
          <a href="closet.php"><i class="fi-power"></i></a>
        </div>
      </header>
      <h1 class="tituloSeccion">Conferencias</h1>
      <div class="column medium-12">
        <div class="row">
          <div class="column medium-12">
            <button type="button" name="button" id="agregar" class="button">
              <i class="fi-plus"></i> Agregar Conferencia
            </button>
          </div>
        </div>
        <div class="registro">
          <form class="" action="altaConferencias.php" method="post">
            <fieldset>
              <div class="row">
                <div class="column">
                  <legend><h5>Registro Conferencias</h5></legend>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Conferencia:</label>
                  <input type="text" name="conferencia" value="" placeholder="Nombre de la Conferencia" required>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Conferencia (Inglés):</label>
                  <input type="text" name="conferencia_ing" value="" placeholder="Nombre de la Conferencia" required>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Conferencia (Portugués):</label>
                  <input type="text" name="conferencia_port" value="" placeholder="Nombre de la Conferencia" required>
                </div>
              </div>
              <div class="row">
                <div class="column medium-2">
                  <label for="">Fecha (00/00/0000):</label>
                  <input type="date" name="fecha" value="" placeholder="Día/Mes/Año">
                </div>
                <div class="column medium-2">
                  <label for="">Hora Inicio:</label>
                  <input type="time" name="inicio" value="" placeholder="00:00:00">
                </div>
                <div class="column medium-2">
                  <label for="">Hora Fin:</label>
                  <input type="time" name="fin" value="" placeholder="00:00:00">
                </div>
                <div class="column medium-2">
                  <label for="">Lugar:</label>
                  <input type="text" name="lugar" value="">
                </div>
              </div>
              <div class="row ">
                <div class="column medium-4">
                  <label>Tema:
                    <select name="tema">
                      <?php
                          $lista_de_temas = new Conferencia();
                          $lista = $lista_de_temas->temas();
                          foreach ($lista as $valor) {
                            echo "<option value='".$valor['id_tema']."'>".$valor['tema']."</option>";

                          }
                      ?>
                    </select>
                  </label>
                </div>
                <div class="column medium-4">
                  <label>Tipo:
                    <select name="tipo">
                      <?php
                          $lista_tipo = new Conferencia();
                          $lista = $lista_de_temas->conferenciaTipo();
                          foreach ($lista as $valor) {
                            echo "<option value='".$valor['id_tipo']."'>".$valor['tipo']."</option>";
                          }
                      ?>
                    </select>
                  </label>
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
                  <label for="">Descripción: (Inglés)</label>
                  <textarea name="descripcion_ing" rows="4" cols="80"></textarea>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Descripción: (Portugués)</label>
                  <textarea name="descripcion_port" rows="4" cols="80"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="column medium-8">
                  <label for="">Objetivo 1:</label>
                  <textarea name="objetivo1" rows="1" cols="80" placeholder="La sesión debe contar con objetivos de aprendizaje, claros y medibles." required></textarea>
                </div>
              </div>
              <div class="row">
                <div class="column medium-8">
                  <label for="">Objetivo 2:</label>
                  <textarea name="objetivo2" rows="1" cols="80" placeholder="La sesión debe contar con objetivos de aprendizaje, claros y medibles." required></textarea>
                </div>
              </div>
              <div class="row">
                <div class="column medium-8">
                  <label for="">Objetivo 3:</label>
                  <textarea name="objetivo3" rows="1" cols="80" placeholder="La sesión debe contar con objetivos de aprendizaje, claros y medibles." required></textarea>
                </div>
              </div>
              <div class="row ">
              <input type="hidden" name="evento" value="<?php echo $_SESSION["evento"]; ?>">
                <input type="submit" name="" value="Registrar" class="button success">
              </div>
            </fieldset>
          </form>
        </div>

      <div class="" id="listaConferencias">
          <?php
              $lista_conferencias = new Conferencia();
              $respuesta = $lista_conferencias->listaConferencias($_SESSION["evento"]);
            echo "<table class='tablaResultados' id='tablaConferencias'>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Lugar</th>
                        <th>calendar</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>";
                    $num = 0;
                    foreach ($respuesta as $valor) {
                        $num++;
                        echo "<tr>
                        <td>".$num ."</td>
                        <td>" .$valor['conferencia']. "</td>
                        <td>" .$valor['fecha']. "</td>
                        <td>" .$valor['inicio']. "</td>
                        <td>" .$valor['fin']. "</td>
                        <td>" .$valor['salon']. "</td>
                        <td>
                        <a href='" .$lista_conferencias->linkGoogleCalendar($valor['id_conferencia'])."' target='_blank'>
                        <img src='https://lh3.ggpht.com/oGR9I1X9No3SfFEXrq655tETtVVzI3jIphhmEVPGPEVuM5gfwh8lOGWHQFf6gjSTvw=s180' border='0'></a>
                         </td>
                        <td class='acciones'><a href='editarConferencia.php?id=".$valor['id_conferencia']."' title='Editar'><i class='fi-pencil'></i></a> |
                        <a href='eliminarConferencia.php?id=".$valor['id_conferencia']."' title='Eliminar' class='eliminar'><i class='fi-x'></i> </a></td>
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
    $('#tablaConferencias').DataTable(
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
  

  </body>
</html>
