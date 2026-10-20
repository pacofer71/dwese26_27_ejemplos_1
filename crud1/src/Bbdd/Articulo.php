<?php

namespace App\Bbdd;

use \PDOException;

class Articulo extends Conexion
{
    private int $id;
    private string $nombre;
    private string $descripcion;

    public function __construct()
    {
        
    }
    // CRUD __________________________
    public function create(): void
    {
        $q = "insert into articulos(nombre, descripcion) values(:n, :d)";
        //$q="insert into articulos(nombre, descripcion) values(?, ?)";
        //Usremos consultas preparadas para evitar
        //inyeccion maliciosa de sql
        $stmt = parent::getConexion()->prepare($q);
        try {
            $stmt->execute([
                ':n' => $this->nombre,
                ':d' => $this->descripcion,
            ]);
        } catch (PDOException $ex) {
            die("Error en insertar: " . $ex->getMessage());
        }
    }

    public static function crearRegistrosFalsos(int $cantidad): void
    {
        $faker = \Faker\Factory::create('es_ES');
        for ($i = 0; $i < $cantidad; $i++) {
            $nombre = $faker->unique()->words(2, true);
            $descripcion = $faker->text();
            $articulo = new Articulo()
                ->setNombre($nombre)
                ->setDescripcion($descripcion)
                ->create();
        }
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
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
     * Get the value of descripcion
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */
    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}
