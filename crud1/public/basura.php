<?php
require __DIR__."/../vendor/autoload.php";

use App\Bbdd\Articulo;
use App\Bbdd\Conexion;



//Conexion::getConexion();
//Articulo::crearRegistrosFalsos(10);
$articulos=Articulo::devolverTodo();
var_dump($articulos);