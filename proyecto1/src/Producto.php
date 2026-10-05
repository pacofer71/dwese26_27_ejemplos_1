<?php
class Producto
{
    private string $nombre;
    private array $categorias=[];
    private float $precio;

    public function __construct(){
        if(func_num_args()==3){
            $this->setearCampos(func_get_arg(0), func_get_arg(1), func_get_arg(2));
        }
        
    }
    private function setearCampos(string $campo1, array $campo2, float $campo3){
        $this->nombre=$campo1;
        $this->categorias=$campo2;
        $this->precio=$campo3;
    }
        
   // public function __construct(private string $nombre, private array $cargos, private float $sueldo) {}

    

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
    public function getPrecio(): float
    {
        return $this->precio;
    }

    /**
     * Set the value of sueldo
     *
     * @return  self
     */ 
    public function setPrecio(float $precio): self
    {
        $this->precio=$precio;

        return $this;
    }

    /**
     * Get the value of cargos
     */ 
    public function getCategorias(): array
    {
        return $this->categorias;
    }

    /**
     * Set the value of cargos
     *
     * @return  self
     */ 
    public function setCategorias(array $categorias): self
    {
        $this->categorias=$categorias;

        return $this;
    }
}