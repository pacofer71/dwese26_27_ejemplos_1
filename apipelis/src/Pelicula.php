<?php
namespace App;

class Pelicula{
    const IMAGEN="https://image.tmdb.org/t/p/w500";
    public function  __construct(
        public readonly string $titulo,
        public readonly string $sinopsis,
        public readonly float $puntuacion,
        public ?string $imagen=null
    )
    {
        $this->imagen=($imagen!=null) ? self::IMAGEN.$imagen : null;
    }
}