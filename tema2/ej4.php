<?php
class Prueba
{
    private static int $id = 0;
    private string $nombre;
    private ?string $cargo = null;
    private array $provincias = [];

    public function __construct()
    {
        self::$id++;
    }

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
     * Get the value of cargo
     */
    public function getCargo(): string
    {
        return $this->cargo;
    }

    /**
     * Set the value of cargo
     *
     * @return  self
     */
    public function setCargo(string $cargo): self
    {
        $this->cargo = $cargo;

        return $this;
    }

    public static function setId(int $id): void
    {
        // $this->id=$id; esto falla pq $id es estatico
        self::$id = $id;
    }
    public static function getId(): int
    {
        return self::$id;
    }

    public function getProvincias(): array
    {
        return $this->provincias;
    }

    public function setProvincias(array $provs): self
    {
        $this->provincias = $provs;
        return $this;
    }
    //------------
    public function __toString(): string{
        $cad="El nombre es ".$this->nombre.", el cargo: ". $this->cargo. ", el id actualmente es: ".self::$id;
        $cad1="";
        foreach($this->provincias as $prov){
            //
        }
    }
}
$prueba1 = new Prueba();
$p = ['Almería', 'Málaga', 'Jaen'];
var_dump($prueba1);
$prueba1->setNombre("Prueba1")
    ->setCargo("CArgo 1")
    ->setProvincias($p);
var_dump($prueba1);
//------
echo "<hr>";
echo "El atributo nombre en prueba1 es {$prueba1->getNombre()}";
// echo "El atributo nombre en prueba1 es ". $prueba1->getNombre();
//-----------------------------------------------
echo "<br>";
echo "Vamos a ver el objeto entero: " .$prueba1;

