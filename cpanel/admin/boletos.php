<?php session_start();
include('../class/funciones.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Boletos</title>
    <?php require ("inc/head.php") 
    ?>
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
        <h1 class="tituloSeccion">Boletos</h1>
        <div class="row">
          <button type="button" name="button" id="agregar" class="button">
          <i class="fi-plus"></i> Agregar boleto
          </button>
        </div>
        <div class="registro">
          <form id="form" action="altaBoleto.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <div class="row">
                <div class="column">
                  <legend><h5>Registro de boletos</h5></legend>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-6">
                  <label for="">Nombre del boleto:</label>
                  <input type="text" name="nombre" value="" placeholder="Nombre" required>
                </div>
                <div class="column medium-6">
                  <label for="">Nombre del boleto (Inglés):</label>
                  <input type="text" name="nombre_ing" value="" placeholder="Nombre" required>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-2">
                  <label for="">Modalidad:</label>
                  <select  name="modalidad" required>
                    <option value="Presencial">Presencial</option>
                    <option value="Virtual">Virtual</option>
                  </select>                  
                </div>
                <div class="column medium-4">
                  <label for="">Precio MXN:</label>
                  <input type="number" name="preciomxn" value="" placeholder="Precio mxn" required>
                </div>
                <div class="column medium-4">
                  <label for="">Precio USD:</label>
                  <input type="number" name="preciousd" value="" placeholder="Precio usd" required >
                </div>
              </div>
              <div class="row ">
                <div class="column medium-4">
                  <label for="">Desde:</label>
                  <input type="date" name="desde" value="" placeholder="Eje Temático" required>
                </div>
                <div class="column medium-2">
                  <label for="">Hora Inicio:</label>
                  <input type="time" name="hora_inicio">
                </div>
              
                <div class="column medium-4">
                  <label for="">Hasta:</label>
                  <input type="date" name="hasta" value="" placeholder="Nombre de la Conferencia" required >
                </div>
                <div class="column medium-2">
                  <label for="">Hora Fin:</label>
                  <input type="time" name="hora_fin">
                </div>
              </div>
              <div class="row ">
                <div class="column medium-12">
                  <label for="">Descripción:</label>
                  <textarea name="descripcion" rows="4" cols="80"></textarea>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-12">
                  <label for="">Descripción (Inglés):</label>
                  <textarea name="descripcion_ing" rows="4" cols="80"></textarea>
                </div>
              </div>
              <div class="row align-center">
                <input type="hidden" value="CPL2020" name="congreso">
                <button type="submit" name=""  class="button">
                  <i class="fi-save"></i> Guardar
                </button>
              </div>
            </fieldset>
          </form>
        </div>
        <section class="boletos">
        <?php
          $boletos = new Boletos();
          $respuesta = $boletos->getBoletos($_SESSION["evento"]);
          foreach ($respuesta as $valor) {
      echo"<article class='boleto'>
            <div class='menuEvento'>
              <a href='#' class='menuEvento_icon'>
                <i class='fi-list'></i>
              </a>
              <ul>
                <li><a href='editarBoleto.php?id=".$valor['id_boleto']."'>Editar</a></li>
                <li><a href='eliminarBoleto.php?id=".$valor['id_boleto']."' class='eliminarBoleto'>Borrar</a></li>
              </ul>
            </div>
            <div class='boleto-encabezado'>
              <i class='fi-ticket'></i>
              <h3>" .$valor['boleto']. "</h3>
            </div>
            <footer class='boleto-precios'>
              <ul>
                <li>MXN $" .$valor['precio_mxn']. "</li>
                <li>USD $" .$valor['precio_usd']. "</li>
              </ul>
              <strong class='boleto-disponibilidad' id='hora'>Disponible hasta " .$valor['hasta'] ." " .$valor['hora_fin']."</strong>
            </footer>
          </article>
          ";
          }
          ?>
        </section>


      </section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/vendor/what-input.js" type="text/javascript"></script>
    <script src="../js/vendor/foundation.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script> 
    <script type="text/javascript">
    moment.locale('es');
    
</script>
<script>
    $(document).foundation();


    $(document).ready(function(){
    $("#agregar").click(function(){
      $(".registro").fadeToggle();
    });
    });
    </script> 
<script>
$('.eliminarBoleto').click(function(e) {
e.preventDefault(); // Prevent the href from redirecting directly
var linkURL = $(this).attr("href");
warnBeforeRedirect(linkURL);
});

 function warnBeforeRedirect(linkURL) {
    Swal.fire({
      title: '¿Estás seguro?',
    text: "No se puede deshacer este cambio",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, adelante',
    cancelButtonText:'No, cancelar'
    }).then((result) => {
  if (result.value) {
    window.location.href = linkURL;
  }
  return false;
})
  }
</script>
  </body>
</html>
