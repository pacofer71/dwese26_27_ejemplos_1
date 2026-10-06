<?php
class PlanNoPlan implements Plan{
    public function precioFinal(float $dineroGastado): float{
        return $dineroGastado; // aplico un 0% de descuento
    }
}