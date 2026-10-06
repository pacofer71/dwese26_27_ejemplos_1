<?php
class Empleado extends Persona{
    public static string $empresa="Empresa Chula";
    public array $cargos=[];


    public function __construct(string $n, string $e, array $c)
    {
        parent::__construct($n, $e);
        $this->cargos=$c;
    }

    #[Override]
    public function __toString(): string
    {
       return parent::__toString().", Cargos: ".implode(", ", $this->cargos);
    }
}