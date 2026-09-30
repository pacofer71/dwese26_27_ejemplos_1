<?php
//Funciones recursivas.
//Cuenta antras
function cuentaAtras(int $numero)
{
    echo "$numero, ";
    if ($numero > 0) {
        cuentaAtras($numero - 1);
    }
}
cuentaAtras(10);
echo "<hr>";
function cuentaAtras1(int $numero)
{
    if ($numero < 0) return;
    echo "$numero, ";
    cuentaAtras1($numero - 1);
}
cuentaAtras1(10);
echo "<hr>";
//factorial de un numero n!
function factorial(int $numero)
{
    if ($numero == 0 || $numero == 1) return 1;
    return $numero * factorial($numero - 1);
}
$numero = 5;
echo "$numero !=" . factorial($numero);
//Fibonacci calcular el termin n de la sucesion
//con recursividad
function fibonacci(int $termino)
{
    if ($termino == 0 || $termino == 1) return $termino;
    return fibonacci($termino - 1) + fibonacci($termino - 2);
}
echo "<hr>";
$termino = 30;
echo "El termino $termino de fibonacci es: " . fibonacci($termino);
//---------------------------------------------
$producto1 = [
    'nombre' => 'Ordenadores',
    'subcategoria' => [
        [
            'nombre' => 'LCD',
            'subcategoria' => [],
        ],
        [
            'nombre' => 'TFT',
            'subcategoria' => [],
        ]
    ]
];
$producto2 = [
    'nombre' => 'Moviles',
    'subcategoria' => [
        [
            'nombre' => 'Android',
            'subcategoria' => [],
        ],
        [
            'nombre' => 'IPHONE',
            'subcategoria' => [
                [
                    'nombre'=>'Familia 13',
                    'subcategoria'=>[],
                ],
                [
                    'nombre'=>'Famila 18',
                    'subcategoria'=>[]
                ]
            ],
        ]
    ]
];
$productos = [
    $producto1, $producto2
];
