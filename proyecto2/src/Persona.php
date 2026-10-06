<?php

class Persona{
    protected static string $empresa="EMPRESA DE PERSONA";
    protected string $nombre;
    protected int $edad;

    public function __construct(string $n, int $e)
    {
        $this->nombre=$n;
        $this->edad=$e;
    }

    
    public function __toString(): string{
        //return "Nombre: ".$this->nombre.", edad: ".$this->edad.", Empresa: ".static::$empresa;
        return "Nombre: ".$this->nombre.", edad: ".$this->edad.", Empresa: ".self::$empresa;
    }
}
