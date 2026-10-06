<?php
class PlanPlatino implements Plan{
    public function precioFinal(float $dineroGastado): float{
        return $dineroGastado*0.85; // aplico un 15% de descuento
    }
}