<?php

namespace App\Utils;

use Dom\Text;

abstract class Navegacion
{
    public static function pintarBarraNavegacion(): void
    {
        $color="";
        if (isset($_SESSION['perfil'])) {
            $color = ($_SESSION['perfil'] == 1) ? "text-red-600" : "text-blue-600";
        }
        $user = $_SESSION['email'] ?? "";
        $userLogo = <<<TXT
            <div class="relative">
                <i class="fas fa-user-circle absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input
                    type="text"
                    value="$user"
                    readonly
                    class="w-52 pl-9 pr-3 py-2 text-sm $color bg-gray-50 border border-gray-200 rounded-lg focus:outline-none cursor-default"
                >
                </div>

                <a href="cerrar.php"
               class="flex items-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded-lg transition duration-200">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </a>

            </div>
        TXT;

        $nologin = <<<TXT
        <a href="login.php"
               class="flex items-center gap-2 px-4 py-2 bg-green-500 hover:bg-green-600 text-white text-sm font-semibold rounded-lg transition duration-200">
                <i class="fas fa-sign-out-alt"></i>
                Login
            </a>
        TXT;

        $cambios = (isset($_SESSION['email'])) ? $userLogo : $nologin;

        echo <<< TXT
        <nav class="bg-white border-b border-gray-200 shadow-sm px-6 py-3">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <!-- Logo / Nombre del sitio -->
                <div class="flex items-center gap-2 text-indigo-600 font-bold text-xl">
                    <i class="fas fa-newspaper"></i>
                    <span>Artículos</span>
                </div>

            <!-- Usuario y Logout -->
            <div class="flex items-center gap-3">

            $cambios
            </div>
            </nav>

        TXT;
    }
}
