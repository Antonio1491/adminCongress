<?php session_start();
include('../class/funciones.php');
$id = $_GET['id']; ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Datos Propuesta</title>
    <?php require ("inc/head.php") ?>
    <script  src="../js/foundation.min.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/what-input.js"></script>
    <script>
     $(document).foundation();
   </script>

  </head>
  <body>
    <header>
      <div class="rows">
        <div class="column medium-10 medium-offset-2 text-center">
          <h4>Datos Propuesta</h4>
        </div>
      </div>
    </header>
    <main class="row expanded">
      <div class="medium-2">
        <?php include("inc/menu.php") ?>
      </div>
      <section class="column medium-10">
        <?php
          $datos = new Propuesta();
          $array_descripcion = $datos->descripcionPropuesta($id);
          foreach ($array_descripcion as $valor) {
            ?>
            <section class="contentPropuesta">
              <div class="row align-center">
              <?php
                echo "<h5>".$valor['conferencia']."</h5>";
              ?>
              </div>
            <div class="row  infoPropuesta">
              <div class="column medium-12">
            <?php
              echo "<p><span>Modalidad: </span>".$valor['modalidad']."<br>";
              echo "<span>Tema: </span>".$valor['tema']."</p>";
              echo "<p><span>Descripción: </span>".$valor['descripcion']."</p>";
              echo "<p><span>Justificación:</span> ".$valor['justificacion']."</p>";
              echo "<p><span>Objetivo 1:</span> ".$valor['objetivo1']."</p>";
              echo "<p><span>Objetivo 2:</span> ".$valor['objetivo2']."</p>";
              echo "<p><span>Objetivo 3:</span> ".$valor['objetivo3']."</p>";
          }
            ?>
              </div>
            </div>
        </section>
        <?php
          $autores = $datos->mostrarAutores($id);
          foreach ($autores as $valor) {
        ?>
        <div class="row datosConferencista">
          <div class="column medium-2">
          <?php
            echo "<img src='https://www.congresoparques.com/guayaquil/registros/uploads/".$valor['foto']."' class='fotoAutor'>";
          ?>
          </div>
          <div class="column medium-10">
          <?php
            echo "<span>Nombre: </span> ".$valor['nombre']." ".$valor['apellidos']."<br>";
            echo "<span>Email: </span> ".$valor['email']."<br>";
            echo "<span>Email Asistente: </span> ".$valor['emailAsistente']."</br>";
            echo "<span>Teléfono: </span> ".$valor['telefono']."</br>";
            echo "<span>Cargo: </span> ".$valor['cargo']."</br>";
            echo "<span>Empresa: </span> ".$valor['empresa']."</br>";
            echo "<span>País: </span> ".$valor['pais']."</br>";
            echo "<span>Ciudad: </span> ".$valor['ciudad']."</br>";
            echo "<p><span>Semblanza: </span> ".$valor['biografia']."</p><hr>";
          ?>
                </div>
        </div>
        <?php } ?>
      </section>
    </main>
    <footer></footer>
  </body>
</html>
