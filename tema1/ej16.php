<?php
//funciones anonimas
$saludar=function(){
    echo "<br>Hola, buenos días";
};
$saludar();
$saludar1=function(string $nombre="Anónimo"): void{
    echo "<br>Hola, $nombre";
};
$saludar1();
$saludar1("Ines");

$numeros=[-12, 4, 5, 6, 8, -90, 0, 45, 93, -112];
//nos interesa quedarnos con los pares
$numerosPares=[];
foreach($numeros as $valor){
    if($valor%2===0){
        $numerosPares[]=$valor;
    }
}
var_dump($numeros);
var_dump($numerosPares);
//Ahora con los positivos
$numerosPositivos=[];
foreach($numeros as $valor){
    if($valor>0){
        $numerosPositivos[]=$valor;
    }
}
var_dump($numerosPositivos);
$esPar=function(int $num): bool{
    return $num%2===0;
};
$esMayorQueCero=function(int $n): bool{
    return $n>0;
};
$numeros=[-12, 4, 5, 6, 8, -90, 0, 45, 93, -112];
function filtrarArray(array $arrayOriginal, callable $filtro): array{
    $datos=[];
    foreach($arrayOriginal as $valor){
        if($filtro($valor)) $datos[]=$valor;
    }
    return $datos;
}
$numPositivos=filtrarArray($numeros, $esMayorQueCero);
$numPares=filtrarArray($numeros, $esPar);
var_dump($numPositivos);
var_dump($numPares);
$misDatos=array_filter($numeros, $esPar);
var_dump($misDatos);





