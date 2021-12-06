<?php session_start();
include('../class/funciones.php');

$id = $_GET['id'];

$lugar = $_POST['lugar'];
$codigo = $_POST['codigo'];
$ano = $_POST['ano'];
$inicio = $_POST['inicio'];
$fin = $_POST['fin'];
$mes = $_POST['mes'];
$mes_ing = $_POST['mes_ing'];
$mes_port = $_POST['mes_port'];
$pr_miem = $_POST['pr_miem'];
$pr_gral = $_POST['pr_gral'];
$costo_miem = $_POST['costo_miem'];
$costo_gral = $_POST['costo_gral'];
$pr_vivencial = $_POST['pr_vivencial'];
$pr_curricular = $_POST['pr_curricular'];
$pr_fiesta = $_POST['pr_fiesta'];
$pr_expo = $_POST['pr_expo'];
$pr_miem_d = $_POST['pr_miem_d'];
$pr_gral_d = $_POST['pr_gral_d'];
$costo_miem_d = $_POST['costo_miem_d'];
$costo_gral_d = $_POST['costo_gral_d'];
$pr_vivencial_d = $_POST['pr_vivencial_d'];
$pr_curricular_d = $_POST['pr_curricular_d'];
$pr_fiesta_d = $_POST['pr_fiesta_d'];
$pr_expo_d = $_POST['pr_expo_d'];

$actualizarCongreso = new Congreso();
$resultado = $actualizarCongreso->actualizar($lugar, $codigo, $ano, $inicio, $fin, $mes, $mes_ing, $mes_port, $pr_miem,
                                    $pr_gral, $costo_miem, $costo_gral, $pr_vivencial, $pr_curricular, $pr_fiesta,
                                    $pr_expo,$pr_miem_d, $pr_gral_d, $costo_miem_d, $costo_gral_d, $pr_vivencial_d, 
                                    $pr_curricular_d, $pr_fiesta_d, $pr_expo_d, $id);

  if ($resultado) {
      $mensaje = "<script>window.history.go(-2);</script>";
      echo $mensaje;
      }
      else{
        echo"<script language='JavaScript'>
              alert('Error: No pudimos actualizar');
              </script>";
        echo "<script>window.history.go(-2);</script>";
      }
 ?>