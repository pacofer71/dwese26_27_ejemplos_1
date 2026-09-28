<?php
saludo(); //la funciones son globales
function suma($a, $b)
{
    return $a + $b;
}
function saludo()
{
    echo "<br>Buenos días";
}
// es de buena praxis tipar las funciones aunque
// no sea obligatorio
function suma1(int|float $a, int|float $b): int|float
{
    return $a + $b;
}
saludo();
echo "<hr>";
saludo();
echo "<br>La suma de 5 y 67 es " . suma(5, 67);
$n1 = 67;
$n2 = 90;
echo "<br>La suma de $n1 y $n2 es " . suma($n1, $n2);
//echo $numero; esto daria un error
//$numero=909;
//------------------------------------------------------
function pintarTabla(int|float $filas, int $columnas, string $mensaje): void
{
    //validamos que filas y columnas sean enteros positivos
    if (!is_int($filas) || $filas <= 0 || !is_int($columnas) || $columnas <= 0) {
        //mostramos error y salimos
        echo "<br><b>Error se esperaban numeros entreros positivos!!!!";
        return;
    }
    if (strlen($mensaje) == 0) {
        echo "<br>No has pasado texto para las celdas!!!!";
        return;
    }
    echo "<table align='center' border='2'>";
    for ($i = 0; $i < $filas; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $columnas; $j++) {
            echo "<td>$mensaje</td>";
        }
        echo "</tr>";
    }

    echo "</table><hr>";
}
pintarTabla(4.7, 5, "Mensaje");
pintarTabla(0, 8, "mensaje");
pintarTabla(5, 8, "");
