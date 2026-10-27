<?php

namespace App\Bd;

use \PDOStatement;
use \PDOException;
use \PDO;

class Articulo extends Conexion
{
    private int $id;
    private string $nombre;
    private string $descripcion;
    private float $precio;

    private static function executeQuery(string $q, array $opciones = [], bool $devolverAlgo = false): bool|PDOStatement
    {
        $stmt = parent::getConexion()->prepare($q);
        try {
            $stmt->execute($opciones);
            return ($devolverAlgo) ? $stmt : false;
        } catch (PDOException $ex) {
            throw new PDOException("Error en executeQuery: " . $ex->getMessage());
        }
    }

    public function create(): void
    {
        $q = "insert into articulos(nombre, descripcion, precio) values(:n, :d, :p)";
        self::executeQuery(
            $q,
            [':n' => $this->nombre, ':d' => $this->descripcion, ':p' => $this->precio],
            false
        );
    }

    public static function delete(): void
    {
        $q = "delete from articulos";
        self::executeQuery($q);
    }

    public static function generarArticulos(int $cantidad)
    {
        $faker = \Faker\Factory::create('es_ES');
        for ($i = 0; $i < $cantidad; $i++) {
            $nombre = $faker->unique()->realText(20);
            $descripcion = $faker->realText(250);
            $precio = $faker->randomFloat(2, 50, 9999);
            (new Articulo)
                ->setNombre($nombre)
                ->setDescripcion($descripcion)
                ->setPrecio($precio)
                ->create();
        }
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
     * Set the value of descripcion
     *
     * @return  self
     */
    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */
    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }
}
