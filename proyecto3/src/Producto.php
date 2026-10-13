<?php
namespace App;
class Producto{
    public function __construct(public readonly string $nombre, public readonly float $pvp){}
}