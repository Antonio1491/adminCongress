<?php 
session_start();
include('../class/funciones.php');
// var_dump($_SESSION);
$congreso = new Congreso();
$fecha = json_decode($congreso->getFecha($_SESSION["evento"])); 
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Programa</title>
    <?php require ("inc/head.php") ?>
  </head>
  <body>
    <main class="row expanded">
      <div class=" medium-2">
        <?php include("inc/menuEvento.php") ?>
      </div>
      <section class="column medium-10">
      <?php include('inc/header.php'); ?>
      <h1 class="tituloSeccion">Programa</h1>
      <div class="column medium-12">
        <div class="row">
          <div class="column medium-12">
            <button type="button" name="button" id="agregar" class="button">
              <i class="fi-plus"></i> Agregar Bloque
            </button>
          </div>
        </div>
        <div class="registro">
          <form class="" action="altaBloque.php" method="post" enctype="multipart/form-data" >
            <fieldset>
              <div class="row">
                <div class="column">
                  <legend><h5>Información del Bloque</h5></legend>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-6">
                  <label for="">Título del bloque:</label>
                  <input type="text" name="bloque" value="" placeholder="Nombre de la Conferencia" required>
                </div>
                <div class="column medium-6">
                  <label for="">Título del bloque: (Inglés):</label>
                  <input type="text" name="bloque_ing" value="" placeholder="Nombre de la Conferencia" required>
                </div>
              </div>
              <div class="row">
                <div class="column medium-3">
                  <label for="">Fecha:</label>
                  <input type="date" name="fecha" placeholder="Día/Mes/Año" min="<?php echo $fecha->fecha_inicio; ?>" max="<?php echo $fecha->fecha_fin; ?>" step="1">
                </div>
                <div class="column medium-2">
                  <label for="">Hora Inicio:</label>
                  <input type="time" name="inicio" value="" placeholder="00:00:00">
                </div>
                <div class="column medium-2">
                  <label for="">Hora Fin:</label>
                  <input type="time" name="fin" value="" placeholder="00:00:00">
                </div>
                <div class="column medium-3">
                  <label for="">Tipo:</label>
                  <select name="tipoBloque">
                    <option value="Conferencias">Conferencia</option>
                    <option value="Talleres">Taller</option>
                    <option value="Otro">Otro</option>
                  </select>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-8">
                  <label for="">Icono:</label>
                  <input type="file" name="icono">
                </div>
              </div>
              <div class="row align-center">
                <input type="hidden" name="evento" value="<?php echo $_SESSION["evento"]; ?>">
                <button type="submit" name="createCustomer"  class="button">
                  <i class="fi-save"></i> Guardar
                </button>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      <?php
        $programaContenido = new Programa();
        $programa = $programaContenido->programa($_SESSION["evento"]);
        $programa = json_decode($programa);
        
      ?>
      <section class="programa">
        <?php foreach ($programa as $bloque) : ?>
        <article class="programa_bloque">
          <div class="menuEvento">
            <a href="#" class="menuEvento_icon">
              <i class="fi-list"></i>
            </a>
            <ul>
              <li><a href="eliminarBloque.php?id=<?php echo $bloque->id ?>" class="eliminar">Borrar</a></li>
            </ul>
          </div>
          <section class="header_bloque">
            <div class="hora_bloque">
              <i class="fi-clock"></i> 
              <?php echo $bloque->inicio. " - "  .$bloque->fin; ?> 
            </div>
            <div class="titulo_bloque">
              <span><?php echo $bloque->titulo; ?></span>
            </div>
          </section>
          <section class="contenido_bloque">
            <?php $contenido = $programaContenido->bloque($bloque->tipo, $bloque->fecha, $bloque->inicio, $bloque->fin, $bloque->id_congreso) ?>
              <ul class="lista_bloque">
                <?php echo $contenido; ?>
              </ul>
          </section>
        </article>
        <?php endforeach ?>
      </section>
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
