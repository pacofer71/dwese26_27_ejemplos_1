<?php
namespace App\Backend;
class ClaseBackend{
    public function __construct(public readonly string $nombre, public readonly int $edad)
    {
        
    }
}