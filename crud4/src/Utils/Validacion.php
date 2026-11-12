<?php
namespace App\Utils;

use App\Bd\Usuario;

abstract class Validacion{
    public static function sanearCadena(string $cadena): string{
        return htmlspecialchars(trim($cadena));
    }

    public static function loginValido(string $email, string $pass): int{
        $perfil=Usuario::esLoginValido($email, $pass);
        if($perfil==-1){
            $_SESSION['err_login']="*** Error email o password incorrectos";
        }
        return $perfil;

    }

    public static function pintarError(string $nombre): void{
        if(isset($_SESSION[$nombre])){
            echo "<p class='text-red-600 italic text-sm'>".$_SESSION[$nombre]."</p>";
            unset($_SESSION[$nombre]);
        }
    }
}