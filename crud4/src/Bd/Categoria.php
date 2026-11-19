<?php

namespace App\Bd;

use \PDO;
use \PDOException;
use \PDOStatement;

class Categoria extends Conexion
{
    private int $id;
    private string $nombre;
    private string $color;

    private static function executeQuery(string $q, array $opciones = [], bool $devolverAlgo = false): bool|PDOStatement
    {
        $stmt = parent::getConexion()->prepare($q);
        try {
            $stmt->execute($opciones);
            return $devolverAlgo ? $stmt : false;
        } catch (PDOException $ex) {
            throw new PDOException("Error al ejecutar consulta: " . $ex->getMessage());
        }
    }

    public function crear()
    {
        $q = "insert into categorias(nombre, color) values(:n, :c)";
        self::executeQuery(
            $q,
            [':n' => $this->nombre, ':c' => $this->color],
            false
        );
    }

    public static function read(): array
    {
        $q = "select * from categorias order by nombre";
        $stmt = self::executeQuery($q, [], true);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public static function getCategoriaById(int $id): array
    {
        $q = "select * from categorias where id=:i";
        $stmt = self::executeQuery($q, [':i' => $id], true);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public static function getIdCategorias(): array
    {
        $q = "select id from categorias";
        $stmt = self::executeQuery($q, [], true);
        $datos = $stmt->fetchAll(PDO::FETCH_OBJ);
        $ids = [];
        foreach ($datos as $dato) {
            $ids[] = $dato->id;
        }
        return $ids; //[1,2,3,4,5]
    }
    public static function existeCategoria(string $nombre, int $id=-1): bool
    {
        $q = "select 1 from categorias where nombre=:n AND id!=:i";
        $stmt = self::executeQuery($q, [':n' => $nombre, ':i'=>$id], true);
        $datos = $stmt->fetchAll(PDO::FETCH_OBJ);
        return count($datos) != 0;
    }

    public static function delete(int $id)
    {
        $q = "delete from categorias where id=:i";
        self::executeQuery($q, [':i' => $id]);
    }
    public function update(int $id)
    {
        $q = "update categorias set nombre=:n, color=:c where id=:i";
        self::executeQuery(
            q: $q,
            opciones: [':n' => $this->nombre, ':c' => $this->color, ':i' => $id],
            devolverAlgo: false
        );
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
     * Set the value of color
     *
     * @return  self
     */
    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }
}
