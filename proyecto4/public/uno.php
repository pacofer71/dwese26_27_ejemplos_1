<?php

use App\Backend\ClaseBackend;
use App\Ejemplo1;
use App\Frontend\ClaseFrontend;

require __DIR__."/../vendor/autoload.php";

$claseEjemplo1=new Ejemplo1("Manolo", 45);
$claseBackend1=new ClaseBackend("Clase Backend", 89);
$claseFontend1= new ClaseFrontend("C_fontend", 45);
echo $claseBackend1->nombre;
echo "<br>";
echo $claseBackend1->edad;