<?php
namespace App\Utils;

use App\Bd\Usuario;

abstract class Validacion{
    public static function sanearCadena(string $cad): string{
        return htmlspecialchars(trim($cad));
    }

    public static function loginValido(string $email, string $password): bool{
        if(!Usuario::esLoginValido($email, $password)){
            $_SESSION['err_login']="*** Error, email o password incorrectos";
            return false;
        }
        return true;
    }

    public static function pintarError(string $nombre): void{
        if(isset($_SESSION[$nombre])){
            echo "<p class='mt-1 text-red-600 text-sm italic'>".$_SESSION[$nombre]."</p>";
            unset($_SESSION[$nombre]);
        }
    }
}