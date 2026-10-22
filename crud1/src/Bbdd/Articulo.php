<?php

namespace App\Bbdd;

use \PDOException;
use \PDO;

class Articulo extends Conexion
{
    private int $id;
    private string $nombre;
    private string $descripcion;


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
            (new Articulo())
                ->setNombre($nombre)
                ->setDescripcion($descripcion)
                ->create();
        }
    }

    public static function borrarTodo(): void
    {
        $q = "delete from articulos";
        $stmt = parent::getConexion()->prepare($q);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error en borrar todo: " . $ex->getMessage());
        }
    }

    public static function devolverTodo(): array
    {
        $q = "select * from articulos order by id desc";
        $stmt = parent::getConexion()->prepare($q);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ); 
        } catch (PDOException $ex) {
            die("Error en recuperar todo: " . $ex->getMessage());
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
