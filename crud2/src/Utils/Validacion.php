<?php
namespace App\Utils;

use App\Bd\Articulo;
use App\Bd\Usuario;

abstract class Validacion{
    public static function sanearCadena(string $cadena): string{
        return htmlspecialchars(trim($cadena));
    }

    public static function longitudCadenaValida(string $nombreCampo, string $valorCampo, int $min, int $max): bool{
        if(strlen($valorCampo)<$min || strlen($valorCampo)>$max){
            $_SESSION["err_$nombreCampo"]="*** Error se esperaba un cadena de entre $min y $max caracteres";
            return false;
        }
        return true;
    }
    public static function esPrecioValido(float $valor, float $min, float $max){
        if($valor<$min || $valor>$max){
            $_SESSION['err_precio']="*** Error se esperaba un precio entre $min y $max";
            return false;
        }
        return true;
    }

    public static function esLoginValido(string $username, string $password): int{
        $perfil=Usuario::esLoginValido($username, $password);
        if($perfil==-1){
            $_SESSION['err_login']="***Error, usuario o contraseña incorrecta";
        }
        return $perfil;
    }

    public static function existeNombre(string $nombre, int $id=-1): bool{
        if(Articulo::existeNombreArticulo($nombre, $id)){
            $_SESSION['err_nombre']="*** Error \"$nombre\" YA existe en nuestros registros";
            return true;
        }
        return false;
    }

    public static function pintarError(string $nombreError): void{
        if(isset($_SESSION[$nombreError])){
            echo "<p class='text-red-600 text-sm italic mt-1'>{$_SESSION[$nombreError]}</p>";
            unset($_SESSION[$nombreError]);
        }
    }
}