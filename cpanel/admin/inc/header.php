<header>
  <div class="">
    <img src="../img/profile.png" alt="" class="fotoPerfil">
    <span class="nombreUsuario"><?php echo $_SESSION["nombre"]. " " .$_SESSION["apellido"]; ?></span>
  </div>
  <div class="menuTop">
    <span id="mostrarFecha"></span>
    <a href="index.php"><i class="fi-home"></i></a>
    <a href="closet.php"><i class="fi-power"></i></a>
  </div>
</header>