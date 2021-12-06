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
        <section id="acuerdos" class="container">
          <div class="row">
            <article>
              <h5>ACUERDOS, TÉRMINOS Y CONDICIONES.</h5>
              <!-- <h6><strong>Asociación Nacional de Parques y Recreación de México</strong></h6> -->
              <p>Gracias por aceptar participar en el 1er Congreso Internacional de Parques Urbanos
                Sudamérica que tendrá lugar del 6 al 9 de octubre del 2019 en Salta, Argentina. En
                este documento se encuentran los acuerdos, términos y condiciones en relación con la
                ponencia que usted presentará en el congreso. Por favor, revise los detalles este
                documento y firme que está de acuerdo con las condiciones antes del DOMINGO 15 DE
                SEPTIEMBRE DEL 2019.</p>
              <p>De igual forma, le solicitamos revisar su información personal y datos generales
                de su conferencia o sesión para asegurar que están correctos. Cualquier comentario
                o dificultad para la corrección de datos contacte a Cristina R. de León, Directora
                de Contenido y Educación al correo: contenido@congresoparques.com con copia a Vitoria
                Martín, Asistente de Dirección de Contenido y Educación al correo: asistente@congresoparques.com </p>
            </article>
            <article class="">
              <h6><strong>Equipo Audiovisual</strong></h6>
              <p>Cada salón contará con una computadora (PC - Windows), un proyector, una
                pantalla de proyección, un pódium con un micrófono presidencial y dos micrófonos
                inalámbricos. Usted no necesita traer una laptop para su presentación, ya que
                habrá una en cada salón, pero tendrá que llevar su presentación en USB el día
                que usted presente, además de enviar su material audiovisual en un formato
                compatible a la computadora que se proporcionará 3 semanas previas al congreso
                (PC - Windows).</p>
                <p>El material audiovisual deberá ser cargado en el apartado DOCUMENTOS
                  de este sistema, antes del DOMINGO 15 DE SEPTIEMBRE DEL 2019.</p>
                <strong>Formatos aceptados:</strong>
                  <ul>
                    <li>Power Point (.pptx). </li>
                    <li>MP4 o .MOV para videos si estos forman parte de su presentación.</li>
                  </ul>
                    <strong>Información Adicional:</strong>
                    <ul>
                      <li>El material audiovisual que usted nos proporcione, estará disponible
                         para los miembros de la Asociación Nacional de Parques y Recreación
                         de México en la página oficial de la misma, posterior a las fechas del congreso.</li>
                      <li>•	El comité organizador del 1er Congreso Internacional de Parques
                        Urbanos Sudamérica no proporcionará material impreso para las sesiones
                        educativas. Si el ponente desea otorgar este material, deberá hacerlo
                        por su propia cuenta y proporcionar suficiente material para todos los
                        asistentes a la sesión - capacidad máxima de los salones: 250 personas.</li>
                  </ul>
                </p>

            </article>
            <article class="">
              <strong>Términos y Condiciones</strong>
              <p>Para propósitos educativos, Parques de México invita a los ponentes a estar
                de acuerdo en compartir el material de su presentación con todos los asistentes
                después del congreso, así como estar de acuerdo en tomar fotografías y vídeo
                durante su presentación.</p>
              <p>Las solicitudes anteriores no son obligatorias, sin embargo, de gran
                importancia. Por favor firme de acuerdo o en desacuerdo sobre los
                términos y condiciones.</p>
              <p>Aceptando ser ponente del 1er Congreso Internacional de Parques Urbanos
                Sudamérica, por medio de la presente, le otorgo a Parques de México el derecho a:</p>
              <strong>Sobre uso de imagen:</strong>
              <ol>
                <li>La toma de fotografías y vídeo durante mi presentación para efectos
                   publicitarios en cualquier formato (impreso o electrónico) de  Parques
                   de México y el Congreso Internacional de Parques Urbanos Sudamérica en sus
                   futuras ediciones.</li>
              </ol>

              <form class="" action="firmar_acuerdo.php" method="post">
                <fieldset class="firmar">
                  <legend>Firmar:</legend>
                    <input type="radio" name="usoDeImagen" value="1" required> De acuerdo
                    <input type="radio" name="usoDeImagen" value="0"> En Desacuerdo
                    <span>*Nota: Debes firmar el acuerdo de distribución.</span>
                </fieldset>
                <br>
              <strong>Sobre distribución de la presentación y aviso de privacidad:</strong>
              <ol>
                <li>Distribuir mi presentación y materiales adicionales en formato PDF en el sistema del 1er Congreso de Parques Urbanos Sudamérica.</li>
                <li>Esta firma de acuerdos, términos y condiciones, corresponde a los materiales entregados sobre su sesión educativa en el 1er Congreso Internacional de Parques Urbanos Sudamérica y no limita de ninguna manera el uso personal de estos materiales. La propiedad de esta presentación y materiales sigue siendo de usted o de cualquier otra parte involucrada. En esta firma también declara que su presentación no infringirá ningún derecho de autor o incluirá ningún material que sea difamatorio, escandaloso o una invasión de privacidad hacia terceras personas.</li>
                <li>Entiendo que las opiniones expresadas en mi o sesión educativa son mías y no las de Parques de México. A través de la presente, garantizo que los materiales audiovisuales y cualquier otro material preparado para mi presentación, no infringen ningún derecho de autor ni violan ningún otro derecho de ninguna persona o parte. Estoy de acuerdo en mantener a Parques de México y a sus miembros libres en todo momento contra cualquier reclamo, responsabilidad, pérdida, daño, costos y gastos, incluyendo, honorarios de abogados, derivados de mi uso personal o el uso de Parques de México de los materiales mencionados por una violación de la garantía anterior.</li>
              <li>Es importante recordar que en las sesiones educativas del 1er Congreso Internacional de Parques Urbanos Sudamérica no son un espacio de promoción y/o venta de productos y/o servicios. Los momentos de networking previos o posteriores al momento de aprendizaje serán los adecuados para esos propósitos.</li>
              </ol>
              <fieldset class="firmar">
                <legend>Firmar: </legend>
                <input type="radio" name="distribucionMaterial" value="1" required> De acuerdo
                <input type="radio" name="distribucionMaterial" value="0"> En Desacuerdo
              </fieldset>
              <br>
              <input type="submit" name="" value="Enviar Firmas" class="button">
            </form>
            <div class="cajaFirmado text-center">
              <i class="fi-check"></i> <span>Firmado</span>
            </div>
            </article>

          </div>

          <div class="row align-center">
            <span style="font-size: 17px;">Atte. Cristina R. de León, Directora de Educación y Contenido.  </span><br>
          </div><br>
          <div class="row">
              <?php
                $firma = new Conferencistas();
                $respuesta = $firma->comprobarFirma($_SESSION['id_usuario']);
                if ($respuesta) {
                      echo "
                            <script>
                              $('.firmar').hide();
                              $('.button').hide();
                              $('.cajaFirmado').show();
                            </script>
                      ";
                }
              ?>
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
