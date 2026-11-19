<?php

use App\Bd\Categoria;

$id=filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if(!$id){
    header("Location: admin.php");
    exit;
}
session_start();
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] != 1) {
    header("Location:./../");
    exit;
}
require __DIR__."/../../vendor/autoload.php";
Categoria::delete($id);
$_SESSION['mensaje']="Categoria eliminada.";
header("Location: admin.php");
