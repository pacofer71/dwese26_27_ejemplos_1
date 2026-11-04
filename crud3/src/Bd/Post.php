<?php
namespace App\Bd;

use \PDO;
use \PDOStatement;
use \PDOException;

class Post extends Conexion{
    private int $id;
    private string $titulo;
    private string $contenido;
    private string $estado;
    private string $imagen;
    private int $user_id;
    private int $category_id;

    private static function executeQuery(string $q, array $parametros=[], bool $devolverAlgo){

    }

    public static function recuperarPostsInicio(): array{

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
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Set the value of contenido
     *
     * @return  self
     */ 
    public function setContenido(string $contenido): self
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen(string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */ 
    public function setCategory_id(int $category_id): self
    {
        $this->category_id = $category_id;

        return $this;
    }
}