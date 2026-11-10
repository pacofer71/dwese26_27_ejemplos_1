<?php

namespace App\Bd;
use \PDO;
use \PDOException;
use PDOStatement;
class Usuario extends Conexion
{
    private int $id;
    private string $email;
    private string $password;

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

    public static function esLoginValido(string $email, string $password): bool{
        $q="select password from usuarios where email=:e";
        $stmt=self::executeQuery($q, [':e'=>$email], true);
        $datos=$stmt->fetchAll(PDO::FETCH_OBJ);
        if(count($datos)>0){
            return password_verify($password, $datos[0]->password);
        }
        return false;
    }

    public static function getIdByEmail(string $email): int{
        $q="select id from usuarios where email=:e";
        $stmt=self::executeQuery($q, [':e'=>$email], true);
        return ($stmt->fetchAll(PDO::FETCH_OBJ))[0]->id;
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
    public function setEmail(string $email): self
    {
        $this->email = $email;

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
