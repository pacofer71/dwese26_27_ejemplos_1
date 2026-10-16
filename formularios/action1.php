<?php
//recogemos los campos del formulario 1 a 1
$nombre=$_GET['nombre'];
$email=$_GET['email'];
$descripcion=$_GET['descripcion'];
$sueldo=$_GET['sueldo'];
$informacion=isset($_GET['informacion']) ? $_GET['informacion'] : "No seleccionado";
$categoria=$_GET['categoria'];
var_dump($_GET);
echo $informacion;
die();
echo "El nombre que se ha mandado es $nombre<br>";
echo "El email es: $email<br>";
echo "La descripcion es: $descripcion<br>";
echo "El sueldo es $sueldo<br>";