<?php
class Persona{
    private static int $id=0;
    public string $nombre;
    private float $sueldo;
    public array $puestos;
     public function __construct()
     {
        self::$id++;
        //($this->id)++ NO pq es estaticpo
     }


    /**
     * Get the value of nombre
     *
     * @return string
     */
    public function getNombre(): string {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @param string $nombre
     *
     * @return self
     */
    public function setNombre(string $nombre): self {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * Get the value of sueldo
     *
     * @return float
     */
    public function getSueldo(): float {
        return $this->sueldo;
    }

    /**
     * Set the value of sueldo
     *
     * @param float $sueldo
     *
     * @return self
     */
    public function setSueldo(float $sueldo): self {
        $this->sueldo = $sueldo;
        return $this;
    }
    

    /**
     * Get the value of id
     */ 
    public static function getId()
    {
        return self::$id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public static function setId(int $id)
    {
        self::$id = $id;
    }
    // metodo toString, Método mágicos
    public function __toString(): string{
        
    } 
}
$persona1=new Persona();
$persona1->setNombre("Manolo")->setSueldo(1234.67);
$persona1->puestos=['Admin', 'Becario'];
$persona2=new Persona();
$persona2->setNombre("Ana")->setSueldo(4567.90);
$persona2->puestos=['Admin', 'Gerente'];

//echo "<br> El id de persona1 es: ".$persona1::getId(); Lo correcto seria
echo "<br> El id de persona1 es: ".Persona::getId();
//
$persona1::setId(25); // es correcto pero es mejor poner
Persona::setId(12);
var_dump($persona1);
var_dump($persona2);

echo "<br>";
//echo "El nombre de persona1 es: ". $persona1->nombre. "y Los puestos son ".$persona1->puestos; 