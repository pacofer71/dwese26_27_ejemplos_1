<?php
namespace App\Bd;
use \PDO;
use \PDOStatement;
use \PDOException;

class Categoria extends Conexion{
    private int $id;
    private string $nombre;
    private string $color;

     private static function executeQuery(string $q, array $parametros = [], bool $devolverAlgo = false): bool|PDOStatement
    {
        $stmt = parent::getConexion()->prepare($q);
        try {
            $stmt->execute($parametros);
            return ($devolverAlgo) ? $stmt : false;
        } catch (PDOException $ex) {
            throw new PDOException("Error en query: " . $ex->getMessage());
        }
    }
    public static function read(): array{
        $q="select id, nombre from categorias order by nombre";
        $stmt=self::executeQuery($q, [], true);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public static function devolverIdsCategorias(): array{
        $q="select id from categorias";
        $stmt=self::executeQuery($q, [], true);
        $datos=$stmt->fetchAll(PDO::FETCH_OBJ);
        $ids=[];
        foreach($datos as $dato){
            $ids[]=$dato->id;
        }
        return $ids;
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