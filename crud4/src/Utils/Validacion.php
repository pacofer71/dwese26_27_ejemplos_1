<?php

namespace App\Utils;

use App\Bd\Categoria;
use App\Bd\Usuario;

abstract class Validacion
{
    public static function sanearCadena(string $cadena): string
    {
        return htmlspecialchars(trim($cadena));
    }

    public static function longitudCadenaValida(string $n, string $v, int $min, int $max): bool
    {
        if (strlen($v) < $min || strlen($v) > $max) {
            $_SESSION["err_$n"] = "*** Error, se esperaba una longitud entr $min y $max caracteres";
            return false;
        }
        return true;
    }

    public static function categoriaValida(int $categoria): bool
    {
        $ids = Categoria::getIdCategorias();
        if (!in_array($categoria, $ids)) {
            $_SESSION['err_categoria'] = "*** Error, categoria inválida o no seleccionada";
            return false;
        }
        return true;
    }
    public static function publicadoValido(string $publicado): bool
    {
        if (!in_array($publicado, ['Si', 'No'])) {
            $_SESSION['err_publicado'] = "*** Error, publicado inválido o no seleccionado";
            return false;
        }
        return true;
    }

    public static function imagenValida(string $tipo, int $size): bool
    {
        $tiposMimePermitidos = [
            'image/jpeg',
            'image/png',
            'image/gif',
            'image/webp',
            'image/svg+xml',
            'image/bmp',
            'image/tiff',
            'image/avif',
            'image/x-icon'
        ];
        if(!in_array($tipo, $tiposMimePermitidos)){
            $_SESSION['err_imagen']="*** Error, se esperaba un archivo de imagen";
            return false;
        }
        if($size>2000000){
            $_SESSION['err_imagen']="*** Error la imagen excede los 2Mb permitidos";
            return false;
        }
        return true;
    }



    public static function loginValido(string $email, string $pass): int
    {
        $perfil = Usuario::esLoginValido($email, $pass);
        if ($perfil == -1) {
            $_SESSION['err_login'] = "*** Error email o password incorrectos";
        }
        return $perfil;
    }

    public static function pintarError(string $nombre): void
    {
        if (isset($_SESSION[$nombre])) {
            echo "<p class='text-red-600 italic text-sm'>" . $_SESSION[$nombre] . "</p>";
            unset($_SESSION[$nombre]);
        }
    }
}
