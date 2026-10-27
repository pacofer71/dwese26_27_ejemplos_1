<?php

use App\Bd\Articulo;
use App\Bd\Usuario;

require __DIR__."/../vendor/autoload.php";

function crearUsuarios(int $cantidad){
    echo "\n1.- Borrando Usuarios anteriores.\n";
    Usuario::delete();
    echo "\n2.- Creando $cantidad Usuarios.\n";
    Usuario::generarUsuariosFake($cantidad);
    echo "\nFIN, Usuarios creados.\n";
}
function crearArticulos(int $cantidad){
    echo "\n1.- Borrando Articulos anteriores.\n";
    Articulo::delete();
    echo "\n2.- Creando $cantidad Articulos.\n";
    Articulo::generarArticulos($cantidad);
    echo "\nFIN, Articulos creados.\n";
}

echo "\n##### GENERANDO DATOS DE PRUEBA #####\n";
do{
    $cantidad=(int) readline("\nDame el numero de usuarios (5-10): ");
    if($cantidad<5 || $cantidad>10){
        echo "\nError se esperaba un numero entre 5 y 10\n";
    }else{
        crearUsuarios($cantidad);
    }
}while($cantidad<5 || $cantidad>10);
//---------- Crear Articulos
do{
    $cantidad=(int) readline("\nDame el numero de Articulos (50-100): ");
    if($cantidad<50 || $cantidad>100){
        echo "\nError se esperaba un numero entre 50 y 100\n";
    }else{
        crearArticulos($cantidad);
    }
}while($cantidad<50 || $cantidad>100);