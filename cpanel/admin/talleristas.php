<?php session_start();
include('../class/funciones.php');
// Crear una instancia para que se ejecute el constructor de la clase
// $usuarios = new Taller();

$taller = new Taller();
$array_talleres = $taller->listaTalleres($_SESSION["evento"]);
$array_talleristas = $taller->talleristas($_SESSION["evento"]);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Usuarios</title>
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
      <h1 class="tituloSeccion">Talleristas</h1>
      <section class="column medium-12">
     
        <!-- <div class="column medium-10 formularioRegistro"> -->
          <div class="row">
            <div class="column medium-12"><br>
              <div class="text-center">
                <button type="button" name="button" id="agregar" class="button">
                  <i class="fi-plus"></i> Agregar Tallerista
                </button>
                <a href="exportarExcel.php" class="button exportar" invalided><i class="fi-upload"></i> Exportar a Excel</a>
              </div>

            </div>
          </div>
          <div class="registro">
            <form class="" action="altaTallerista.php" method="post" enctype="multipart/form-data">
              <fieldset>
                <div class="row">
                  <div class="column">
                    <legend><h5>Información del talleristas</h5></legend>
                  </div>
                </div>
                  <div class="row ">
                    <div class="column medium-4">
                      <label for="">Nombre:</label>
                      <input type="text" name="nombre" value="" placeholder="Nombre" required>
                    </div>
                    <div class="column medium-4">
                      <label for="">Apellidos:</label>
                      <input type="text" name="apellidos" value="" placeholder="Apellidos" required>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="column medium-4">
                      <label for="">Cargo:</label>
                      <input type="text" name="cargo" value="" placeholder="Cargo" required>
                    </div>
                    <div class="column medium-4">
                      <label for="">Empresa/Institución:</label>
                      <input type="text" name="empresa" value="" placeholder="Empresa" required>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="column medium-4">
                      <label for="">Cargo (Inglés):</label>
                      <input type="text" name="cargo_ing" value="" placeholder="Cargo" required>
                    </div>
                    <div class="column medium-4">
                      <label for="">Empresa/Institución (Inglés):</label>
                      <input type="text" name="empresa_ing" value="" placeholder="Empresa" required>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="column medium-4">
                      <label for="">Cargo (Portugués):</label>
                      <input type="text" name="cargo_port" value="" placeholder="Cargo" required>
                    </div>
                    <div class="column medium-4">
                      <label for="">Empresa/Institución (Portugués):</label>
                      <input type="text" name="empresa_port" value="" placeholder="Empresa" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="column medium-8">
                      <label>Taller:
                        <select name="taller">
                          <?php
                            foreach ($array_talleres as $valor) {
                            echo "<option value='".$valor['id_taller']."'>".$valor['taller']."</option>";
                            }
                          ?>
                        </select>
                      </label>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="column medium-8">
                      <label for="">Fotografía:</label>
                      <input type="file" name="fotografia" value="" required>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="column medium-8">
                      <label for="">Biografía:</label>
                      <textarea name="biografia" rows="4" cols="1"></textarea>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="column medium-8">
                      <label for="">Biografía (Inglés):</label>
                      <textarea name="biografia_ing" rows="4" cols="1" ></textarea>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="column medium-8">
                      <label for="">Biografía (Portugués):</label>
                      <textarea name="biografia_port" rows="4" cols="1" ></textarea>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="column">
                      <input type="hidden" name="evento" value="<?php echo $_SESSION["evento"]; ?>">
                      <input type="submit" name="" value="Registrar" class="success button">
                    </div>
                  </div>
              </fieldset>
             </form>
          </div>
        <!-- </div> -->

        <div class="">
          <?php
            echo "<table class='tablaResultados' id='tablaTalleristas'>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Cargo</th>
                        <th>Empresa</th>
                        <th>Acciones</th>                         
                      </tr>
                    </thead>
                    <tbody>";
                    $num = 0;
                      foreach ($array_talleristas as $elemento) {
                        $num++;
                        echo "<tr>";
                        echo "<td>".$num ."</td>";
                        echo"<td><img src='../../img/uploads/leon/talleristas/".$elemento['fotografia']."'></td>";
                        echo "<td>" . $elemento['nombre'] . "</td>";
                        echo "<td>" . $elemento['apellidos'] . "</td>";
                        echo "<td>" . $elemento['cargo'] . "</td>";
                        echo "<td>" . $elemento['empresa'] . "</td>";
                        echo "<td class='acciones'><a href='editarTallerista.php?id=".$elemento['id_tallerista']."' title='Editar'><i class='fi-pencil'></i></a> | ";
                        echo "<a href='eliminarTallerista.php?id=".$elemento['id_tallerista']."' title='Eliminar' class='eliminar'> <i class='fi-x'></i> </a></td>";
                        echo "</tr>";
                        }
                        echo "</tbody>
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
    $('#tablaTalleristas').DataTable(
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