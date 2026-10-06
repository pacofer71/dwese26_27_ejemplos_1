<?php
class EmpleadoBanca extends Persona{
    public static string $empresa="Empresa Bancaria";
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