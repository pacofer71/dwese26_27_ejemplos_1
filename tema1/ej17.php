<?php
$iva = 0.21;
$precioMasIva = function ($p) use ($iva) {
    return $p * (1 + $iva);
};

$precio = 124.67;
echo "<br>El precio de la tele de $precio € será: " . $precioMasIva($precio);
$cuadrado = function ($n) {
    return $n * $n; //$n**2
};
$doble = function ($n) {
    return $n * 2;
};
$cubo = function ($n) {
    return $n ** 3; //$n*$n*$n
};
function calcularResultado(int|float $numero, callable $operacion)
{
    return $operacion($numero);
}
$valor = 56.6;
echo "<br>El cuadrado de $valor seria: " . calcularResultado($valor, $cuadrado) . " Hola";
echo "<br>El doble de $valor seria: " . calcularResultado($valor, $doble);
echo "<br>El cubo de $valor seria: " . calcularResultado($valor, $cubo);
//-----------------------------------
// array_map
$nombres = ['manolo', 'ana gil', 'pedro', 'lucas gomez'];
$nombres1 = array_map(function ($texto) {
    return ucwords($texto);
}, $nombres);
var_dump($nombres1);
$nombres2 = array_map(function ($texto) {
    return strtoupper($texto);
}, $nombres);
var_dump($nombres2);
$valores = [1, 2, 5, 78.9, 54, 12, -23];
//usaremos array_map para dar el cuadrado de todos los elementos de valores
$cuadrados = array_map(function ($v) {
    return $v ** 2;
}, $valores);
$cuadrados1= array_map($cuadrado, $valores);
var_dump($cuadrados);
var_dump($cuadrados1);



