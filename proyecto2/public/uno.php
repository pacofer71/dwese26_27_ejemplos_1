<?php
 spl_autoload_register(function(string $nombreClase){
    $ruta= __DIR__."/../src/".$nombreClase.".php";
    require $ruta;
 });

 //$persona1=new Persona('Ana', 56);
 $empleado1=new Empleado('Lucas', 45, ['Becario', 'Temporal', 'Administrativo']);
 //echo $persona1;
 echo "<br>";
 echo $empleado1;
 $empleado2=new EmpleadoBanca('Pedro', 45, ['Becario', 'Temporal', 'Administrativo']);
  echo "<br>";
 echo $empleado2;
 //---------------------------------
 //$persona1->cargos=['12', '122', '2131']; NO se puede hacer
