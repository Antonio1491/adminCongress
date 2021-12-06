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
          <h4>Editar Hotel</h4>
        </div>
      </div>
    </header>
    <main class="row expanded">
      <div class="medium-2">
        <?php include("inc/menu.php") ?>
      </div>
      <div class="column medium-10">
        <div class="">
        <form id="form" action="actualizarHotel.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <div class="row">
                <div class="column">
                  <legend><h5>Registro de hoteles</h5></legend>
                </div>
              </div>
              <div class="row ">
                <div class="column medium-12">
                  <label for="">Nombre del hotel:</label>
                  <?php
              $boletos = new Hoteles();
              $respuesta = $boletos->getHotelEditar($id);
              foreach ($respuesta as $valor) {
                echo "<input type='text' name ='nombre' value='".$valor['nombre_hotel']."' required>";
              }
              ?>                
              </div>
            
              </div>
              <div class="row ">
                <div class="column medium-6">
                  <label for="">Ubicacion:</label>
                  <?php
              $boletos = new Hoteles();
              $respuesta = $boletos->getHotelEditar($id);
              foreach ($respuesta as $valor) {
                echo "<input type='text' name ='ubicacion' value='".$valor['ubicacion']."' required>";
              }
              ?>                  </div>
                <div class="column medium-6">
                  <label for="">Clave de resevacion:</label>
                  <?php
              $boletos = new Hoteles();
              $respuesta = $boletos->getHotelEditar($id);
              foreach ($respuesta as $valor) {
                echo "<input type='text' name ='clave_reserv' value='".$valor['clave_reservacion']."' required>";
              }
              ?>                  </div>
              </div>
              <div class="row ">
                <div class="column medium-6">
                  <label for="">Numero</label>
                  <?php
              $boletos = new Hoteles();
              $respuesta = $boletos->getHotelEditar($id);
              foreach ($respuesta as $valor) {
                echo "<input type='number' name ='numero' value='".$valor['numero_contacto']."' required>";
              }
              ?>                  </div>
                <div class="column medium-6">
                  <label for="">correo:</label>
                  <?php
              $boletos = new Hoteles();
              $respuesta = $boletos->getHotelEditar($id);
              foreach ($respuesta as $valor) {
                echo "<input type='email' name ='email' value='".$valor['correo_contacto']."' required>";
              }
              ?>                  </div>
              </div> 
              <div class="row ">
                <div class="column medium-12">
                  <label for="">Congreso:</label>
                  <select name="congreso" >
                  <?php
                    $boletos = new Boletos();
                    $respuesta = $boletos->getCongreso();
                    if ($respuesta == false){
                      echo "<option value='0'>No hay congresos proximos</option>";

                    }else{
                    foreach ($respuesta as $valor) {
                      echo "<option value=".$valor['id_congreso'].">".$valor['lugar']."</option>";
                    }
                    }
                    ?>
                </select>                
               </div>
              </div>
       

              </div>
  
              <div class="row ">
              <input type="hidden" name="id" value=" <?php echo $id ?>" class="button success">
                <input type="submit" name="" value="Actualizar" class="hollow button success">
              </div>
            </fieldset>
          </form>
          <div class="row" id="listaConferencias">
          <?php
              $hotel = new Habitacion();
              $respuesta = $hotel->getHabitacion($id);
              if ($respuesta == false){
                echo "<h4>No hay habitaciones disponibles<h4>";

              }else{
            echo "<table class='tablaResultados'>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>tipo</th>
                        <th>modalidad</th>
                        <th>precio</th>
                        <th>acciones</th>
                      </tr>
                    </thead>
                    <tbody>";
                    $num = 0;
                    foreach ($respuesta as $valor) {
                        $num++;
                        echo "<tr>
                        <td>".$num ."</td>
                        <td>" .$valor['tipo_habitacion']. "</td>
                        <td>" .$valor['modalidad']. "</td>
                        <td>" .$valor['precio']. "</td>
                        <td class='acciones'><a href='editarHabitacion.php?id=".$valor['id_habitacion']."' title='Editar'><i class='fi-pencil'></i></a> |
                        <a class='eliminar' href='eliminarHabitacion.php?id=".$valor['id_habitacion']."&id_hotel=".$valor['id_hotel']."' title='Eliminar' class='eliminar'><i class='fi-x'></i> </a></td>
                        </tr>";
                      }
                    echo "
                    </tbody>
                  </table>";
                    }
           ?>

      </div>           
          </div>
          </div>

          <script>
$('.eliminar').click(function(e) {
e.preventDefault(); // Prevent the href from redirecting directly
var linkURL = $(this).attr("href");
warnBeforeRedirect(linkURL);
});

 function warnBeforeRedirect(linkURL) {
    Swal.fire({
      title: 'Estas seguro?',
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