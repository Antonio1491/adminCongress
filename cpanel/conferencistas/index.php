<?php session_start();

 $_SESSION['id_usuario'] = $_GET['id'];

// echo $_SESSION['id_usuario'];
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
  <header>
    <div class="rows">
      <div class="column medium-10 medium-offset-2 text-center">
        <h4>Congreso Sudamericano de Parques Urbanos, Salta 2019</h4>
      </div>
    </div>
  </header>
  <main>
    <div class="row collapse expanded">
      <div class="column medium-2">
        <?php include("inc/menu.php"); ?>
      </div>
      <div class="column medium-10">
        <section class="container">
          <div class="row align-center">
            <div class="mensajeBienvenida">
              <h5>¡Gracias por formar parte del 1er Congreso Internacional
                de Parques Urbanos Sudamérica.</h5>
              <p>Esta es una plataforma exclusiva para conferencistas magistrales y
                ponentes de sesiones educativas. En ella, podrás realizar acciones
                indispensables para hacer de tu momento de exposición fácil y eficiente como:
                <ul>
                  <li>Revisar toda tu información personal y profesional en <a href="perfil.php" class="subrayado">Mi perfil</a>.</li>
                  <li>Firmar los <a href="acuerdos.php" class="subrayado">acuerdos, términos y condiciones</a> de tu participación.</li>
                  <li><a href="documentacion.php" class="subrayado">Subir tu material</a> audiovisual como: presentación de PowerPoint, videos e información adicional.</li>
                  <li>Consultar <a href="conferencia.php" class="subrayado">información de tu sesión</a>, como: horario y salón.  </li>
                </ul>
              </p>
            </div>
          </div>
        </section>
      </div>
    </div>
  </main>
  <footer>
    <?php include ("inc/footer.php"); ?>
  </footer>
</body>
</html>
