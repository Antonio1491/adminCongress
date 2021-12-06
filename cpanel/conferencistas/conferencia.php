<?php  session_start();
require ("../class/funciones.php");
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Conferencia </title>
    <link rel="stylesheet" href="../../css/foundation/foundation.min.css">
    <link rel="stylesheet"  href="../css/style.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>
  </head>
  <body>
    <header></header>
    <main>
      <div class="row collapse expanded">
        <div class="column medium-2">
          <?php include("inc/menu.php"); ?>
        </div>
        <div class="column medium-10">
          <section class="container">
            <div class="datos_conferencia">
              <?php
                $datos_conferencia = new Conferencistas();
                $array_datos = $datos_conferencia->datosConferencia($_SESSION['id_usuario']);
                foreach ($array_datos as $datos) {

                  echo "<div class='row'>
                          <div class='column medium-6'>
                            <div class='row'>
                              <span>Nombre de la Conferencia: </span>".$datos['conferencia']."
                            </div>
                            <div class='row'>
                              <span>Fecha de participación: </span>".$datos['fecha']."
                            </div>
                            <div class='row'>
                              <span>Hora inicio: </span>".$datos['inicio']."
                            </div>
                            <div class='row'>
                              <span>Hora fin: </span>".$datos['fin']."
                            </div>
                            <div class='row'>
                              <span>Salón: </span>".$datos['salon']."
                            </div>
                            <div class='row'>
                              <span>Descripción: </span>".$datos['descripcion']."
                            </div>
                            <div class='row'>
                              <span>Tema al que pertenece: </span>".$datos['tema']."
                            </div>
                          </div>
                        ";
                }
               ?>
                  <div class="column medium-6">
                    <img src="../img/conferencia.png" alt="">
                  </div>
                </div>
            </div>
          </section>

        </div>
      </div>
    </main>
    <footer>
      <?php include ("footer.php"); ?>
    </footer>
  </body>
</html>
