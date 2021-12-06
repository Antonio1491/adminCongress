<?php session_start();

require ("../class/funciones.php");
$id_usuario = $_SESSION['id_usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documentación</title>
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
          <div class="documentos">
            <div class="row">
              <section class="container">
                <h5>Documentos</h5>
                <p>En este apartado podrá cargar el material audiovisual que utilizará en su conferencia magistral o sesión educativa.</p>
                <p>Es necesario que cargue todos los archivos que utilizará en su presentación antes del DOMINGO 15 DE SEPTIEMBRE DEL 2019, ya que su presentación será precargada en la computadora de su salón asignado.</p>
                  <strong>Formatos y recomendaciones:</strong>
                  <ul>
                    <li>Únicamente se aceptarán presentaciones de Power Point (.pptx) </li>
                    <li>Visualización 16:9</li>
                    <li>Tamaño de letra recomendada 18 o más grande</li>
                    <strong>Formatos y recomendaciones para video:</strong>
                    <li>Si en su presentación utilizará videos, es necesario lo adjunte en esta plataforma, estos también serán
                      precargados en la computadora de su salón asignado.</li>
                      <li>Formatos requeridos: .MP4 o .MOV</li>
                      <li>Nota: Puede subir más de un archivo a la vez.</li>
                      <li>IMPORTANTE: Si su video se encuentra en YouTube, por favor envíe el link.</li>
                  </ul>
              </section>
            </div>
          </div>

              <div class="row column medium-12">
                <script type="text/javascript" src="https://form.jotform.co/jsform/90786208222861"></script>
              </div>
          </div>


          <?php

            // $comprobar_documentos = new Conferencista();
            //
            // $respuesta = $comprobar_documentos->comprobarDocumentos($id_usuario);
            //
            // if ($respuesta == true) {
            //
            //   $mensaje = "<div class='row carga-doc'><div class='column medium-12'><h4 >¡Archivos cargados!</h4></div></div>
            //               <div class='row'><img src='../img/check-documentos.png' class='check_doc'></div>";
            //
            //   echo $mensaje;
            // }
            // else {
            //
            //   echo'
            //   <section id="form-portafolio">
            //
            //     <form class="" action="cargarDocumentos.php" method="post" enctype="multipart/form-data">
            //
            //       <div class="row">
            //         <div class="column medium-4">
            //           <label for="exampleFileUpload" class="">1.- Seleccionar Presentación</label>
            //           <input type="file" name="presentacion" required>
            //         </div>
            //       </div>
            //       <div class="row">
            //         <div class="column medium-4">
            //           <label for="exampleFileUpload" >2.- Seleccionar Video</label>
            //           <input type="file" name="video" >
            //         </div>
            //
            //       </div>
            //       <div class="row">
            //         <div class="column medium-4">
            //           <label for="">Link de video: </label>
            //           <input type="text" name="link" value="">
            //         </div>
            //       </div>
            //
            //       <button type="submit" name="" value="Subir Archivos" class="button ">Cargar Archivos <i class="fi-upload"></i></button>
            //     </form>
            //   </section>';
            //
            // }

           ?>
        </div>
    </main>
    <footer>
      <?php include ("inc/footer.php"); ?>
    </footer>
  </body>
</html>
