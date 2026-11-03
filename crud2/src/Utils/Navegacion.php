<?php
namespace App\Utils;
abstract class Navegacion{
    public static function pintarNavegacion(string $usuario, int $perfil){
        $color=($perfil==1) ? 'bg-red-300' : 'bg-slate-200';

        echo <<< TXT
        <nav class="bg-white border-b border-slate-200 shadow-sm">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex items-center justify-between h-16">

            <!-- Izquierda: navegación -->
            <div class="flex items-center gap-2">

                <a href="sitio.php"
                   class="px-4 py-2 text-sm font-medium text-slate-700
                          hover:bg-slate-100 hover:text-indigo-600
                          rounded-lg transition duration-200">
                    Ver Artículos
                </a>

                <a href="crear.php"
                   class="px-4 py-2 text-sm font-medium text-slate-700
                          hover:bg-slate-100 hover:text-indigo-600
                          rounded-lg transition duration-200">
                    Crear Artículo
                </a>

            </div>

            <!-- Derecha: usuario y salir -->
            <div class="flex items-center gap-3">

                <!-- Usuario logeado -->
                <input type="text"
                       value="$usuario"
                       readonly
                       class="w-40 px-3 py-2 text-sm text-slate-600
                              $color border border-slate-200
                              rounded-lg focus:outline-none cursor-default">

                <!-- Salir -->
                <a href="cerrar.php"
                   class="px-4 py-2 text-sm font-medium text-white
                          bg-red-500 hover:bg-red-600
                          rounded-lg transition duration-200">
                    Salir
                </a>

            </div>

        </div>
        </div>
        </nav>
        TXT;
    }
} 