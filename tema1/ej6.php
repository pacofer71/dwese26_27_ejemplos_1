<?php
// Hacer un tablero de ajedrez usando php y html (tablas)
$dim = 8;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>
        <center>Tablero de Ajedrez</center>
    </h3>
    <table align='center' border='2' cellpadding='10'>
        <?php for ($i = 0; $i < $dim; $i++): ?>
            <tr>
                <?php for ($j = 0; $j < $dim; $j++):
                    /*
                    if ($i % 2 === 0) {
                        //filas Pares
                        $color = ($j%2===0) ? 'white' : 'black';
                    } else {
                         $color = ($j%2===0) ? 'black' : 'white';
                    } */
                   $color=($i%2===$j%2) ? 'white' : 'black';
                         ?>
                    <td bgcolor='<?= $color ?>'>&nbsp;&nbsp;&nbsp;</td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
    <hr>
    <?php
        // Escribir un programa que me muestre $cantidad de numeros primos empezando por
        //2, es decir si $cantidad=5 mostraremos los 5 primeros primos
        //2,3,5,7,11
        $cantidad=1000;
        $inicio=2;
        do{
            $esPrimo=true;
            for($i=2; $i<$inicio; $i++){
                if($inicio%$i===0){
                    $esPrimo=false;
                    break;
                }
            }
            if($esPrimo){
                $cantidad--;
                echo "$inicio, ";
            }
            $inicio++;
        }while($cantidad>0)
    ?>
</body>

</html>