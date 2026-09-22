<?php
//numeros promos son aquellos mayores o iguales que dos
//que sus uncos dividores son ellos mismos y la unidad
//por ejemplo el 7, el 13, el 19
//el 6 no lo seriA LOS DIVISORES DE 6 SON 1, 2, 3, 6
//1.- Programa que dado un numero >10 me de su numero de divisores
$numero = 14;
$contadorDivisores = 0;
for ($i = 1; $i <= $numero; $i++) {
    if ($numero % $i === 0) {
        $contadorDivisores++;
    }
}
echo "<br>$numero tiene $contadorDivisores divisores";
//2.- Programa que dado un numero >10 me de su numero de divisores y me los muestre
echo "<hr>";
$contadorDivisores = 0;
for ($i = 1; $i <= $numero; $i++) {
    if ($numero % $i === 0) {
        echo "$i, "; //muestro
        $contadorDivisores++;  //cuento
    }
}
echo "<br>$numero tiene $contadorDivisores divisores";
//3.- Programa que dado un numero >10 me diga si es o no primo
$numero = 100;
$contadorDivisores = 0;
for ($i = 1; $i <= $numero; $i++) {
    if ($numero % $i === 0) {
        $contadorDivisores++;
    }
}
if ($contadorDivisores > 2) {
    echo "<br>$numero NO es primo";
} else {
    echo "<br>$numero SI es primo";
}
echo '<br>';
echo ($contadorDivisores > 2) ? "<br>$numero NO es primo" : "<br>$numero SI es primo";


//4.- Programa que dado un numero >10 me diga si es o no primo Algoritmo mejorada
$numero = 1000000000000000000;
//$contadorDivisores=0;
$esPrimo=true;
for ($i = 2; $i < $numero; $i++) {
    if ($numero%$i === 0) {
        echo "<br>$numero NO es primo";
        $esPrimo=false;
        break;
    }
}
if($esPrimo){
    echo "<br>$numero SI es primo";
}
//5.- Programa que me de todos los numeros primos entre 2 y 100, por ejemplo 2, 3, 5, 7...
echo '<hr>';
for($candidato=2; $candidato<=1000; $candidato++){
    //ponemos el algoritmo de primos visto antes para cada candidato
    //si es primo lo mostramos, si no nada
    $esPrimo=true;
    for($i=2; $i<$candidato;$i++){
        if($candidato%$i===0){
            $esPrimo=false;
            break;
        } 
    }
    if($esPrimo) echo "$candidato, ";

}
//6.- Programa que me de todos los numeros primos entre 2 y 100, por ejemplo 2, 3, 5, 7...
// y los cuente y me diga cuantos hay
echo '<hr>';
$cantidad=0;
for($candidato=2; $candidato<=1000; $candidato++){
    //ponemos el algoritmo de primos visto antes para cada candidato
    //si es primo lo mostramos, si no nada
    $esPrimo=true;
    for($i=2; $i<$candidato;$i++){
        if($candidato%$i===0){
            $esPrimo=false;
            break;
        } 
    }
    if($esPrimo){
        echo "$candidato, "; //lo muestro
        $cantidad++; // lo cuento
    }
}
echo "<br>Entre 2 y 1000 hay un total de $cantidad primos";
//7.- Programa que me de todos los numeros primos entre a>2 y b>2 (a!=b), por ejemplo 2, 3, 5, 7...
// y los cuente y me diga cuantos hay. a y b nos pueden llegar desordenados es decir no sabemos
//cual es mayor de los dos;
$a=20; 
$b=10;
// $a=100000, $b=5
// Empezaremos ordenando a y b 
$menor=($a<$b) ? $a : $b;
$mayor= ($a<$b) ? $b : $a;
echo '<hr>';
$cantidad=0;
for($candidato=$menor; $candidato<=$mayor; $candidato++){
    //ponemos el algoritmo de primos visto antes para cada candidato
    //si es primo lo mostramos, si no nada
    $esPrimo=true;
    for($i=2; $i<$candidato;$i++){
        if($candidato%$i===0){
            $esPrimo=false;
            break;
        } 
    }
    if($esPrimo){
        echo "$candidato, "; //lo muestro
        $cantidad++; // lo cuento
    }
}
echo "<br>Entre $menor y $mayor hay un total de $cantidad primos";





