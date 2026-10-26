<?php
namespace App\Utils;

use App\Bbdd\Articulo;

abstract class Validacion{
    public static function limpiarCadenas(string $cadena): string{
        return htmlspecialchars(trim($cadena));
    }

    public static function esLongitudCadenaValida(string $nombreCampo, string $valorCampo, int $min, int $max): bool{
        if(strlen($valorCampo)<$min || strlen($valorCampo)>$max){
            $_SESSION["err_$nombreCampo"]="Error, se esperaba un valor entre $min y $max caracteres";
            return false;
        }
        return true;
    }
    public static function existeNombre(string $nombre, ?int $id=null): bool{
        if(Articulo::existeNombre($nombre, $id)){
            $_SESSION['err_nombre']="Error, el nombre ya está registrado.";
            return true;
        }
        return false;
    }

    public static function pintarError(string $nombreError): void{
        if(isset($_SESSION[$nombreError])){
            echo "<p class='mt-1 text-red-600 italic text-sm'>{$_SESSION[$nombreError]}</p>";
            unset($_SESSION[$nombreError]); //para que sea una session de tipo flash, solo un uso
        }
    }
}