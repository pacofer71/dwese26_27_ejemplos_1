<?php
class PlanBronce implements Plan{
    public function precioFinal(float $dineroGastado): float{
        return $dineroGastado*0.95; // aplico un 5% de descuento
    }
}