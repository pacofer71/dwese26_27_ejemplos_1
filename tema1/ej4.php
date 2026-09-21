<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor='silver'>
    <h2><center>TABLAS</center></h2>
    <?php
        // vamos a hacer una tabla html donde a aprzca la tabla de multiplicar de 
        // $num=lo que sea
        $numero=3;
        echo "<table border='1' align='center'>\n";
        echo "<tr>\n";
            echo "<td colspan='5'>";
            echo "Tabla de Multiplicar del $numero";
            echo "</td>";
        echo "</tr>\n";
        for($i=1; $i<=10; $i++){
            echo "<tr>\n";
                echo "<td>";
                    echo $numero;
                echo "</td>";
                echo "<td>";
                    echo 'X';
                echo "</td>";
                echo "<td>";
                    echo $i;
                echo "</td>";
                echo "<td>";
                    echo '=';
                echo "</td>";
                echo "<td>";
                    echo ($i*$numero);
                echo "</td>";
            echo "</tr>\n";
        }
        echo "</table>";
        echo "<hr><hr>";
    ?>
    <!-- <?php echo $numero?> es lo mismo que <?=  $numero ?> -->
    <table border='2' align='center'>
        <tr>
            <td colspan="5">
                Tabla de multiplicar de <?= $numero ?>
            </td>
            <?php for($i=1; $i<=10; $i++): ?>
                
            <?php endfor ?> 
        </tr>
    </table>
</body>
</html>