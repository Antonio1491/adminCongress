<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.all.min.js"></script> 
  <link rel="stylesheet" href="../css/foundation/foundation.min.css">
  <title>Document</title>
</head>
<body>
</body>
</html>
<?php
session_start();
require('../class/funciones.php');

// $email = $mysqli->real_escape_string($_POST['email']);
// $password = $mysqli->real_escape_string($_POST['password']);
$email = $_POST['email'];
$password = $_POST['password'];

$comprobar = new Login();
$resultado = $comprobar->verificarCampos($email, $password);

echo $resultado;

 ?>
