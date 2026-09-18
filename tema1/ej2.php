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

