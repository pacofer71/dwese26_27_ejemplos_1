<?php
namespace App\Utils;

use App\Bd\Articulo;
use App\Bd\Usuario;

abstract class Validacion{
    public static function sanearCadena(string $cadena): string{
        return htmlspecialchars(trim($cadena));
    }

    public static function esLoginValido(string $username, string $password): int{
        $perfil=Usuario::esLoginValido($username, $password);
        if($perfil==-1){
            $_SESSION['err_login']="***Error, usuario o contraseña incorrecta";
        }
        return $perfil;
    }

    public static function pintarError(string $nombreError): void{
        if(isset($_SESSION[$nombreError])){
            echo "<p class='text-red-600 text-sm italic mt-1'>{$_SESSION[$nombreError]}</p>";
            unset($_SESSION[$nombreError]);
        }
    }
}