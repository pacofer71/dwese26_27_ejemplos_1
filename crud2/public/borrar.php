<?php

use App\Bd\Articulo;
require __DIR__."/../vendor/autoload.php";

session_start();
//protegemos la pagina para que solo un admin pueda acceder
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] != 1) {
    header("Location:sitio.php");
    exit;
}
//controlamos que ha esta pagina hayamos llegado desde el boton elimiar de un articulo y ademas
//establecemos que el valor del id debe ser entero
$id = filter_input(INPUT_POST, 'codigo', FILTER_VALIDATE_INT);
if (!$id) {
    header("Location:sitio.php");
    exit;
}
// Si todo ha ido bien elimino el articulo
Articulo::delete($id);
$_SESSION['mensaje'] = "Articulo eliminado de la base de datos";
header("Location:sitio.php");
