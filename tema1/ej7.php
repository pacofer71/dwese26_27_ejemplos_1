<?php
//Arrays en php
$a=[1,5,7,8,0];
var_dump($a);
for($i=0; $i<count($a); $i++){
    echo $a[$i].", ";
}
$a[]=34;
var_dump($a);
$a[1]=56;
var_dump($a);
$a[]="Manolo";
var_dump($a);
//----------------------
$a[45]=34;
$a[-45]=12;
$a[12]="Pepe";
var_dump($a);
//---------------
echo "<hr>";
//for($i=0; $i<count($a); $i++){
//    echo $a[$i].", ";
//}
echo "<br>";
print_r($a);
//-------------------------
echo "<hr>";
foreach($a as $k=>$v){
    echo "a[$k]=$v<br>";
}
// si solo queremos los valores
echo "<br>";
foreach($a as $v){
    echo "$v, ";
}
//--------------
//si queremos eliminar un elemento
unset($a[0]);
var_dump($a);
unset($a[6]);
var_dump($a);
unset($a[500]);
$a[]="Que indice sere";
var_dump($a);
unset($a[46]);
$a[]="Que indice sere otra vez";
var_dump($a);
//---------------Arrays asociativos
$b=[
    'nombre'=>"Juan",
    'edad'=>23,
    'email'=>'juan@email.es',
    'sueldo'=>123.5,
    'jefe'=>false
];
var_dump($b);
echo "<br>El nombre es: {$b['nombre']}";
echo "<br>El nombre es: ".$b['nombre'];
$b['nombre']='Ana';
var_dump($b);
$b[]="Otro dato inutil";
var_dump($b);
$b[]="Otro más";
var_dump($b);
$b['clave']="12123123";
var_dump($b);
foreach($b as $k=>$v){
    echo  "El indice $k = $v<br>";
}
//--------------------------------------------------------
// array_keys se queda con los indices
// array_values se queda con los valores
$claves=array_keys($b);
$valores=array_values($b);
echo "<br>___________CLAVES______________";
var_dump($claves);
echo "<br>____________VALORES_______________";
var_dump($valores);










