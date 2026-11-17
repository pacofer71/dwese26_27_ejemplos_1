<?php

use App\Bd\Articulo;
use App\Bd\Usuario;

session_start();
function salir()
{
    header("Location:admin.php");
    exit;
}
if(!isset($_SESSION['email'])){
    salir();
}
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    salir();
}
//hemos mandado un id de articulo a borrar
//necesitamos comprobar que el articulo le pertenece al usuario
//logeado
require __DIR__."/../../vendor/autoload.php";
$userId=Usuario::getIdUserByEmail($_SESSION['email']);
$arrayArticulo=Articulo::articuloPerteneceUsuario($userId, $id);
if(count($arrayArticulo)==0){
    //estamos intentando borrar un articulo que NO nos pertenece
    header("Location:prohibido.php");
    exit;
}
//Todo fue bien vamos a borrar
Articulo::borrar($id);
//borro imagen si NO es default.jpg;
$imagen=$arrayArticulo[0]->imagen; // /imagenes/nombre.jpg
if(basename($imagen)!='default.jpg'){
    unlink("./..$imagen");
}
$_SESSION['mensaje']="Articulo eliminado";
salir();

