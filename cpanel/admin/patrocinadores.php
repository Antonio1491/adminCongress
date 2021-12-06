<?php session_start();
include('../class/funciones.php');
$patrocinadores = new Patrocinador();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Patrocinadores</title>
    
    <?php require ("inc/head.php") ?>
  </head>
  <body>
    <main class="row expanded">
    <div class=" medium-2">
      <?php include("inc/menuEvento.php");
       ?>
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
      <h1 class="tituloSeccion">Patrocinadores</h1>

      <div class="column medium-12">
        <div class="row">
          <div class="column medium-12">
            <button type="button" name="button" id="agregar" class="button">
              <i class="fi-plus"></i> Agregar Patrocinador
            </button>
          </div>
        </div>
        <div class="registro">
          <form class="" action="altaPatrocinador.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <div class="row">
                <div class="column">
                  <legend><h5>Registro Patrocinador</h5></legend>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Nombre Patrocinador:</label>
                  <input type="text" name="patrocinador" value="" placeholder="Nombre del patrocinador" required>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-4">
                  <label for="">Web:</label>
                  <input type="text" name="web" value="" placeholder="Enlace a sitio web" >
                </div>
                <div class="column medium-4">
                  <label>Categoría:
                    <select name="categoria" required>
                      <?php
                          $categorias = $patrocinadores->getCategoriasPatrocinadores();
                          foreach($categorias as $categoria)
                          {
                            echo '<option value="'.$categoria['id_categoria'].'">'.$categoria['categoria'].'</option>';
                          }
                      ?>
                    </select>
                  </label>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="file">Imagen banner principal (300 x 125):</label>
                  <input type="file" name="imagenBanner" value="">
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="file">Imagen sección patrocinadores (foto geometrica):</label>
                  <input type="file" name="imagenSeccion" value="">
                </div>
              </div>
              <div class="row align-center">
                <input type="hidden" name="evento" value="<?php echo $_SESSION["evento"]; ?>">
                <button type="submit" name="createCustomer"  class="button">
                  <i class="fi-save"></i> Guardar
                </button>
              </div>
            </fieldset>
          </form>
        </div>

      <div id="listaPatrocinadores">
          <?php
              $respuesta = $patrocinadores->patrocinadores($_SESSION["evento"]);
            echo "<table class='tablaResultados' id='tablaPatrocinadores'>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Logotipo</th>
                        <th>Patrocinador</th>
                        <th>Categoría</th>
                        <th>Web</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>";
                    $num = 0;
                    foreach ($respuesta as $valor) {
                        $num++;
                        echo "<tr>
                        <td>".$num ."</td>
                        <td>" .$valor['patrocinador']. "</td>
                        <td>" .$valor['tipo']. "</td>
                        <td>" .$valor['link']. "</td>
                        <td><img src='./../../".$_SESSION["evento"]."/img/".$valor['imagen_banner']."'></td>
                        <td class='acciones'><a href='editarPatrocinador.php?id=".$valor['id_patrocinador']."' title='Editar'><i class='fi-pencil'></i></a> |
                        <a href='eliminarPatrocinador.php?id=".$valor['id_patrocinador']."' title='Eliminar' class='eliminar'><i class='fi-x'></i> </a></td>
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
    $('#tablaPatrocinadores').DataTable(
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