<?php session_start();
include('../class/funciones.php');
// var_dump($_SESSION);
$usuario = new Usuario();
$dataUsuarios = json_decode($usuario->all($_SESSION["idCredencial"]));
$congresos = json_decode($usuario->congresosByUsuario($_SESSION["idCredencial"])) ;


$categorias = json_decode($usuario -> tipoUsuario());

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
      <?php include("inc/menu.php") ?>
    </div>
    <section class="column medium-10">
    <?php include('inc/header.php'); ?>
      <h1 class="tituloSeccion">Usuarios</h1>
      <section class="column medium-12">
     
        <!-- <div class="column medium-10 formularioRegistro"> -->
          <div class="row">
            <div class="column medium-12">
              <div class="text-center">
                <button type="button" name="button" id="agregar" class="button">
                  <i class="fi-plus"></i> Agregar Usuario
                </button>
              </div>
            </div>
          </div>
          <div class="registro">
            <form class="" action="altaUsuario.php" method="post" enctype="multipart/form-data">
              <fieldset>
                <div class="row">
                  <div class="column">
                    <legend><h5>Información del Usuario</h5></legend>
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
                      <label for="">Usuario:</label>
                      <input type="text" name="usuario" value="" placeholder="Cargo" required>
                    </div>
                    <div class="column medium-4">
                      <label for="">Password:</label>
                      <input type="text" name="password" value="" placeholder="Empresa" required>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="column medium-4">
                      <label for="">Fotografía:</label>
                      <input type="file" name="fotografia" value="" >
                    </div>
                    <div class="column medium-4">
                      <label for="">Tipo:</label>
                      <select name="tipo">
                        <option value="">-- Seleccione --</option>
                        <?php foreach($categorias as $categoria) : ?>
                        <option value="<?php echo $categoria->id_tipo ?>"><?php echo $categoria->tipo ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <legend><strong>Congresos:</strong></legend>
                  </div>
                  <div class="row">
                    <?php foreach($congresos as $congreso) : ?>
                    <input type="checkbox" value="<?php echo $congreso->id_congreso; ?>" name="congreso[]"><br>
                    <label for="congresos"><?php echo $congreso->nombre_evento; ?></label>
                    <?php endforeach; ?>
                  </div>

                  <div class="row align-center">
                    <div class="column-12">
                      <input type="hidden" name="evento" value="<?php echo $_SESSION["evento"]; ?>">
                      <button type="submit" name=""  class="button">
                        <i class="fi-save"></i> Guardar
                      </button>
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
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Acciones</th>                      
                      </tr>
                    </thead>
                    <tbody>";
                    // var_dump($usuarios);
                      foreach ($dataUsuarios as $usuario) {
                        echo "<tr class='usuario'>";
                        echo"<td>
                            <img src='../img/".$usuario ->fotografia."'>"
                            .$usuario->nombre . " " . $usuario->apellido . "</td>";
                        echo "<td class='tipoUsuario'>" . $usuario->tipo . "</td>";
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