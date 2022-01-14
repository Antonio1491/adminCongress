<?php session_start();
require("inc/head.php");
include('../class/funciones.php');
$login = new Login();
$verificaLogin = $login->verificaLogin();
// $_SESSION['id_usuario'] = $_GET['id'];
$congresos = new Congreso();
$array_congresos = $congresos->listaCongresos($_SESSION["idCredencial"], $_SESSION["tipoUsuario"]);

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Cpanel</title>
  <?php require("inc/head.php") ?>
</head>

<body>
  <main class="row expanded contenedorEventos">
    <div class=" medium-2">
      <?php include("inc/menu.php") ?>
    </div>
    <section class="column medium-10">
      <?php include('inc/header.php'); ?>
      <h1 class="tituloSeccion">Resumen de congresos</h1>
      <div class="row">
        <button type="button" name="button" id="agregar" class="button">
          <i class="fi-plus"></i> Crear congreso
        </button>
      </div>
      <section class="registro">
        <form class="" action="agregarCongreso.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <div class="row">
              <div class="column">
                <legend>
                  <h5>Datos Congreso:</h5>
                </legend>
              </div>
            </div>
            <div class="row ">
              <div class="column medium-3">
                <label for="">Nombre del Evento:</label>
                <input type="text" name="nombre">
              </div>
              <div class="column medium-3">
                <label for="">Lugar:</label>
                <input type="text" name="lugar">
              </div>
              <div class="column medium-3">
                <label for="">Código :</label>
                <input type="text" name="codigo">
              </div>
              <div class="column medium-3">
                <label for="">Logotipo :</label>
                <input type="file" name="logotipo">
              </div>
            </div>
            <div class="row ">
              <div class="column medium-3">
                <label for="">Desde:</label>
                <input type="date" name="inicio">
              </div>
              <div class="column medium-2">
                <label for="">:</label>
                <input type="time" name="hora_inicio">
              </div>
              <div class="column medium-3">
                <label for="">Hasta:</label>
                <input type="date" name="fin">
              </div>
              <div class="column medium-2">
                <label for="">:</label>
                <input type="time" name="hora_fin">
              </div>
              <div class="column medium-2">
                <label for="">Modalidad:</label>
                <select name="modalidad" id="">
                  <option value="Presencial">Presencial</option>
                  <option value="Virtual">Virtual</option>
                  <option value="Híbrido">Híbrido</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="column medium-5">
                <label for="">Recinto:</label>
                <input type="text" name="recinto">
              </div>
              <div class="column medium-2">
                <label for="">Idioma:</label>
                <select name="idioma" id="">
                  <option value="Español">Español</option>
                  <option value="Inglés">Inglés</option>
                </select>
              </div>
              <div class="column medium-3">
                <label for="">E-mail:</label>
                <input type="email" name="email">
              </div>
              <div class="column medium-2">
                <label for="">Teléfono:</label>
                <input type="number" name="telefono">
              </div>
            </div>
            <div class="row">
              <div class="column medium-3">
                <label for="">Facebook:</label>
                <input type="text" name="facebook">
              </div>
              <div class="column medium-3">
                <label for="">Instagram:</label>
                <input type="text" name="instagram">
              </div>
              <div class="column medium-3">
                <label for="">Youtube:</label>
                <input type="text" name="youtube">
              </div>
              <div class="column medium-3">
                <label for="">Twitter:</label>
                <input type="text" name="twitter">
              </div>
            </div>
            <div class="row">
              <div class="column medium-6">
                <label for="">Descripción:</label>
                <textarea name="descripcion" rows="4" cols="80"></textarea>
              </div>
              <div class="column medium-6">
                <label for="">Descripción (Inglés):</label>
                <textarea name="descripcion_ing" rows="4" cols="80"></textarea>
              </div>
            </div>
            <div class="row column-12 align-center">
              <button type="submit" name=""  class="button">
                <i class="fi-save"></i> Guardar
              </button>
            </div>
          </fieldset>
        </form>
      </section>
      <section class="eventos">
        <?php
        foreach ($array_congresos as $valor) 
        {
          //directorio servidor
        $dir = $_SERVER['DOCUMENT_ROOT'].'/'.$valor['id_congreso'];
        //directorio local
        $dir = $_SERVER['DOCUMENT_ROOT'].'/congresos/'.$valor['id_congreso'];
        $hora_inicio = $congresos->formathora12($valor['hora_inicio']);
        $hora_fin = $congresos->formathora12($valor['hora_fin']);
        echo "<article id='".$valor["id_congreso"]."' class='evento'>
          <div class='menuEvento'>
            <a href='#' class='menuEvento_icon'>
              <i class='fi-list'></i>
            </a>
            <ul>
              <li>
              <a href='editarCongreso.php?id=" . $valor['id_congreso'] . "' title='Editar'>Editar</a>
              </li>
              <li><a hre=''>Borrar</a></li>
            </ul>
          </div>
          ";
          
          echo "
          <figure class='text-center'>
          <a href='inc/crearSession.php?evento=".$valor['id_congreso']."' id='".$valor['id_congreso']."'>
          <img src='./../../".$valor['id_congreso']."/img/".$valor["logotipo"]."' alt=''>
          </a>
          </figure>
          <a href='inc/crearSession.php?evento=".$valor['id_congreso']."' id='".$valor['id_congreso']."'><h2>".$valor['nombre_evento']."</h2></a>
          <ul>
            <li><i class='fi-calendar'></i> ".$valor["fecha_inicio"]." a las ".$hora_inicio."</li>
            <li><i class='fi-map'></i> ".$valor["lugar"]."</li>
          </ul>
        </article>";
      }
      ?>
    </section>
  </main>
  
  <script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
  <script src="../js/vendor/what-input.js" type="text/javascript"></script>
  <script src="../js/vendor/foundation.min.js" type="text/javascript"></script>
  <footer>
    <?php include 'inc/footer.php'; ?>
  </footer>
  <script>
    $(document).foundation();
  </script>
  <script>
    $(document).foundation();


    $(document).ready(function() {
      $("#agregar").click(function() {
        $(".registro").fadeToggle();
      });
    });

  </script>

    </body> 
    </html>