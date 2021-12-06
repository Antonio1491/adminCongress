<?php     session_start();
require ("../inc/clases2.php");
$id = $_GET['id'];
 ?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Bienvenidos Conferencistas</title>
   <link rel="stylesheet" href="../css/foundation.css">
   <link rel="stylesheet" href="css/app-conferencistas.css">
   <link rel="stylesheet" href="../font/foundation-icons.css">
   <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
   <script type="text/javascript" src="../js/app.js"></script>
 </head>
 <body>
   <header></header>
   <main>
     <div class="row collapse expanded">
       <div class="column medium-2">
         <?php include("menu.php"); ?>
       </div>
       <div class="column medium-10">
         <section id="informacion-perfil">
           <?php
             $datos_conferencista = new Conferencista();
             $array_datos = $datos_conferencista->mostrarDatos($_SESSION['id_usuario']);
             foreach ($array_datos as $valor) {
                echo "<form class='formulario' action='actualizarPerfil.php?id=".$id."' method='post'>
                        <div class='row'>
                          <div class='column medium-10'>
                            <label>Nombre:</label>
                            <input type='text' name='nombre' value='".$valor['nombre']."'>
                          </div>
                        </div>
                        <div class='row'>
                          <div class='column medium-10'>
                            <label>Cargo:</label>
                            <input type='text' name='cargo' value='".$valor['cargo']."'>
                          </div>
                        </div>
                        <div class='row'>
                          <div class='column medium-10'>
                            <label>Empresa:</label>
                            <input type='text' name='empresa' value='".$valor['empresa']."'>
                          </div>
                        </div>
                        <div class='row'>
                          <div class='column medium-10'>
                            <label>Empresa:</label>
                            <textarea name='biografia' rows='5' value='".$valor['biografia']."' >
                              '".$valor['biografia']."'
                            </textarea>
                          </div>
                        </div>
                        <div class='row '>
                          <div class='column medium-10 text-center'>
                            <input type='submit' value='Guardar' class='button success'>
                          </div>
                        </div>
                    ";
                  }
            ?>
         </section>
       </div>
     </div>
   </main>
   <footer></footer>
 </body>
</html>
