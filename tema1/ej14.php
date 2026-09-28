<?php
//Seguimos en el fabuloso mundo de las funciones
//parametros por defecto
function saludo($nombre="desconocido"){
    echo "<br>Hola $nombre";
}
saludo("Juan");
saludo();
saludo("Ana");
function datos($nombre, $edad, $esAdmin=false){
    echo ($esAdmin) ? "<br>Hola $nombre tu edad es $edad, eres Admin" :
    "<br>Hola $nombre tu edad es $edad, NO eres Admin";
}
datos("Manolo", 45);
datos("Ana", 56, true);
datos("Pepe", 32, false);
// hay que tener mucho cuidado con esto
function saludar($nombre="Anonimo", $mensaje){
    echo "<br>Hola $nombre, el mensaje para ti es: $mensaje";
}
saludar("Pepe", "Medico a las 15:00");
function datos2($nombre, $esAdmin="NO", $email="noemail@email.es"){
    echo "<hr>Nombre: $nombre, $esAdmin eres Administrador, tu email es: $email";
}
datos2("Juan", "SI", "juna@email.es");
datos2("Pedro");
datos2("Ana", "ana@email.es");
datos2("Lucas", "NO");
//podemos usar los nombres de los parametros en las llamadas a
//las funciones
//para quitarnos la ambiguedad
datos2(nombre: "Luis", email: "email@es");
datos2(email: "luismu@email.es", nombre: "Manolo lopez");
