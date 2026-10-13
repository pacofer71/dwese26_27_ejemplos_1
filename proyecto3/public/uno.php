<?php
require __DIR__."/../src/Producto.php";
require __DIR__."/../src/Usuario.php";
require __DIR__."/../src/Admin/Login.php";
require __DIR__."/../src/Admin/Backend/Clase.php";

use App\Producto;
use App\Usuario;
// use App\{Producto, Usuario}
use App\Admin\Login;
use App\Admin\Backend\Clase;

$producto1=new Producto("Televisor 32''", 167.89);
echo "El nombre del producto1 es: ".$producto1->nombre;
$usuario1=new Usuario("Manolo", "Almería");
echo "<br>La provincia de {$usuario1->user} es: {$usuario1->provincia}";

//podemos ahoorarnos el use PERO NO es recomendado
//$login1 = new App\Admin\Login("user1", "Pass1");
$login1=new Login("user1", "Pass1");
Clase::saludar("Ana");

echo "<hr>";
echo $usuario1::class;
echo "<br>";
echo Clase::class;