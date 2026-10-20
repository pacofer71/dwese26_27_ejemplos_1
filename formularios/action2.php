<?php
$nombre=$_POST['nombre'];
echo "El nombre enviado por el formulario es: $nombre";
$aficiones=isset($_POST['aficiones']) ? $_POST['aficiones']  : [];

if(count($aficiones)){
    echo "<ol>";
    foreach($aficiones as $item){
        echo "<li>$item</li>";
    }
    echo "</ol>";
}else{
    echo "NO seleccionó ninguna aficion";
}