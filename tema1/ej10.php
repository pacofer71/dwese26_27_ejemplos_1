<?php
//implode => array=>string
//explode => string =>array
//compact variables a array
$lista="Juan, pedro, ana, ines";
$users="manu::admin::1::admin@email";
$datos=['Uno', 'Dos', 'Tres', 'Cuatro'];
$ej1=implode(' ', $datos);
echo $ej1;
$miArray=explode(', ', $lista);
$miArray2=explode('::', $users);
var_dump($miArray);
var_dump($miArray2);
$u="user1";
$p="pass1";
$valores=compact('u', 'p');
var_dump($valores);






