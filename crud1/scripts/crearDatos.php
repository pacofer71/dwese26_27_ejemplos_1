<?php

use App\Bbdd\Articulo;

require __DIR__."/../vendor/autoload.php";
function crearArticulos(int $cantidad){
    echo "\n 1.- Borrando todos los articulos";
    Articulo::borrarTodo();
    echo "\n 2.- Crando $cantidad articulos";
    Articulo::crearRegistrosFalsos($cantidad);
    echo "\n Se han creado $cantidad articulos.";
}

echo "\n######### SCRIPT PARA CREAR ARTICULOS #########\n";
do{
    $cantidad= (int) readline("\n Dime la cantidad de articulos (10-100)? ");
    if($cantidad<10 || $cantidad>100){
        echo "\nError, se esperaba un numero entre 10 y 100\n";
    }else{
        crearArticulos($cantidad);
    }

}while($cantidad<10 || $cantidad>100);