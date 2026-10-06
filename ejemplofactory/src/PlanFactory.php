<?php
class PlanFactory{
    public function getPlan(Cliente $cliente): Plan{
        return match(true){
            $cliente->totalCompra>=10000 => new PlanPlatino,
            $cliente->totalCompra>=5000 => new PlanOro,
            $cliente->totalCompra>=2000 => new PlanPlata,
            $cliente->totalCompra>=1000 => new PlanBronce ,
            default => New PlanNoPlan

        };
    }
}