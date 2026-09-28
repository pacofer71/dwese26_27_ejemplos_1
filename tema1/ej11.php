<?php
/*Metodos para ordenar un array en php
1.- sort
2.- rsort
3.- asort
4.- arsort
5.- ksort
6.- krsort
*/
$ejemplo=[
    1=>"manolo",
    'pass'=>"zapatero",
    7=>"casa",
    'nombre'=>'barca',
    'un valor más',
];
//var_dump($ejemplo);
//Veamos sort
echo "<br><center>array ejemplo Antes de sort()</center><br>";
var_dump($ejemplo);
sort($ejemplo);
echo "<br><center>array ejemplo DESPUES de sort()</center><br>";
var_dump($ejemplo);
$ejemplo=[
    1=>"manolo",
    'pass'=>"zapatero",
    7=>"casa",
    'nombre'=>'barca',
    'un valor más',
];
//Veamos rsort
echo "<br><center>array ejemplo Antes de rsort()</center><br>";
var_dump($ejemplo);
rsort($ejemplo);
echo "<br><center>array ejemplo DESPUES de rsort()</center><br>";
var_dump($ejemplo);
//----------------------
$ejemplo=[
    1=>"manolo",
    'pass'=>"zapatero",
    7=>"casa",
    'nombre'=>'barca',
    'un valor más',
];
//Veamos rsort
echo "<br><center>array ejemplo Antes de asort()</center><br>";
var_dump($ejemplo);
asort($ejemplo);
echo "<br><center>array ejemplo DESPUES de asort()</center><br>";
var_dump($ejemplo);
//----------------------
$ejemplo=[
    1=>"manolo",
    'pass'=>"zapatero",
    7=>"casa",
    'nombre'=>'barca',
    'un valor más',
];
//Veamos arsort-------------------
echo "<br><center>array ejemplo Antes de arsort()</center><br>";
var_dump($ejemplo);
arsort($ejemplo);
echo "<br><center>array ejemplo DESPUES de arsort()</center><br>";
var_dump($ejemplo);
//-----------------------------------------------------
$ejemplo=[
    1=>"manolo",
    'pass'=>"zapatero",
    7=>"casa",
    'nombre'=>'barca',
    'un valor más',
];
//Veamos ksort-------------------
echo "<br><center>array ejemplo Antes de ksort()</center><br>";
var_dump($ejemplo);
ksort($ejemplo);
echo "<br><center>array ejemplo DESPUES de ksort()</center><br>";
var_dump($ejemplo);
//-----------------------------------------------------
$ejemplo=[
    1=>"manolo",
    'pass'=>"zapatero",
    7=>"casa",
    'nombre'=>'barca',
    'un valor más',
];
//Veamos krsort-------------------
echo "<br><center>array ejemplo Antes de krsort()</center><br>";
var_dump($ejemplo);
krsort($ejemplo);
echo "<br><center>array ejemplo DESPUES de krsort()</center><br>";
var_dump($ejemplo);
