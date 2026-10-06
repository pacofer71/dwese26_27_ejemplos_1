<?php
class PlanPlata implements Plan{
    public function precioFinal(float $dineroGastado): float{
        return $dineroGastado*0.92; // aplico un 8% de descuento
    }
}