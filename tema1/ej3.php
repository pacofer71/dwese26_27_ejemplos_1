<?php
// Más funciones de cadena
// str_starts_with
//str_ends_with
//strrev
//str_replace
$cadena = "Hola Mundo";
if (str_starts_with($cadena, 'V')) {
    echo "Comienza con 'V'";
} else {
    echo "No comienza con 'V'";
}
echo "<hr>";
$cadenaAlReves = strrev($cadena);
echo "Cadena es $cadena y dada la vuelta es: $cadenaAlReves";
echo "<hr>";
$nombre = "Manolo";
$cadena = "Buenos dias Ana";
$saludo = str_replace('Ana', $nombre, $cadena);
echo "<br>";
echo "$saludo";
//------------------------------------------------------------
//Operadores 
/*
+ suma, 
++ incremento
- resta
-- decremento
* multiplicacion
/ division
% modulo
pow() ó ** potencia
*/
$num = 12;
echo "<br>El numero es " . $num++;
echo "<br>El numero es " . $num;
$num = 43;
echo "<br>El numero es " . ++$num;
echo "<br>El numero es " . $num;
//--------------------------------------------
$num = 2;
$num = $num + 2; // $num+=2;
$num = $num + 1;  //$num++, ++$num;
$num -= 5; //$num=$num-5
$num *= 8; //$num=$num*8;
$cadena = "Hola";
$cadena = $cadena . " Mundo"; //$cadena.=" Mundo";
//---------------------------------------------------
//operadores lógicos
/*
AND &&
NOT !
OR ||
Distinto !=, !==
Igual ==, ===
mayor que, mayor o igual que >, >=
menor que, menor o igua que  <, <=
*/
$numero1 = 12;
$numero2 = 12.0;
if ($numero1 == $numero2) {
    echo "<br>Las variables tiene el mismo valor";
} else {
    echo "<br>Las variables NO tiene el mismo valor";
}
if ($numero1 === $numero2) {
    echo "<br>Las variables tiene el mismo valor y el mismo tipo";
} else {
    echo "<br>Las variables NO tiene el mismo valor o el mismo tipo";
}
//--------------------------------------operador ternario para simplificar if else ? :
echo ($numero1 == $numero2) ?
    "<br>Las variables tiene el mismo valor" :
    "<br>Las variables NO tiene el mismo valor";
//---------------------------------------------------------------
//if() else if() else
// switch(){}
//match()
//Algoritmo para ordenar dos numeros y mostrarlos a < b ... a=b b<a
$num1 = 94;
$num2 = 34;
// 34 < 90
echo "<hr>";
if ($num1 > $num2) {
    echo $num2 . ' < ' . $num1;
} elseif ($num2 > $num1) {
    echo $num1 . ' < ' . $num2;
} else {
    echo $num1 . "=" . $num2;
}
//-----------------------------------------------
$dia = 4;
echo "<hr>";
switch ($dia) {
    case 1:
        echo "Lunes";
        break;
    case 2:
        echo "Martes";
        break;
    case 3:
        echo "Miércoles";
        break;
    case 4:
        echo "Jueves";
        break;
    case 5:
        echo "Viernes";
        break;
    case 6:
        echo "Sábado";
        break;
    case 7:
        echo "Domingo";
        break;
    default:
        echo "Numero de día Erroneo";
}
echo "<hr>";
switch ($dia) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo "Dia de diario.";
        break;
    case 6:
    case 7:
        echo "Fin de semana";
        break;
    default:
        echo "Dia Erróneo!!";
}
// match()
$color = "rojo";
$mensaje = match ($color) {
    "rojo" => "El color es rojo",
    "azul" => "El color es Azul",
    "verde" => "El color es Verde",
    default => "El color no es ni rojo, ni verde, ni azul!!"
};
echo "<br>";
echo $mensaje;
//-------
$edad = 12;
echo "<br>";
$etapa = match (true) {
    //$edad===6 => "Chequeando cosas",
    $edad < 13 => "Niño",
    $edad < 18 => "Adolescente",
    $edad >= 18 && $edad < 65 => "Adulto",
    $edad >= 65 => "Anciano",
    default => "Edad Inválida!!!"
};
echo "La etapa es: $etapa";
//--------------------------------------------------------------
/*
for(), while(), do while();

*/
echo '<br>';
for ($i = 1; $i < 10; $i += 2) {
    echo "$i, ";
}
echo "<br>_______________________<br>";
for ($i = 20; $i >= 1; $i--) {
    if ($i % 2 == 0) continue;
    echo "$i, ";
}
echo "<hr>";
for ($i = 20;; $i--) {
    if ($i <= 0) break;
    echo "$i, ";
}
// usar while para imprimir numeros del 20 al 1
echo '<hr>';
$num = 20;
while ($num > 0) {
    echo "$num, ";
    $num--;
}
//podemos usar break y continue
echo '<hr><hr>';
$num = 20;
while ($num > 0) {
    echo "$num, ";
    $num--;
}
