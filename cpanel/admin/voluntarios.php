<?php session_start();
include('../class/funciones.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Voluntarios</title>
    <?php require ("inc/head.php") ?>

  </head>
  <body>
    <main class="row expanded">
    <div class=" medium-2">
      <?php include("inc/menuEvento.php") ?>
    </div>
    <section class="column medium-10">
    <?php include('inc/header.php'); ?>
      <h1 class="tituloSeccion">Voluntarios</h1>
        <div class="column medium-12">
        <div class="" id="listaConferencias">
            <?php
                $voluntarios = new Voluntarios();
                $respuesta = $voluntarios->voluntarios($_SESSION["evento"]);
                echo "<table class='tablaResultados' id='tablaVoluntarios'>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>email</th>
                            <th>cel</th>
                            <th>universidad</th>
                            <th>Turno</th>
                            <th>Fecha</th>
                            <th>Inicio</th>
                            <th>Fin</th>
                        </tr>
                        </thead>
                        <tbody>";
                        $num = 0;
                        foreach ($respuesta as $valor) {
                            $num++;
                            echo "<tr>
                            <td>".$num ."</td>
                            <td><a href='infoVoluntario.php?id=".$valor['id_voluntario']."' >" .$valor['nombre']. " " .$valor['apellido_paterno']. " " .$valor['apellido_materno']. "</a></td>
                            <td>" .$valor['email']. "</td>
                            <td>" .$valor['celular']."</td>
                            <td>" .$valor['universidad']. "</td>
                            <td>" .$valor['turno']. "</td>
                            <td>" .$valor['fecha']. "</td>
                            <td>" .$valor['hora_inicio']. "</td>
                            <td>" .$valor['hora_fin']. "</td>
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
    $('#tablaVoluntarios').DataTable(
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
