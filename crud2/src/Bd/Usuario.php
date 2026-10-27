<?php
namespace App\Bd;

use \PDOStatement;
use \PDOException;
use \PDO;

class Usuario extends Conexion{
    private int $id;
    private string $username;
    private string $password;
    private int $perfil;

    private static function executeQuery(string $q, array $parametros=[], bool $devolverAlgo=false): bool|PDOStatement{
        $stmt=parent::getConexion()->prepare($q);
        try{
            $stmt->execute($parametros);
            return ($devolverAlgo) ? $stmt : false;
        }catch(PDOException $ex){
            throw new PDOException("Error en executeQuery, mensaje: ".$ex->getMessage());
        }
    }
    //---------------------------------------------------------------------------------------
    public function create(): void{
        $q="insert into usuarios(username, password, perfil) values(:u, :pa, :pe)";
        self::executeQuery(
            $q,
            [':u'=>$this->username, ':pa'=>$this->password, ':pe'=>$this->perfil],
            false
        );
    }

    //--------------------------------------------------------------------------------------
    public static function delete(): void{
        $q="delete from usuarios";
        self::executeQuery($q);
    }

    //--------------------------------------------------------------------------------------

    public static function generarUsuariosFake(int $cantidad){
        $faker = \Faker\Factory::create('es_ES');
        for($i=0; $i<$cantidad; $i++){
            $username=$faker->unique()->userName();
            $password="secret0";
            $perfil=random_int(0,1);
            (new Usuario)
            ->setUsername($username)
            ->setPassword($password)
            ->setPerfil($perfil)
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
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword(string $password): self
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);

        return $this;
    }

    /**
     * Set the value of perfil
     *
     * @return  self
     */ 
    public function setPerfil(int $perfil): self
    {
        $this->perfil = $perfil;

        return $this;
    }
}