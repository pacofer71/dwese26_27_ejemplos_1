<?php
class Usuario
{
    /*
    private string $nombre;
    private array $cargos=[];
    private float $sueldo;

    public function __construct(string $nombre, array $cargos, float $sueldo){
        $this->nombre=$nombre;
        $this->cargos=$cargos;
        $this->sueldo=$sueldo;
    }
        */
    public function __construct(private string $nombre, private array $cargos, private float $sueldo) {}

    

    /**
     * Get the value of nombre
     */ 
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of sueldo
     */ 
    public function getSueldo(): float
    {
        return $this->sueldo;
    }

    /**
     * Set the value of sueldo
     *
     * @return  self
     */ 
    public function setSueldo(float $sueldo): self
    {
        $this->sueldo = $sueldo;

        return $this;
    }

    /**
     * Get the value of cargos
     */ 
    public function getCargos(): array
    {
        return $this->cargos;
    }

    /**
     * Set the value of cargos
     *
     * @return  self
     */ 
    public function setCargos(array $cargos): self
    {
        $this->cargos = $cargos;

        return $this;
    }
}
