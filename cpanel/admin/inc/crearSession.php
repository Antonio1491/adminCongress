
<?php session_start();
include('../../class/funciones.php');
$evento = $_GET["evento"];
$_SESSION["evento"] = $evento; 

$congreso = new Congreso();
$array_datos = $congreso->datosCongreso($evento);
foreach ($array_datos as $valor){
    $_SESSION["lugar"] = $valor["lugar"]; 
}

header("Location: ../boletos.php");
?>