<?php

namespace App;
use App\Pelicula;

class ApiUtils
{
    public static function getPeliculas(): array
    {
        $peliculas = [];

        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/popular?language=en-US&page=1', [
            'headers' => [
                'Authorization' => 'POn aquí tu BEARER de acceso',
                'accept' => 'application/json',
            ],
        ]);

        //echo $response->getBody();
        $datosJson=$response->getBody()->getContents();
        // $datosJson es un string, vamos a darle formato json
        $datosFormateados=json_decode($datosJson);
        // es un objeto de la clase generica stdClass con un atributo
        // por cada elemento que ms devuelve el json de la api, a nosotros nos interesa
        //en este caso elatributo results que es un array de 20 peliculas
        //Me quedo con el array
        $arrayPeliculasJson=$datosFormateados->results; 
        // es un array de 20 objetos de la clase generica stdClass
        //var_dump($arrayPeliculasJson);
        //die();
        foreach($arrayPeliculasJson as $objetoPeli){
            $pelicula=new Pelicula(
               $objetoPeli->title,
               $objetoPeli->overview,
               $objetoPeli->vote_average,
               $objetoPeli->poster_path 
            );
            $peliculas[]=$pelicula;
        }
        return $peliculas;
    }
}
