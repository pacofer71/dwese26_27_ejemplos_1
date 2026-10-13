<?php
namespace App\Admin\Backend;
class Clase{
    public static function saludar(string $nombre="Desconocido"): void{
        echo "<br>Buenos días $nombre";
    }
}