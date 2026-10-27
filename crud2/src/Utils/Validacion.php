<?php
namespace App\Utils;
abstract class Validacion{
    public static function sanearCadena(string $cadena): string{
        return htmlspecialchars(trim($cadena));
    }
}