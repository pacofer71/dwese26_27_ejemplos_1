<?php
namespace App;

class Persona{
    public function __construct(
        public readonly string $nombre,
        public readonly string $apellidos,
        public readonly float $sueldo,
        public readonly string $username,
        public readonly string $email,
        public readonly string $descripcion,
        public readonly array $provincias)
    {}
    public static function generarPersonas(int $cantidad): array{
        $faker = \Faker\Factory::create('es_ES');
     
        // Vamos a crearnos unas provincias, por ejemplo 10
        $provincias=[];
        for($i=0; $i<10; $i++){
            $provincias[]=$faker->state();
        }
        //generamos las personas
       $personas=[];
        for($i=0; $i<$cantidad; $i++){
            $nombre=$faker->firstName();
            $apellidos=$faker->lastName()." ".$faker->lastName();
            $email=$faker->unique()->email();
            $username=$faker->unique()->username();
            $descripcion=$faker->realText();
            $sueldo=$faker->randomFloat(2, 1400, 6000);
            $provs=$faker->randomElements($provincias, 3);

            $persona=new Persona($nombre, $apellidos, $sueldo, $username, $email, $descripcion, $provs);
            $personas[]=$persona;
        }
        return $personas;
    }
}