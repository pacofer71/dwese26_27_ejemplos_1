<?php
//recogemos los campos del formulario 1 a 1
$nombre=$_GET['nombre'];
$email=$_GET['email'];
$descripcion=$_GET['descripcion'];
$sueldo=$_GET['sueldo'];
$informacion=isset($_GET['informacion']) ? $_GET['informacion'] : "No seleccionado";
$aficiones=isset($_GET['aficiones']) ? $_GET['aficiones']  : [];
$categoria=$_GET['categoria'];

//echo "LA aficiones selecionadas han sido: <br>";
if(count($aficiones)){
    echo "<ol>";
    foreach($aficiones as $item){
        echo "<li>$item</li>";
    }
    echo "</ol>";
}else{
    echo "NO seleccionó ninguna aficion";
}
/*
var_dump($_GET);
echo $informacion;
die();
echo "El nombre que se ha mandado es $nombre<br>";
echo "El email es: $email<br>";
echo "La descripcion es: $descripcion<br>";
echo "El sueldo es $sueldo<br>";
*/