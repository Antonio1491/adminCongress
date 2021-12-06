<?php session_start();
include('../class/funciones.php');

$usuario = new Usuario();

$dataUsuarios = json_decode($usuario->all($_SESSION["evento"]));

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
            <form class="" action="altaTaUsuario.php" method="post" enctype="multipart/form-data">
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
                      <input type="text" name="cargo" value="" placeholder="Cargo" required>
                    </div>
                    <div class="column medium-4">
                      <label for="">Password:</label>
                      <input type="text" name="empresa" value="" placeholder="Empresa" required>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="column medium-4">
                      <label for="">fotografía:</label>
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
                        <th>Categoría</th>
                        <th>Acciones</th>                      
                      </tr>
                    </thead>
                    <tbody>";
                    $num = 0;
                    // var_dump($usuarios);
                      foreach ($dataUsuarios as $usuario) {
                        $num++;
                        echo "<tr>";
                        echo "<td>".$num ."</td>";
                        echo"<td><img src='../../img/uploads/leon/talleristas/".$usuario ->fotografia."'></td>";
                        echo "<td>" . $usuario->nombre . "</td>";
                        echo "<td>" . $usuario->apellido . "</td>";
                        echo "<td>" . $usuario->tipo . "</td>";
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