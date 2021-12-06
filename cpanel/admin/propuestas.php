<?php session_start();
include('../class/funciones.php');
$propuestas = new Propuesta();

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Administrador</title>
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
      <h1 class="tituloSeccion">Propuestas</h1>
      <section class="column medium-12">
        <?php
          $formateo = '%A %d %B %Y ';
          setlocale(LC_ALL, "es_ES");
          $mex = strftime($formateo);
          $total_propuestas = $propuestas->totalPropuestas($_SESSION["evento"]); 
          "<p>Propuestas Registradas: ". $total_propuestas. " </p>";

          $array_propuestas = $propuestas->listaPropuestas($_SESSION["evento"]);

          echo "<table class='tablaResultados' id='tablaPropuestas'>
                <thead>
                  <tr>
                    <th>#</th>
                    <!--<th>Folio</th>-->
                    <th>Título Propuesta</th>
                    <th>Autor</th>
                    <th>País</th>
                    <th>Ciudad</th>
                    <th>Evaluación</th>
                    <th>Acciones</th>
                    
                  </tr>
                </thead>";
                    $i=0;
                    foreach ($array_propuestas as $valor) {
                      $i += 1;

                  echo"<tr id='".$valor['id_conferencia']."'>
                        <td>".$i ."</td>
                        <!--<td>".$valor['id_conferencia']."</td>-->
                        <td><a href='descripcionPropuesta.php?id=".$valor['id_conferencia']."'>".$valor['conferencia']."<a></td>
                        <td>".$valor['nombre']." ".$valor['apellidos']."</td>
                        <td>".$valor['pais']."</td>
                        <td>".$valor['ciudad']."</td>
                        <td></td>";
                        
                        
                        // if( $valor['status'] == NULL){
                        //     echo "<td><a class='noAceptada' href='aceptarPropuesta.php?id=".$valor['id_conferencia']."'>Aprobar</a></td>";
                        // }
                        // else{
                        //   echo "<td class='aceptada'>Aceptada</a></td>";
                        // }
                  
                  echo "<td class='acciones'>
                        <!--<a href='".$valor['link']."' target='_blank' class='link_encuesta'><i class='fi-pencil'></i> Calificar </a>-->
                        <a href='eliminarPropuesta.php?id=".$valor['id_conferencia']."' title='Eliminar' class='eliminar'><i class='fi-x'></i> Eliminar</a> 
                        <!--<a href='editarEnlace.php?id=".$valor['id_conferencia']."' title='Editar Enlace' class='editarEnlace'><i class='fi-link'></i> </a></td>-->
                        </tr>"
                        ;

        }

        echo"</table>";


         ?>
      </section>
    </main>
    <footer></footer>

    <script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="../js/vendor/what-input.js" type="text/javascript"></script>
    <script src="../js/vendor/foundation.min.js" type="text/javascript"></script>
    <script charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script charset="utf8" src="https://cdn.datatables.net/1.11.3/js/dataTables.foundation.min.js"></script>

    <script charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script>
    $(document).ready(function() {
    $('#tablaPropuestas').DataTable(
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
