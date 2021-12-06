<?php
$logo = new congreso();
$logo = json_decode($logo -> logoById($_SESSION['evento']));

?>
<nav class="menuPrincipal">
  <div class="text-center">
    <figure class="logotipoMenu">
      <?php
      echo "<img src='./../../".$_SESSION['evento']."/img/$logo'>";
      ?>
    </figure>
  </div>
  <ul class="vertical menu accordion-menu" data-accordion-menu data-submenu-toggle="true" >
    <li><a href="boletos.php"><i class="fi-ticket"></i> Boletos del Evento</a></li>
    <li><a href="propuestas.php"><i class="fi-results"></i> Propuestas</a> </li>
    <li><a href="patrocinadores.php"><i class="fi-trophy"></i> Patrocinadores</a></li>
    <li><a href="temas.php"><i class="fi-lightbulb"></i> Ejes Temáticos</a></li>
    <li><a href="conferencias.php"><i class="fi-projection-screen"></i> Conferencias</a></li>
    <li><a href="conferencista.php"><i class="fi-torsos-all"></i> Conferencistas</a></li>
    <li><a href="talleres.php"><i class="fi-megaphone"></i> Talleres</a></li>
    <li><a href="talleristas.php"><i class="fi-torsos-all"></i> Talleristas</a></li>
    <li><a href="expositores.php"><i class="fi-trophy"></i> Expositores</a></li>
    <!-- <li><a href="recorridos.php"><i class="fi-mountains"></i> Recorridos Turísticos</a></li> -->
    <li><a href="eventos.php"><i class="fi-ticket"></i> Eventos Sociales</a></li>
    <li><a href="programa.php"><i class="fi-calendar"></i> Programa</a></li>
    <li><a href="hoteles.php"><i class="fi-marker"></i> Hoteles</a></li> 
    <li><a href="voluntarios.php" ><i class="fi-torsos-all"></i> Voluntarios</a></li>    
  </li>
  </ul>
</nav>
