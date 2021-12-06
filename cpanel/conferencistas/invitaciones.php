<?php session_start();
require ("../class/funciones.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fiesta Vip</title>
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

            <main class="contenedor">
              <section class="container">
                <div class="row">
                  <h5>"Evento social para conferencistas"</h5>
                  <br>
                  <figure class="invitacionVip">
                    <img src="../img/inviacion_vip.png" alt="">
                  </figure>
                  <div class="confirmarFiesta"><br>
                    <form class="" action="asistenciaFiesta.php" method="post">
                      <label for="">Confirmar Asistencia</label>
                      <input type="radio" name="asistir" value="1">Sí
                      <input type="radio" name="asistir" value="0">No <br>
                      <input type="submit" name="" value="Guardar" class="button">
                    </form>
                </div>

                <?php

                  $firma = new Conferencistas();
                  $respuesta = $firma->comprobarFiesta($_SESSION['id_usuario']);

                  if ($respuesta) {
                        echo "
                              <script>
                                $('.confirmarFiesta').hide()
                              </script>
                        ";

                  }

                ?>
              </section>
            </main>
          </div>
        </div>
      </div>
    </main>
    <footer>
      <?php include ("footer.php"); ?>
    </footer>
  </body>
</html>
