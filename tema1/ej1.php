<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor='aqua'>
    <h1><center>TEMA 1</center></h1>
    <?php
        echo "Hola Mundo";
        echo "<br>"; // salto de linea
        echo '<b>Adios mundo</b>';
        // comentario de una linea
        echo "<br>Multilineas";
        /*
        esto
        son 
        varias lineas
        */
    ?>

    <hr>
    <?php
        //podemos poner tantos bloques php como queramos
        // VARIABLES simepre con $;
        $num1=123; 
        echo $num1;
        $num1="Cadena de texto";
        echo "<br>";
        echo $num1;
        echo "<br>";
        echo gettype($num1); //devuelve el tipo de variable
        $cadena1="Hola";
        echo "<br>";
        echo "La cadena1 es: $cadena1";
         echo "<br>";
        echo 'La cadena1 es: $cadena1';
        //------------------------------------------------------
        // caracteres de escape \
        echo "<br>";
        echo "La cadena1 es \$cadena1";
        echo "<br>\n";
        echo "Hola \"Adios\"\n";
        echo "<br>";
        echo 'Hoal "ADIOS"';
        echo "<br>";
        echo 'HOLA \'Mundo\'';
        echo "<br>";
        echo "HOLA:\tManolo";
        //-------------------------------------------------------------------
        // PHP_EOL
        //casting
        echo "<hr>";
        $num1=23;
        $num2=34.6;
        $num3 = (int) $num2;
        $num4 = (float) $num1;
        echo "num3=$num3 y el tipo es: ".gettype($num3); // . concatena cadenas similar a +  en java
        echo "<br>";
        echo "num4=$num4 y el tipo es: ".gettype($num4);
        echo "<hr>";
        $cad="as123manolo";
        $cad1= (int) $cad;
        echo "cad1=$cad1 y el tipo es: ".gettype($cad1);
        echo $valor;







    ?>
</body>
</html>