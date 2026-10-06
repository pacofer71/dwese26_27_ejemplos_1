<?php
 spl_autoload_register(function(string $nombreClase){
    $ruta= __DIR__."/../src/".$nombreClase.".php";
    require $ruta;
 });

$cliente1 = new Cliente('Ana', 23450);
$cliente2 = new Cliente('Tomas', 7654);
$cliente3 = new Cliente('Maria', 4654.8);
$cliente4 = new Cliente('Lucas', 1654);
$cliente5 = new Cliente('Tomas', 54);

//--------- Veamos que plan nos devuelve para cada cliente
$planCliente1=(new PlanFactory())->getPlan($cliente1);
echo "<br>El plan del cliente1 llamado {$cliente1->nombre} y que se ha gastado {$cliente1->totalCompra} es: "
.$planCliente1::class;
echo "<br>Este cliente se gastó: {$cliente1->totalCompra}, y al final pagará: "
.$planCliente1->precioFinal($cliente1->totalCompra);
//-------
$planCliente2=(new PlanFactory())->getPlan($cliente2);
echo "<br>El plan del cliente2 llamado {$cliente2->nombre} y que se ha gastado {$cliente2->totalCompra} es: "
.$planCliente2::class;
echo "<br>Este cliente se gastó: {$cliente2->totalCompra}, y al final pagará: "
.$planCliente2->precioFinal($cliente2->totalCompra);
//-------
$planCliente5=(new PlanFactory())->getPlan($cliente5);
echo "<br>El plan del cliente1 llamado {$cliente5->nombre} y que se ha gastado {$cliente5->totalCompra} es: "
.$planCliente5::class;
echo "<br>Este cliente se gastó: {$cliente5->totalCompra}, y al final pagará: "
.$planCliente5->precioFinal($cliente5->totalCompra);
//-------