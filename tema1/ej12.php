<?php
$andalucia=['sevilla', 'cordoba', 'jaen', 'malaga', 'almeria', 'granada', 'cadiz'];
$extremadura=['caceres, badajoz'];
$valencia=['valencia', 'alicante', 'castellon'];
$comunidades=[
    'extremadura'=>$extremadura,
    'andalucia'=>$andalucia,
    'valencia'=>$valencia,
];

/*
Mostraremos en :
    1.- una lista las comunidades ordenadas por nombre y 
        para cada comunidad sus provincias ordenadas por nombre
    2.- Tres tablas como las de ayer dos filas por tabla nombre comunidad
        y debajo en otra fila sus provincias cada una en una celda
        ordenaremoslas tablas por nombre de comunidad y orden de provincias
        es decir primero andalucia con sus provincas ordenadas, luego extremadura...
*/