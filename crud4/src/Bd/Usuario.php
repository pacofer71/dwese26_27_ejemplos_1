<?php
namespace App\Bd;
 use \PDO;
 use \PDOException;
use \PDOStatement;

 class Usuario extends Conexion{
    private int $id;
    private string $email;
    private int $perfil;
    private string $password; 

    private static function executeQuery(string $q, array $opciones=[], bool $devolverAlgo=false): bool|PDOStatement{
        $stmt=parent::getConexion()->prepare($q);
        try{
            $stmt->execute($opciones);
            return $devolverAlgo ? $stmt : false;
        }catch(PDOException $ex){
            throw new PDOException("Error al ejecutar consulta: ".$ex->getMessage());
        }
    }
    public static function esLoginValido(string $email, string $pass): int{
        $q="select password, perfil from usuarios where email=:e";
        $stmt=self::executeQuery($q, [':e'=>$email], true);
        $datos=$stmt->fetchAll(PDO::FETCH_OBJ);
        if(count($datos)>0){
            //por lo menos se que el email existe, comprobemos el password
            return password_verify($pass, $datos[0]->password) ? $datos[0]->perfil : -1;
        }
        return -1;
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
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail(string $email):self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Set the value of perfil
     *
     * @return  self
     */ 
    public function setPerfil(int $perfil):self
    {
        $this->perfil = $perfil;

        return $this;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
 }