<?php
$andalucia=[
    'Almería',
    'Cádiz',
    'Córdoba',
    'Granada', 
    'Huelva',
    'Jaen',
    'Málaga',
    'Sevilla'
    ];
$extremadura=[
    'Badajoz',
    'Caceres',
];
$murcia=['Murcia'];
$comunidades=[$andalucia, $extremadura, $murcia];
var_dump($comunidades);
echo $comunidades[1][1];
echo "<hr>";
foreach($comunidades as $comunidad=>$provincias){
    echo "<ul>";
        echo "<li>Provincias</li>";
            echo "<ul>";
                foreach($provincias as $item){
                    echo "<li>$item</li>";
                }
            echo "</ul>"; 
    echo "</ul>";
}
$comunidades1=[
    'Andalucia'=>$andalucia, 
    'Extremadura'=>$extremadura, 
    'Murcia'=>$murcia
];
var_dump($comunidades1);
foreach($comunidades1 as $comunidad=>$provincias){
    echo "<ul>";
        echo "<li>$comunidad</li>";
            echo "<ul>";
                foreach($provincias as $item){
                    echo "<li>$item</li>";
                }
            echo "</ul>"; 
    echo "</ul>";
}
$valencia=['Alicante', 'Castellon', 'Valencia'];
$comunidades1['Valencia']=$valencia;
var_dump($comunidades1);