<?php

namespace App\Bd;

use \PDO;
use PDOException;

abstract class Conexion
{
    private static ?PDO $conexion = null;
    protected static function getConexion(): PDO
    {
        if (self::$conexion == null) {
            self::setConexion();
        }
        return self::$conexion;
    }
    private static function setConexion()
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(self::getRootPath());
        $dotenv->load();
        $puerto=$_ENV['PORT'];
        $usuario=$_ENV['USUARIO'];
        $dbname=$_ENV['DBNAME'];
        $host=$_ENV['HOST'];
        $password=$_ENV['PASSWORD'];

        $dsn="mysql:host=$host;dbname=$dbname;port=$puerto;charset=utf8mb4";
        $opciones=[
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES=>false,
            PDO::ATTR_PERSISTENT=>false
        ];
        try{
            self::$conexion=new PDO($dsn, $usuario, $password, $opciones);
        }catch(\PDOException $ex){
            throw new PDOException("Error en la conexion: ".$ex->getMessage());
        }

    }
    private static function getRootPath(): string
    {
        return dirname(__DIR__, 2);
    }
}
