<?php session_start();
include('../class/funciones.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Expositores</title>
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
      <h1 class="tituloSeccion">Expositores</h1>
      <div class="column medium-12">
        <div class="row">
          <div class="column medium-12 ">
            <button type="button" name="button" id="agregar" class="button">
              <i class="fi-plus"></i> Agregar Expositor
            </button>
          </div>
        </div>
        <div class="registro">
          <form class="" action="altaExpositor.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <div class="row">
                <div class="column">
                  <legend><h5>Registro Patrocinador</h5></legend>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-6">
                  <label for="">Expositor/Empresa:</label>
                  <input type="text" name="expositor" value="" placeholder="Nombre de la Empresa" required>
                </div>
                <div class="column medium-6">                  
                    <label for="">Página Web:</label>
                    <input type="text" name="web" value="" placeholder="Enlace a sitio web" >                
                  </div>
              </div>
              <div class="row ">
                <div class="column medium-6">
                  <label for="">E-mail de contacto:</label>
                  <input type="text" name="email" value="" placeholder="E-mail del Representante" required>
                </div>
                <div class="column medium-6">                  
                    <label for="">Nombre del Representante:</label>
                    <input type="text" name="representante" value="" placeholder="Nombre del Representante" >                
                  </div>
              </div>
              <div class="row">
                  
                  <div class="column medium-6">
                    <label for="file">Imagen para slider sección expo (269px por 125px):</label>
                    <input type="file" name="imagen" value="">
                  </div>
              </div>
              <div class="row ">
                
              </div>
              <div class="row ">
                <input type="hidden" name="evento" value="<?php echo $_SESSION["evento"]; ?>">
                <input type="submit" name="submit" value="Registrar" class="button success">
              </div>
            </fieldset>
          </form>
        </div>

      <div class="" id="listaPatrocinadores">
          <?php
              $expositores = new Expositor();
              $respuesta = $expositores->getExpositores($_SESSION["evento"]);
            echo "<table class='tablaResultados' id='tablaExpositores'>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Expositor</th>
                        <th>Representante</th>
                        <th>E-mail</th>
                        <th>Web</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>";
                    $num = 0;
                    foreach ($respuesta as $valor) {
                        $num++;
                        echo "<tr>
                        <td>".$num."</td>
                        <td>" .$valor['nombre_expositor']. "</td>
                        <td>" .$valor['representante']. "</td>
                        <td>" .$valor['email']. "</td>
                        <td>" .$valor['url']. "</td>
                        <td><img src='../../img/uploads/expositores/".$valor['imagen']."'></td>
                        <td class='acciones'><a href='editarExpositor.php?id=".$valor['id_expositor']."' title='Editar'><i class='fi-pencil'></i></a> |
                        <a href='eliminarExpositor.php?id=".$valor['id_expositor']."' title='Eliminar' class='eliminar'><i class='fi-x'></i> </a></td>
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
    <!-- <script type="text/javascript" src="../js/app.js"></script> -->
    
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
    $('#tablaExpositores').DataTable(
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