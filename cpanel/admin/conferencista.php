<?php session_start();
include('../class/funciones.php');
// Crear una instancia para que se ejecute el constructor de la clase
$usuarios = new Conferencistas();
$array_usuarios = $usuarios->get_usuarios($_SESSION["evento"]);
$conferencias = new Conferencia();
$array_conferencias = $conferencias->listaConferencias($_SESSION["evento"]);
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
    <?php include('inc/header.php'); ?>
      <h1 class="tituloSeccion">Conferencistas</h1>
      <section class="column medium-12">
        <!-- <div class="column medium-10 formularioRegistro"> -->
          <div class="row">
            <div class="column medium-12">
              <div class="">
                <button type="button" name="button" id="agregar" class="button">
                  <i class="fi-plus"></i> Agregar Usuario
                </button>
                <a href="exportarExcel.php" class="button exportar" invalided><i class="fi-upload"></i> Exportar a Excel</a>
              </div>

            </div>
          </div>
          <div class="registro">
            <form class="" action="altaConferencista.php" method="post" enctype="multipart/form-data">
              <fieldset>
                <div class="row">
                  <div class="column">
                    <legend><h5>Información del ponente</h5></legend>
                  </div>
                 </div>
                 <div class="row ">
                   <div class="column medium-4">
                      <label for="">Usuario (e-mail):</label>
                      <input type="text" name="usuario" value="" placeholder="E-mail" required>
                   </div>
                   <div class="column medium-4">
                      <label for="">Password:</label>
                      <input type="text" name="password" value="" placeholder="Password" required>
                   </div>
                   <div class="column medium-2">
                      <label for="">Prioridad:</label>
                      <select class="" name="prioridad">
                        <option value="1">Alta</option>
                        <option value="2">Media</option>
                        <option value="3">Baja</option>
                      </select>
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
                      <label for="">Empresa:</label>
                      <input type="text" name="empresa" value="" placeholder="Empresa" required>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="column medium-4">
                      <label for="">Cargo (Inglés):</label>
                      <input type="text" name="cargo_ing" value="" placeholder="Cargo" required>
                    </div>
                    <div class="column medium-4">
                      <label for="">Empresa (Inglés):</label>
                      <input type="text" name="empresa_ing" value="" placeholder="Empresa" required>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="column medium-4">
                      <label for="">Cargo (Portugués):</label>
                      <input type="text" name="cargo_port" value="" placeholder="Cargo" required>
                    </div>
                    <div class="column medium-4">
                      <label for="">Empresa (Portugués):</label>
                      <input type="text" name="empresa_port" value="" placeholder="Empresa" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="column medium-8">
                      <label>Conferencia:
                        <select name="conferencia">
                          <?php
                            foreach ($array_conferencias as $valor) {
                            echo "<option value='".$valor['id_conferencia']."'>".$valor['conferencia']."</option>";
                            }
                          ?>
                        </select>
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="column medium-4">
                      <label for="">País:</label>
                      <input type="text" name="pais" value="" placeholder="País" required>
                    </div>
                    <div class="column medium-4">
                      <label for="">Ciudad:</label>
                      <input type="text" name="ciudad" value="" placeholder="Ciudad" required>
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
            echo "<table class='tablaResultados' id='tablaConferencistas'>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th>Empresa</th>
                        <th>País</th>
                        <th>Ciudad</th>
                        <th>Imagen</th>
                        <th>Material</th>
                        <th>Fiesta</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>";
                    $num = 0;
                      foreach ($array_usuarios as $elemento) {
                        $num++;
                        echo "<tr>";
                        echo "<td>".$num ."</td>";
                        echo"<td><img src='../../img/uploads/leon/conferencistas/".$elemento['foto']."'></td>";
                        echo "<td>" . $elemento['nombre'] . " " . $elemento['apellidos'] . "</td>";
                        echo "<td>" . $elemento['cargo'] . "</td>";
                        echo "<td>" . $elemento['empresa'] . "</td>";
                        echo "<td>" . $elemento['pais'] . "</td>";
                        echo "<td>" . $elemento['ciudad'] . "</td>";
                        echo "<td>".$tipoFirma = $usuarios->firma($elemento['autoriza1'])."</td>";
                        echo "<td>".$tipoFirma = $usuarios->firma($elemento['autoriza2'])."</td>";
                        echo "<td>".$tipoFirma = $usuarios->firma($elemento['evento_social'])."</td>";
                        echo "<td class='acciones'><a href='editarConferencista.php?id=".$elemento['id_conferencista']."' title='Editar'><i class='fi-pencil'></i></a> | ";
                        echo "<a href='eliminarConferencista.php?id=".$elemento['id_conferencista']."' title='Eliminar' class='eliminar'> <i class='fi-x'></i> </a></td>";
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
    $('#tablaConferencistas').DataTable(
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
