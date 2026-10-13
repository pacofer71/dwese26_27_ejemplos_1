<?php
require __DIR__ . "/../vendor/autoload.php";

use App\Persona;

$personas = Persona::generarPersonas(50);
//var_dump($personas);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN Tailwind css -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>

<body class="bg-slate-100 p-8">

    <!-- Grid de personas -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">

        <!-- CARD -->
        <div class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">

            <!-- Cabecera -->
            <div class="relative bg-gradient-to-br from-indigo-600 to-purple-700 px-5 py-6 text-white">

                <!-- Avatar -->
                <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-white/20 text-xl font-bold ring-4 ring-white/10">
                    JP
                </div>

                <h2 class="text-lg font-bold tracking-tight">
                    Juan Pérez
                </h2>

                <p class="mt-1 text-sm text-indigo-100">
                    @juanperez
                </p>

            </div>


            <!-- Información -->
            <div class="space-y-4 p-5">

                <!-- Email -->
                <div class="flex items-center gap-3">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>

                    <div class="min-w-0">
                        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                            Email
                        </p>

                        <p class="truncate text-sm font-medium text-slate-700">
                            juan.perez@email.com
                        </p>
                    </div>

                </div>


                <!-- Sueldo -->
                <div class="flex items-center gap-3">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8V6m0 12v-2m0-10a6 6 0 100 12 6 6 0 000-12z"/>
                        </svg>
                    </div>

                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                            Sueldo
                        </p>

                        <p class="text-sm font-bold text-emerald-600">
                            2.450,00 €
                        </p>
                    </div>

                </div>


                <!-- Descripción -->
                <div class="border-t border-slate-100 pt-4">

                    <p class="mb-2 text-[10px] font-bold uppercase tracking-wider text-slate-400">
                        Descripción
                    </p>

                    <p class="line-clamp-3 text-sm leading-5 text-slate-600">
                        Desarrollador web especializado en aplicaciones modernas,
                        arquitectura de software y soluciones digitales.
                    </p>

                </div>


                <!-- Provincias -->
                <div class="border-t border-slate-100 pt-4">

                    <p class="mb-2 text-[10px] font-bold uppercase tracking-wider text-slate-400">
                        Provincias
                    </p>

                    <div class="flex flex-wrap gap-1.5">

                        <span class="rounded-full bg-indigo-50 px-2.5 py-1 text-xs font-medium text-indigo-700">
                            Almería
                        </span>

                        <span class="rounded-full bg-indigo-50 px-2.5 py-1 text-xs font-medium text-indigo-700">
                            Granada
                        </span>

                        <span class="rounded-full bg-indigo-50 px-2.5 py-1 text-xs font-medium text-indigo-700">
                            Málaga
                        </span>

                    </div>

                </div>

            </div>

        </div>
        <!-- FIN CARD -->

    </div>

</body>


</html>