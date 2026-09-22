<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body bgcolor='silver'>
    <h2>
        <center>TABLAS</center>
    </h2>
    <?php
    // vamos a hacer una tabla html donde a aprzca la tabla de multiplicar de 
    // $num=lo que sea
    $numero = 3;
    echo "<table border='1' align='center'>\n";
    echo "<tr>\n";
    echo "<td colspan='5'>";
    echo "Tabla de Multiplicar del $numero";
    echo "</td>";
    echo "</tr>\n";
    for ($i = 1; $i <= 10; $i++) {
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
        echo ($i * $numero);
        echo "</td>";
        echo "</tr>\n";
    }
    echo "</table>";
    echo "<hr><hr>";
    ?>
    <!-- <?php echo $numero ?> es lo mismo que <?= $numero ?> -->
    <table border='2' align='center'>
        <tr>
            <td colspan="5">
                Tabla de multiplicar de <?= $numero ?>
            </td>
        </tr>
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <tr align='center'>
                <td><?= $numero; ?></td>
                <td>X</td>
                <td><?= $i; ?></td>
                <td>=</td>
                <td><?= ($numero * $i); ?></td>
            </tr>
        <?php endfor ?>

    </table>
    <!-- -----------tabla de $filas x $columnas ------------------------ -->
    <hr>
    <?php
        $filas = 10;
        $columnas = 7;
    ?>
    <h1><center>Tabla de <?= $filas.' X '.$columnas; ?></center></h1>
    <table align='center' border='2'>
            <?php
                $acumulador=1; 
                for($f=1; $f<=$filas; $f++): ?>
                <tr align='center'>
                    <?php for($c=1; $c<=$columnas; $c++): ?>
                        <td><?= $acumulador++; ?></td>
                    <?php endfor; ?>

                </tr>
            <?php endfor; ?>
    </table>
    <br><br><br>
    <!-- Vamos a tunear la tabla anterior para que las filas pares las pinte de verde -->
     <!-- bgcolor='green' en la fila que toque -->
      <h1><center>Tabla de <?= $filas.' X '.$columnas.' y filas pares verde' ; ?></center></h1>
    <table align='center' border='2'>
            <?php
                $acumulador=1; 
                for($f=1; $f<=$filas; $f++):
                    $color=($f%2===0) ? 'green' : ''; 
            ?>
                <tr align='center' bgcolor=<?= $color; ?>>
                    <?php for($c=1; $c<=$columnas; $c++): ?>
                        <td><?= $acumulador++; ?></td>
                    <?php endfor; ?>

                </tr>
            <?php endfor; ?>
    </table>


</body>

</html>