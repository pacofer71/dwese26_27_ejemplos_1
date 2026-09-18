<?php
$nombre="Manolo";
$numero = (int) $nombre;
//funciones utiles de cadena
// numeros de carcteres strlen
$cantidad=strlen($nombre);
echo "$nombre tiene $cantidad caracteres";
$pais="España";
echo "<br>$pais tiene".  strlen($pais). " caracteres";
// para evitar esto mb_strlen()
$cantidad=mb_strlen($pais, 'UTF-8');
echo "<br>$pais tiene $cantidad caracteres";
//poner una cadena en mayusculas strtoupper()
$cadena="manolo perez";
$cadenaM=strtoupper($cadena);
echo "<br>$cadenaM";
//en minisculas strtolower()
$cadena="MaNolo PerEz";
$cadenaL=strtolower($cadena);
echo "<br>$cadenaL";
//primera letra en mayuscula ucfirst()
$cadena="pepe perez";
$cadena1=ucfirst($cadena);
echo "<br>$cadena1";
//primera letra de cada palabra em mayusculas ucwords()
$cadena1=ucwords($cadena);
echo "<br>$cadena1";
//quitar espacios en blanco atras y adelante trim(), en medio NO
$cadena="     datos    ";
echo "<br>La longitud de $cadena es: ".strlen($cadena);
$cadenaLimpia=trim($cadena);
echo "<br>La longitud de $cadenaLimpia es: ".strlen($cadenaLimpia);
//solo a la izquierda ltrim
//solo a la derecha rtrim()
//substr(cadena, inicio, longitud) extrae parte de una cadena
$cadena = "Hola Mundo";
$trozo= substr($cadena, 0, 4);
echo "<br>$trozo";
$trozo1=substr($cadena, 5, 5);
echo "<br>$trozo1";
$trozo3=substr($cadena, 100, 2);
echo "<hr>";
echo $trozo3;
var_dump($trozo3);  //para depuracion hace un volcado de una variable
//str_contains vemos si una cadena contiene a otra
$cadena="manolo@email.es";
$dato=str_contains($cadena, 'Manolo');
var_dump($dato);
