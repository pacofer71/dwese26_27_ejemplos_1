<?php

namespace App\Utils;

use App\Bd\Categoria;
use App\Bd\Usuario;

abstract class Validacion
{
    public static function sanearCadena(string $cad): string
    {
        return htmlspecialchars(trim($cad));
    }

    public static function longitudCadenaValida(string $nc, string $vc, int $min, int $max): bool
    {
        if (strlen($vc) < $min || strlen($vc) > $max) {
            $_SESSION["err_$nc"] = "*** Error se esperaba una longitud de entre $min y $max caracteres";
            return false;
        }
        return true;
    }
    public static function categoriaValida(int $idCat): bool
    {
        if (!in_array($idCat, Categoria::devolverIdsCategorias())) {
            $_SESSION['err_categoria'] = "*** Error categoria no seleccionada o inválida";
            return false;
        }
        return true;
    }
    public static function estadoValido(string $estado): bool
    {
        if (!in_array($estado, ['Publicado', 'Borrador'])) {
            $_SESSION['err_estado'] = "*** Error, estado inválido o no seleccionado";
            return false;
        }
        return true;
    }

    public static function imagenValida(string $tipo, int $size): bool
    {
        $tiposMimeImagenes = [
            // Formatos tradicionales
            'image/jpeg',
            'image/png',
            'image/gif',
            'image/bmp',
            'image/tiff',

            // Formatos modernos
            'image/webp',
            'image/avif',
            'image/heic',
            'image/heif',
            'image/jxl',

            // Formatos vectoriales
            'image/svg+xml',

            // Otros formatos
            'image/x-icon',
            'image/vnd.microsoft.icon',
            'image/x-tga',
            'image/x-xbitmap'
        ];
        if(!in_array($tipo, $tiposMimeImagenes)){
            $_SESSION['err_imagen']="*** Error se esperaba un archivo de imagen válido";
            return false;
        }
        if($size>2000000){
            $_SESSION['err_imagen']="*** Error la imagen no piede exceder los 2 Mb";
            return false;
        }
        return true;
    }

    public static function loginValido(string $email, string $password): bool
    {
        if (!Usuario::esLoginValido($email, $password)) {
            $_SESSION['err_login'] = "*** Error, email o password incorrectos";
            return false;
        }
        return true;
    }

    public static function pintarError(string $nombre): void
    {
        if (isset($_SESSION[$nombre])) {
            echo "<p class='mt-1 text-red-600 text-sm italic'>" . $_SESSION[$nombre] . "</p>";
            unset($_SESSION[$nombre]);
        }
    }
}
