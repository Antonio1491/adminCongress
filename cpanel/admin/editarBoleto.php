<?php 
session_start();
$id = $_GET['id'];
include('../class/funciones.php');
$dataBoleto = new Boletos();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php require ("inc/head.php") ?>
    <script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="../js/vendor/what-input.js" type="text/javascript"></script>
    <script src="../js/vendor/foundation.min.js" type="text/javascript"></script>
  </head>
  <body>
    <main class="row expanded">
      <div class="medium-2">
        <?php include("inc/menuEvento.php") ?>
      </div>
      <div class="column medium-10">
      <header>
      <div class="">
        <h4></h4>
      </div>
      <div class="menuTop">
        <a href="index.php"><i class="fi-home"></i></a>
        <a href="closet.php"><i class="fi-power"></i></a>
      </div>
    </header>
    <h1 class="tituloSeccion">Boleto</h1>
        <div class="">
        <form id="form" action="actualizarBoleto.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <div class="row">
                <div class="column">
                  <legend><h5>Editar datos</h5></legend>
                </div>
              </div>
              <div class="row ">
                <?php $boleto = $dataBoleto->getBoleto($id);
                  foreach($boleto as $data)
                  {
                ?>
              <div class="column medium-6">
                  <label for="">Nombre del boleto:</label>
                  <input type="text" name="nombre" value="<?php echo $data["boleto"]; ?>" placeholder="Nombre" required>
                </div>
                <div class="column medium-6">
                  <label for="">Nombre del boleto (Inglés):</label>
                  <input type="text" name="nombre_ing" value="<?php echo $data["boleto_ing"]; ?>" placeholder="Nombre" required>
                </div>
                
              </div>
              <div class="row ">
                <div class="column medium-2">
                  <label for="">Modalidad:</label>
                  <select  name="modalidad" required>
                    <option value="<?php echo $data["modalidad"]; ?>"><?php echo $data["modalidad"]; ?></option>
                    <option value="Presencial">Presencial</option>
                    <option value="Virtual">Virtual</option>
                    <option value="Todos">Todos</option>
                  </select>                  
                </div>
                <div class="column medium-5">
                  <label for="">Precio MXN:</label>
                  <input type="number" name ="preciomxn" value="<?php echo $data["precio_mxn"]; ?>">              
                </div>
                <div class="column medium-5">
                  <label for="">Precio USD</label>
                    <input type="number" name ="preciousd" value="<?php echo $data["precio_usd"]; ?>">          
                </div>
              </div>
              <div class="row ">
                <div class="column medium-4">
                  <label for="">Desde:</label>
                  <input type="date" name ="desde" value="<?php echo $data["desde"]; ?>">                 
                </div>
                <div class="column medium-2">
                  <label for="">Hora Inicio:</label>
                  <input type="time" name="hora_inicio" value="<?php echo $data["hora_inicio"]; ?>">
                </div>
                <div class="column medium-4">
                  <label for="">Hasta:</label>
                  <input type="date" name ="hasta" value="<?php echo $data["hasta"]; ?>">            
                </div>
                <div class="column medium-2">
                  <label for="">Hora Fin:</label>
                  <input type="time" name="hora_fin" value="<?php echo $data["hora_fin"]; ?>">
                </div>
              </div>

              <div class="row ">
                <div class="column medium-12">
                  <label for="">Descripción:</label>
                  <textarea name="descripcion" rows="4" cols="1" value="<?php echo $data["descripcion"]; ?>"><?php echo $data["descripcion"]; ?></textarea>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-12">
                  <label for="">Descripción (Inglés):</label>
                  <textarea name="descripcion_ing" rows="4" cols="80" value="<?php echo $data["descripcion_ing"]; ?>"><?php echo $data["descripcion_ing"]; ?></textarea>
                </div>
              </div>
              <div class="row align-center">
                <input type="hidden" value="<?php echo $id; ?>" name="id_boleto">
                <button type="submit" name=""  class="button">
                  <i class="fi-save"></i> Guardar
                </button>
              </div>
            </fieldset>
            <?php } ?>
          </form>
          </div>

  
</body>

</html>