<?php session_start();
$id = $_GET['id'];
include('../class/funciones.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php require ("inc/head.php") ?>
    <script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="../js/vendor/what-input.js" type="text/javascript"></script>
    <script src="../js/vendor/foundation.min.js" type="text/javascript"></script>
    <!-- <script type="text/javascript" src="../js/app.js"></script> -->
  </head>
  <body>
    <header>
      <div class="rows">
        <div class="column medium-10 medium-offset-2 text-center">
          <h4>Conferencias</h4>
        </div>
      </div>
    </header>
    <main class="row expanded">
      <div class="medium-2">
        <?php include("inc/menu.php") ?>
      </div>
      <div class="column medium-10">
        <div class="">
          <?php

            $traer_datos = new Conferencia();

            $resultado = $traer_datos->mostrarConferencia($id);

            foreach ($resultado as $valor) {

            echo '<form class="" action="actualizarConferencia.php?id='.$id.'" method="post">
                  <fieldset>
                    <div class="row">
                      <div class="column medium-8">
                        <legend><h5>Edición de conferencia</h5></legend>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Conferencia:</label>
                        <input type="text" name="conferencia" value="'.$valor['conferencia'].'" placeholder="Nombre de la Conferencia" required>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Conferencia (Inglés):</label>
                        <input type="text" name="conferencia_ing" value="'.$valor['conferencia_ing'].'" placeholder="Nombre de la Conferencia" required>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="column medium-8">
                        <label for="">Conferencia (Portugués):</label>
                        <input type="text" name="conferencia_port" value="'.$valor['conferencia_port'].'" placeholder="Nombre de la Conferencia" >
                      </div>
                    </div>
                    <div class="row">
                      <div class="column medium-2">
                        <label for="">Fecha (00/00/0000):</label>
                        <input type="date" name="fecha" value="'.$valor['fecha'].'" placeholder="Día/Mes/Año">
                      </div>
                      <div class="column medium-2">
                        <label for="">Inicio:</label>
                        <input type="time" name="inicio" value="'.$valor['inicio'].'" placeholder="00:00">
                      </div>
                      <div class="column medium-2">
                        <label for="">Fin:</label>
                        <input type="time" name="fin" value="'.$valor['fin'].'" placeholder="00:00:00">
                      </div>
                      <div class="column medium-2">
                        <label for="">Lugar:</label>
                        <input type="text" name="lugar" value="'.$valor['salon'].'">
                      </div>
                    </div>
                    <div class="row ">
                    <div class="column medium-4">
                      <label>Tipo:
                        <select name="tipo">';
                            $listaTipo = new Conferencia();
                            $lista = $listaTipo->conferenciaTipo();
                            foreach ($lista as $value) {
                             ?> 
                             <option <?php echo $valor['id_tipo'] === $value['id_tipo'] ? 'selected' : ''; ?> value="<?php echo $value['id_tipo']; ?>"> <?php echo $value['tipo']; ?>
                             <?php
                           
                              }

                    echo '  </select>
                      </label>
                    </div>
                    <div class="column medium-4">
                      <label>Tema:
                      <select name="tema">';
                          // $listaTipo = new Conferencia();
                          $lista = $listaTipo->temas();
                          foreach ($lista as $value) {
                            ?> 
                             <option <?php echo $valor['id_tema'] === $value['id_tema'] ? 'selected' : ''; ?> value="<?php echo $value['id_tema']; ?>"> <?php echo $value['tema']; ?>
                             <?php
                              
                              }
                            echo '  </select>
                              </label>
                      </div>
                  </div>


                    <div class="row ">
                    <div class="column medium-8">
                      <label for="">Descripción:</label>
                      <textarea name="descripcion" rows="4" cols="1" value="'.$valor['descripcion'].'">'.$valor['descripcion'].'</textarea>
                    </div>
                    </div>

                    <div class="row ">
                    <div class="column medium-8">
                      <label for="">Descripción (Inglés):</label>
                      <textarea name="descripcion_ing" rows="4" cols="1" value="'.$valor['descripcion_ing'].'">'.$valor['descripcion_ing'].'</textarea>
                    </div>
                    </div>
                    <div class="row ">
                    <div class="column medium-8">
                      <label for="">Descripción (Portugués):</label>
                      <textarea name="descripcion_port" rows="4" cols="1" value="'.$valor['descripcion_port'].'">'.$valor['descripcion_port'].'</textarea>
                    </div>
                    </div>
                    <div class="row">
                      <div class="column medium-8">
                        <label for="">Objetivo 1:</label>
                        <textarea name="objetivo1" rows="1" cols="80" value="'.$valor['objetivo1'].'">'.$valor['objetivo1'].'</textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="column medium-8">
                        <label for="">Objetivo 2:</label>
                        <textarea name="objetivo2" rows="1" cols="80" value="'.$valor['objetivo2'].'">'.$valor['objetivo2'].'</textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="column medium-8">
                        <label for="">Objetivo 3:</label>
                        <textarea name="objetivo3" rows="1" cols="80" value="'.$valor['objetivo3'].'">'.$valor['objetivo3'].'</textarea>
                      </div>
                    </div>

                    <div class="row column text-center">
                      <input type="submit" name="" value="Actualizar" class="button success">
                    </div>
                  </fieldset>
              </form>

          </div>';
}
 ?>
