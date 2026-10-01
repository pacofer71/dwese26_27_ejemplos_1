<?php
class Persona{
    /*
    public string $nombre;
    public int $edad;
    public function __construct(string $nombre, int $edad){
        $this->nombre=$nombre;
        $this->edad=$edad;
    }
        */
    public function __construct(public string $nombre, private int $edad){

    }
    public function setEdad(int $edad){
        $this->edad=$edad;
        return $this;
    }
}
$persona1=new Persona('Manolo', 67);
var_dump($persona1);
$persona1->nombre="Manuel Jesus";
//$persona1->edad=100 Error edad es privado usaremos el setter
$persona1->setEdad(90);