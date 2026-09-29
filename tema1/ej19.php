<?php
//ejercicios func anonimas
/*
1.- Crear funcion anonima que reciba un nombre y devuelva Hola nombre
    si no se recibe ningun nombre Hola desconocid@
2.-crear una funcion anonima llmada $sumar que reciba dos numeros y devuelva la suma
3.- crear una funcion anonima que reciba un numero y devuelva el doble
4.- dado un array numerico normal usar array map o filter (piensa cual) para obtener 
    una array con el cubo de los numeros
5.- usar array map o filter ()piensa cual para dado un array de nombres
    construir un array con sus mayusculas
6.- con el array anterior usar array map o filter (pensar) para construir un array
    con las que empiezen por vocal a, e, i, o, u ó A, E, I, O, U,

7.- dado el array:

    $albaran=[
    ['nombre'=>'Teclado', 'pvp'=>45.78, 'disponible'=>'SI', 'stock'=>12],
    ['nombre'=>'Raton', 'pvp'=>5.78, 'disponible'=>'NO', 'stock'=>115],
    ['nombre'=>'TV', 'pvp'=>245.78, 'disponible'=>'SI', 'stock'=>1523],
    ['nombre'=>'Portatil', 'pvp'=>1245.78, 'disponible'=>'NO', 'stock'=>9],
    ]
a) Ordenarlo por stock de mayor a menor,
b) mostrar solos aquellos productos cuyo stock>=10,
c) un array con los nombres todo en mayusculas
d) mostrar los disponibles
e) mostrar aquellos cuyo precio sea >100 Y NO esten disponibles
*/
//1.- 
$saludo = fn($n = 'Anonim@') => "Hola $n";
// 2.-
$sumar = fn($a, $b) => $a + $b;
//3.- 
$doble = fn($n) => $n * 2;
//4.- 
$nums = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
$numsCubo = array_map(fn($v) => $v ** 3, $nums);
var_dump($numsCubo);
//5.- 
$nombres = ['ana', 'pedro', 'juan', 'ines', 'lucas', 'Amalia', 'amaro', 'pepe'];
$nomMayuscula = array_map(fn($t) => strtoupper($t), $nombres);
var_dump($nomMayuscula);
// 6.-
$arrayVocales = ['a', 'e', 'i', 'o', 'u'];
$empiezaPorVocal = function ($nombre) use ($arrayVocales) {
    return in_array(strtolower($nombre[0]), $arrayVocales);
};
$nombresVocales = array_filter($nombres, $empiezaPorVocal);
var_dump($nombresVocales);
//7.- 
$albaran = [
    ['nombre' => 'Teclado', 'pvp' => 45.78, 'disponible' => 'SI', 'stock' => 12],
    ['nombre' => 'Raton', 'pvp' => 5.78, 'disponible' => 'NO', 'stock' => 115],
    ['nombre' => 'TV', 'pvp' => 245.78, 'disponible' => 'SI', 'stock' => 1523],
    ['nombre' => 'Portatil', 'pvp' => 1245.78, 'disponible' => 'NO', 'stock' => 9],
];
//a)
usort($albaran, fn($a, $b)=>$b['stock']<=>$a['stock']);
var_dump($albaran);
//b)
$mayor10=array_filter($albaran, fn($v)=>$v['stock']>11);
var_dump($mayor10);
//c)
$albaran1=array_map(fn($v)=>strtoupper($v['nombre']), $albaran);
var_dump($albaran1);
//d) 
$disponibles=array_filter($albaran, fn($p)=>$p['disponible']=='SI');
var_dump($disponibles);

//e)
$disponibles1=array_filter($albaran, fn($p)=>($p['disponible']=='NO') && ($p['pvp']>100));
var_dump($disponibles1);

