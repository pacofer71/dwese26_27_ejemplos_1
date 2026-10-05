<?php
//require, require_once, include, include_once
//require __DIR__ . "/../src/Usuario.php";
//require __DIR__ . "/../src/Producto.php";
//require __DIR__ . "/../src/Prueba.php";
//require __DIR__ . "/../src/backend/Admin.php";
//llegado un momento importar todos los archivos de clases se vuelve 
//tedioso, podemos y debemos automatizarlo
spl_autoload_register(function(string $class){
    //die($class); //exit;
    $carpetas=[
        __DIR__."/../src/",
        __DIR__."/../src/backend/",
        __DIR__."/../src/frontend/",
    ];
    foreach($carpetas as $carpeta){
        $fichero=$carpeta . $class .".php";
        if(file_exists($fichero)){
            require $fichero;
            return;
        }
    }
    //$ruta=__DIR__."/../src/".$class.".php";
    //require $ruta;
    //die($ruta);

});

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $k=new Manolo();
    $usuario1 = new Usuario("asda", ["asd", "add"], 123.67);
    echo "El nombre es :" . $usuario1->getNombre();
    /* no podemos hacer esto pq el constructor espera los tres parametros
    y no tenemos sobrecarga
    $usuario2 = new Usuario()
        ->setNombre('Manuel')
        ->setCargos(['cargo 1', 'cargo 2'])
        ->setSueldo(2345.78);
    */
    $producto1= new Producto()
    ->setNombre("Producto1")
    ->setCategorias(['cat1', 'cat2'])
    ->setPrecio(12344.67);
    echo "<br>El nombre de producto1 es: {$producto1->getNombre()}";
    $producto2=new Producto('producto2', ['as', 'aSD'], 1234);
    echo "<br>El nombre de producto2 es: {$producto2->getNombre()}";

    ?>
</body>

</html>