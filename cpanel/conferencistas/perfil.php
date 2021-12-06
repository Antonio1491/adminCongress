<?php session_start();
require ("../class/funciones.php");
 ?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Bienvenidos Conferencistas</title>
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
         <section id="informacion-perfil" class="container">
           <div class="row">
             <?php
              $datos = new Conferencistas();
              $array = $datos->mostrarDatosEdit($_SESSION['id_usuario']);
              foreach ($array as $valor) {
                
                  echo "<div class='contenido-perfil'>
                  <figure><img class='foto' src='../../registros/upload/".$valor['foto']."'></figure>";
                  echo "<strong>Nombre: </strong>" .$valor['nombre'];
                  echo "<br><strong>Cargo: </strong>" .$valor["cargo"];
                  echo "<br><strong>Empresa: </strong>" .$valor["empresa"];
                  echo "<br><p><strong>Biografía: </strong>" .$valor["biografia"];
                  echo "</p>";
                  echo "";
                }
                // <td><div class='text-center'>
                //           <a href='editarPerfil.php?id=".$valor['id_conferencista']."' title='Editar' class='button'>
                //           <i class='fi-pencil'></i> Editar Perfil</a>
                //           </div>
                //       </td>

              ?>
           </div>
         </section>

       </div>
     </div>
   </main>
   <footer>

   </footer>
 </body>
 </html>
