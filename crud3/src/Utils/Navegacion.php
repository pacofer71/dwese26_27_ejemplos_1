<?php

namespace App\Utils;

abstract class Navegacion
{
    public static function pintarBarraNavegacion(): void
    {
        $usuario = (isset($_SESSION['email'])) ? $_SESSION['email'] : "";

        $cadena1 = <<< TXT
        <div class="flex items-center gap-3">
            <div class="hidden sm:flex items-center gap-2 bg-gray-100 px-4 py-2 rounded-full">
                <i class="fa-solid fa-user text-gray-500"></i>
                    <input
                        type="email"
                        value="$usuario"
                        readonly
                        class="bg-transparent text-sm text-gray-700 outline-none w-48">
            </div>

                <a href="cerrar.php"
                    class="flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full text-sm font-semibold transition">

                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Cerrar sesión</span>

                </a>

        </div>
        TXT;
        $cadena2 = <<< TXT
            <a href="login.php"
                    class="flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full text-sm font-semibold transition">

                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Login</span>

                </a>
        TXT;

        $cadena = (isset($_SESSION['email'])) ? $cadena1 : $cadena2;

        echo <<< TXT
        <nav class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50">
            <div class="max-w-4xl mx-auto px-4 py-4 flex items-center justify-between">
                <!-- LOGO -->
                <h1 class="text-2xl font-extrabold text-blue-500">
                    Social<span class="text-gray-800">Net</span>
                </h1>
                <!-- USUARIO Y CERRAR SESIÓN -->
                $cadena
            </div>
        </nav>
        TXT;
    }
}
