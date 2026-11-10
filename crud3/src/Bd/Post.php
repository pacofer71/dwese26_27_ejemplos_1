<?php

namespace App\Bd;

use \PDO;
use \PDOStatement;
use \PDOException;
use stdClass;

class Post extends Conexion
{
    private int $id;
    private string $titulo;
    private string $contenido;
    private string $estado;
    private string $imagen;
    private int $user_id;
    private int $category_id;

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

    public static function recuperarPostsInicio(): array
    {
        $q = "select posts.*, email, nombre, color from posts
        join categorias on categorias.id=posts.category_id
        join usuarios on usuarios.id=posts.user_id
        where estado='Publicado' order by posts.id desc";
        $stmt = self::executeQuery($q, [], true);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function recuperarPostsUsuario(string $email): array
    {
        $q = "select posts.*, nombre, color, usuarios.id as idUser from posts
        join categorias on categorias.id=posts.category_id
        join usuarios on usuarios.id=posts.user_id
        where email=:e order by posts.id desc";
        $stmt = self::executeQuery($q, [':e' => $email], true);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function create(): void
    {
        $q = "insert into posts(titulo, contenido, estado, imagen, category_id, user_id) values(:t, :c, :est, :img, :ci, :ui)";
        self::executeQuery(
            $q,
            [':t' => $this->titulo, ':c' => $this->contenido, ':est' => $this->estado, ':img' => $this->imagen, ':ci' => $this->category_id, 'ui' => $this->user_id],
        );
    }
    public static function delete(int $id){
        $q="delete from posts where id=:i";
        self::executeQuery($q, [':i'=>$id]);
    }
    public static function postPerteneceUsuario(string $email, int $post_id): bool{
        $q="select 1 from posts, usuarios where posts.user_id=usuarios.id AND email=:e AND posts.id=:i";
        $stmt=self::executeQuery($q, [':e'=>$email, ':i'=>$post_id], true);
        return count($stmt->fetchAll(PDO::FETCH_OBJ))==1;

    }

    public static function findPostById(int $id): stdClass{
        $q="select * from posts where id=:i";
        $stmt=self::executeQuery($q, [':i'=>$id], true);
        return $stmt->fetchAll(PDO::FETCH_OBJ)[0];
    }

    public function update(int $id){
        $q="update posts set titulo=:t, contenido=:c, estado=:e, category_id=:ci, imagen=:img where id=:i";
        self::executeQuery(
            $q,
            [':t'=>$this->titulo, ':c'=>$this->contenido, ':e'=>$this->estado, ':ci'=>$this->category_id, ':img'=>$this->imagen, ':i'=>$id],
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
