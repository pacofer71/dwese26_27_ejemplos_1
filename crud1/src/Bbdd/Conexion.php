<?php
namespace App\Bbdd;

use \PDO;
use \PDOException;

abstract class Conexion{
    private static ?PDO $conexion=null;

    public static function getConexion(): PDO{
        if(self::$conexion==null){
            //setearemos la conexion;
            self::setConexion();
        }
        return self::$conexion;
    }

    private static function setConexion(){
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__."/../../");
        $dotenv->load();

        $usuario=$_ENV['USUARIO'];
        $bbdd=$_ENV['DATABASE'];
        $port=$_ENV['PORT'];
        $password=$_ENV['PASSWORD'];
        $host=$_ENV['HOST'];

        //creamos el descriptor de la conexion dsn;
        $dsn="mysql:host=$host;dbname=$bbdd;port=$port;charset=utf8mb4";
        //die($dsn." $usuario $password");
        ///craemos el array de opciones
        $opciones=[
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES=>false,
            PDO::ATTR_PERSISTENT=>false
        ];

        try{
            self::$conexion=new PDO($dsn, $usuario, $password, $opciones);
        }catch(PDOException $ex){
            throw new PDOException("Error en la conexion: ".$ex->getMessage());
        }
    }


}