<?php
// alcance (scope) de las variables
function ejemplo1($numero){
    $numero=200;
    echo "<br>numero en la funcion es: $numero";
}
$numero=90;
ejemplo1($numero);
echo "<br>numero fuera de la funcion es: $numero";
echo "<hr>";
//paso por referencia
function ejemplo2(&$numero){
     $numero=200;
    echo "<br>Ahora numero en la funcion es: $numero";
}
$numero2=90;
ejemplo2($numero2);
echo "<br>numero fuera de la funcion es: $numero2";
$valor=67;
function mostrarValor(){
    global $valor; //$GLOBALS['valor'];
    echo "<br> El valor es $valor";
    --$valor;
}
$valor=67;
mostrarValor();

echo "<br> El valor es $valor";
echo "<hr>";
var_dump($GLOBALS);



