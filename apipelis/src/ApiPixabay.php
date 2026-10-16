<?php

namespace App;

class ApiPixabay
{
    public static function getImagenes(): array
    {
        $imagenes = [];
        $client = new \GuzzleHttp\Client();

        //$apiKey = $_GET['key'];

        $response = $client->request(
            'GET',
            'https://pixabay.com/api/',
            [
                'query' => [
                    'key' => '16612106-c5c78da882bc231477b57314c',
                    'q' => 'Aviones'
                ],
                'headers' => [
                    'accept' => 'application/json',
                ],
            ]
        );
        $datosJson=$response->getBody()->getContents();
        var_dump($datosJson);
        return $imagenes;
    }
}
