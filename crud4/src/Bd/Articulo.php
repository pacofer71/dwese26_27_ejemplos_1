<?php
namespace App\Bd;
 use \PDO;
 use \PDOException;
 use \PDOStatement;

 class Articulo extends Conexion{
    private int $id;
    private string $titulo;
    private string $contenido;
    private string $publicado;
    private int $categoria_id;
    private int $usuario_id;
    private string $imagen;

    private static function executeQuery(string $q, array $opciones=[], bool $devolverAlgo=false): bool|PDOStatement{
        $stmt=parent::getConexion()->prepare($q);
        try{
            $stmt->execute($opciones);
            return $devolverAlgo ? $stmt : false;
        }catch(PDOException $ex){
            throw new PDOException("Error al ejecutar consulta: ".$ex->getMessage());
        }
    }

    public static function devolverArticulosInicio(): array{
        $q="select articulos.*, nombre, color, email from articulos
        join usuarios on usuarios.id=articulos.usuario_id
        join categorias on categorias.id=articulos.categoria_id
        where publicado='Si' order by created_at desc";

        $stmt=self::executeQuery($q, [], true);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public static function getArticulosByEmail(string $email): array{
         $q="select articulos.*, nombre, color from articulos
        join usuarios on usuarios.id=articulos.usuario_id
        join categorias on categorias.id=articulos.categoria_id
        where email=:e order by created_at desc";

        $stmt=self::executeQuery($q, [':e'=>$email], true);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
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
    public function setTitulo(string $titulo):self
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Set the value of contenido
     *
     * @return  self
     */ 
    public function setContenido(string $contenido):self
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Set the value of publicado
     *
     * @return  self
     */ 
    public function setPublicado(string $publicado):self
    {
        $this->publicado = $publicado;

        return $this;
    }

    /**
     * Set the value of categoria_id
     *
     * @return  self
     */ 
    public function setCategoria_id(int $categoria_id):self
    {
        $this->categoria_id = $categoria_id;

        return $this;
    }

    /**
     * Set the value of usuario_id
     *
     * @return  self
     */ 
    public function setUsuario_id(int $usuario_id):self
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen(string $imagen):self
    {
        $this->imagen = $imagen;

        return $this;
    }
 }