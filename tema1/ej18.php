<?php
//funciones flecha
//para crear funciones anonimas muy sencillas
//siempre tienen que devolver algo

$doble = fn($numero) => $numero * 2;
$doble1 = function ($v) {
    return $v * 2;
};
$valores = [1, 2, 5, 6, 7, 1, 2];
$cuboValores = array_map(
    fn($v) => $v ** 3,
    $valores
);
$nombres = ['manolo', 'ana gil', 'pedro', 'lucas gomez'];
$nombre1 = array_map(
    fn($v) => ucwords($v),
    $nombres
);
//las funciones flechas capturan variables externas
$iva=0.21;
$precioMasIva=fn($p)=>$p*(1+$iva);
//---------------------------------------------------------------
$productos=[
    ['nombre'=>'Teclado', 'pvp'=>45.78, 'disponible'=>'SI'],
    ['nombre'=>'Raton', 'pvp'=>5.78, 'disponible'=>'NO'],
    ['nombre'=>'TV', 'pvp'=>245.78, 'disponible'=>'SI'],
    ['nombre'=>'Portatil', 'pvp'=>1245.78, 'disponible'=>'NO'],
];

//queremos un array pero por ejemplo SOLO de los nombres
$nombres=array_map(fn($valor)=>$valor['nombre'], $productos);
var_dump($nombres);
// ahora me quiero quedar con los productos disponibles
$disponibles=array_filter($productos, fn($valor)=>$valor['disponible']=='SI');
var_dump($disponibles);
// usort permite ordenar arrays indicando el orden
$numeros=[1,3,-45, 78, 90, 100, 23];
var_dump($numeros);
echo "<br>Apliquemos usort al array<br>";
usort($numeros, function($a, $b){ //podemos usar fn($a, $b)=>$a<=>$b
    return $a<=>$b;
});
var_dump($numeros);
usort($numeros, fn($a, $b)=>$b<=>$a);
var_dump($numeros);
$productos=[
    ['nombre'=>'Teclado', 'pvp'=>45.78, 'disponible'=>'SI'],
    ['nombre'=>'Raton', 'pvp'=>5.78, 'disponible'=>'NO'],
    ['nombre'=>'TV', 'pvp'=>245.78, 'disponible'=>'SI'],
    ['nombre'=>'Portatil', 'pvp'=>1245.78, 'disponible'=>'NO'],
];
//queremos el arrat productos ordenado por precio de menor a mayor
usort($productos, fn($p1, $p2)=>$p1['pvp']<=>$p2['pvp']);
var_dump($productos);
usort($productos, fn($p1, $p2)=>$p2['pvp']<=>$p1['pvp']);
var_dump($productos);

