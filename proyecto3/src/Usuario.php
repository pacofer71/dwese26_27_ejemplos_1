<?php
// SIEMPRE AL PRINCIPIO
namespace App;
class Usuario{
   public function __construct( public readonly string $user, public readonly string $provincia){}
}