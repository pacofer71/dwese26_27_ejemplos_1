<?php
namespace App\Admin;
class Login{
   public function __construct( public readonly string $user, public readonly string $pass){}
}