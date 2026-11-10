<?php
session_start();
use App\Bd\Post;
if(!isset($_SESSION['email'])){
    header("Location:login.php");
    exit;
}
$id=filter_input(INPUT_POST, 'idPost', FILTER_VALIDATE_INT);
if(!$id){
    header("Location:index.php");
    exit;
}
require __DIR__."/../vendor/autoload.php";
if(!Post::postPerteneceUsuario($_SESSION['email'], $id)){
    header("Location:prohibido.php");
    exit;
}
// Ya podemos borra post e imagen
//cargo la imagen del post
$post=Post::findPostById($id);
$imagen=$post->imagen; // /imagenes/213287631276123.jpg
if(basename($imagen)!='default.jpg'){
    unlink(".$imagen");
}
Post::delete($id);
$_SESSION['mensaje']="Post eliminado";
header("Location:admin.php");
