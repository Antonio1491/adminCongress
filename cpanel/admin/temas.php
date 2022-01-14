<?php session_start();
include('../class/funciones.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Ejes Temáticos</title>
    <?php require ("inc/head.php") ?>

  </head>
  <body>
    <main class="row expanded">
    <div class=" medium-2">
      <?php include("inc/menuEvento.php") ?>
    </div>
    <section class="column medium-10">
    <?php include('inc/header.php'); ?>
      <h1 class="tituloSeccion">Temas</h1>
      <div class="column medium-12">
        <div class="row">
          <div class="column medium-12 ">
            <button type="button" name="button" id="agregar" class="button">
              <i class="fi-plus"></i> Agregar Tema
            </button>
          </div>
        </div>
        <div class="registro">
          <form class="" action="altaTema.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <div class="row">
                <div class="column">
                  <legend><h5>Registro Eje Temático</h5></legend>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Tema:</label>
                  <input type="text" name="tema" value="" placeholder="Eje Temático" required>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Theme (Inglés):</label>
                  <input type="text" name="tema_ing" value="" placeholder="Nombre de la Conferencia" >
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Eixo (Portugués):</label>
                  <input type="text" name="tema_port" value="" placeholder="Nombre de la Conferencia" >
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="file">Icono:</label>
                  <input type="file" name="icono" value="">
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
                  <label for="">Description (Inglés):</label>
                  <textarea name="descripcion_ing" rows="4" cols="80"></textarea>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Descrição (Portugués):</label>
                  <textarea name="descripcion_port" rows="4" cols="80"></textarea>
                </div>
              </div>
              <div class="row ">
                <input type="submit" name="" value="Registrar" class="button success">
              </div>
            </fieldset>
          </form>
        </div>

      <div class="row" id="listaConferencias">
          <?php
              $talleres = new Tema();
              $respuesta = $talleres->listaTemas();
            echo "<table class='tablaResultados'>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Icono</th>
                        <th>Nombre Tema</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>";
                    $num = 0;
                    foreach ($respuesta as $valor) {
                        $num++;
                        echo "<tr>
                        <td>".$num ."</td>
                        <td><img src='https://www.congresoparques.com/img/ejes_tematicos/mexico/".$valor['icono']."'></td>
                        <td>" .$valor['tema']. "</td>
                        <td>" .$valor['descripcion']. "</td>

                        <td class='acciones'><a href='editarTema.php?id=".$valor['id_tema']."' title='Editar'><i class='fi-pencil'></i></a> |
                        <a href='eliminarTema.php?id=".$valor['id_tema']."' title='Eliminar' class='eliminar'><i class='fi-x'></i> </a></td>
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
    <script>
    $(document).foundation();

    $(document).ready(function(){
    $("#agregar").click(function(){
      $(".registro").fadeToggle();
    });
    });
    </script>
     <?php require('inc/footer.php') ?>
  </body>
</html>
