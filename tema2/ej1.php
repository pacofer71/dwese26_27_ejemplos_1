<?php
//POO
class Coche
{
    public string $marca;
    public string $modelo;
    public int $kilometros;
    private float $precio;
    public bool $disponible;

   /* public function __construct(
        string $marca,
        string $modelo,
        int $kilometros,
        float $precio,
        bool $disponible = false,
    ) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->kilometros = $kilometros;
        $this->precio = $precio;
        $this->disponible = $disponible;
    }
        */
    public function __construct(){}
   

    /**
     * Get the value of marca
     *
     * @return string
     */
    public function getMarca(): string
    {
        return $this->marca;
    }

    /**
     * Set the value of marca
     *
     * @param string $marca
     *
     * @return self
     */
    public function setMarca(string $marca): self
    {
        $this->marca = $marca;
        return $this;
    }

    /**
     * Get the value of modelo
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set the value of modelo
     */
    public function setModelo(string $modelo): self
    {
        $this->modelo = $modelo;
        return $this;
    }

    /**
     * Get the value of kilometros
     */
    public function getKilometros()
    {
        return $this->kilometros;
    }

    /**
     * Set the value of kilometros
     */
    public function setKilometros(int $kilometros): self
    {
        $this->kilometros = $kilometros;
        return $this;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     */
    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;
        return $this;
    }

    /**
     * Get the value of disponible
     *
     * @return bool
     */
    public function getDisponible(): bool
    {
        return $this->disponible;
    }

    /**
     * Set the value of disponible
     *
     * @param bool $disponible
     *
     * @return self
     */
    public function setDisponible(bool $disponible): self
    {
        $this->disponible = $disponible;
        return $this;
    }
}
/*$coche1 = new Coche('Seat', 'Ibiza', 2000, 14.456, true);
var_dump($coche1);
echo "La marca de coche1 es: " . $coche1->marca . "<br>";
$coche1->disponible = false;
var_dump($coche1);
//---------------------clonado de objetos
echo "<hr><hr>";
$coche2 = $coche1; //no se crea una copia coche2 y coche1 es el mismo objeto!!!!!!!!
var_dump($coche2);
$coche2->modelo = "Arona";
var_dump($coche1);
var_dump($coche2);
// si queremos crear una copia independiente usaremos clone
$coche3 = clone($coche1);
echo "<center>____________________________</center>";
var_dump($coche3);
$coche3->marca = 'Renault';
var_dump($coche1);
var_dump($coche3);
//---------------------------------------------------
//echo $coche1->precio; nos da error al ser precio privado;
// Al tener los setters el return $this podemos hacer lo siguiente
*/
$coche1=new Coche()
    ->setMarca('Seat')
    ->setModelo('Ibiza')
    ->setKilometros(12345)
    ->setDisponible(false)
    ->setPrecio(34.567);
/* Es mas claro que hacerlo asi que tambien seria correcto
$coche=new Coche();
$coche->setMArca('sdfsd');
$coche->setModelo('sdfsdfsdf);
.........
......
*/
