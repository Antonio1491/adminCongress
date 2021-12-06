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
    <header>
      <div class="rows">
        <div class="column medium-10 medium-offset-2 text-center">
          <h4>Propuestas</h4>
        </div>
      </div>
    </header>
    <main class="row expanded">
      <div class="medium-2">
        <?php include("inc/menu_consejo.php") ?>
      </div>
      <section class="column medium-10">
        <?php
          $formateo = '%A %d %B %Y ';
          setlocale(LC_ALL, "es_ES");
          $mex = strftime($formateo);
          $total_propuestas = $propuestas->totalPropuestas("CPSG2020"); echo "<br><p>Propuestas Registradas: ". $total_propuestas. " </p>";

          $array_propuestas = $propuestas->listaPropuestas("CPSG2020");

          echo "<table class='tablaResultados'>
                <thead>
                  <tr>
                    <th>#</th>
                    <!--<th>Folio</th>-->
                    <th>Propuesta</th>
                    <th>Modalidad</th>
                    <th>Autor</th>
                    <th>País</th>
                    <th>Ciudad</th>
                    <th>Calificar</th>
                    
                  </tr>
                </thead>";
                    $i=0;
                    foreach ($array_propuestas as $valor) {
                      $i += 1;

                  echo"<tr id='".$valor['id_conferencia']."'>
                        <td>".$i ."</td>
                        <!--<td>".$valor['id_conferencia']."</td>-->
                        <td><a href='descripcionPropuesta.php?id=".$valor['id_conferencia']."'>".$valor['conferencia']."<a></td>
                        <td>".$valor['modalidad']."</td>
                        <td>".$valor['nombre']." ".$valor['apellidos']."</td>
                        <td>".$valor['pais']."</td>
                        <td>".$valor['ciudad']."</td>";
                        if(empty($valor['link'])){
                          echo "<td> </td>";
                        }
                        else{
                          echo "<td><a href='".$valor['link']."' target='_blank' class='link_encuesta'> Calificar </a></td>
                          ";
                        }
                        
                        

        }

        echo"</table>";


         ?>
      </section>
    </main>
    <footer></footer>

  <script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
  <script src="../js/what-input.js" type="text/javascript"></script>
  <script src="../js/foundation.min.js" type="text/javascript"></script>
  <script>
    $(document).foundation();
  </script>

  </body>
</html>
