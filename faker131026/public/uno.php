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

<body>
    <main class="min-h-screen bg-slate-100 p-6">
        <div class="max-w-7xl mx-auto">
            <!-- Título / Cabecera -->
            <h1 class="text-2xl font-bold text-slate-800 mb-6">Listado de Personal</h1>

            <!-- Contenedor Grid (4 columnas en pantallas grandes) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                <!-- ======================================================== -->
                <!-- AQUÍ EMPIEZA EL FOREACH                                  -->
                <!-- ======================================================== -->

                <!-- Card de Ejemplo (Persona 1) -->
                <?php foreach($personas as $item): ?>
                <article class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200 border border-slate-200/80 overflow-hidden flex flex-col justify-between">

                    <!-- Cuerpo de la Card -->
                    <div class="p-5">
                        <!-- Identidad: Nombre y Username -->
                        <div class="mb-4">
                            <h2 class="text-lg font-semibold text-slate-900 leading-snug">
                                <?= $item->nombre." ".$item->apellidos ?>
                            </h2>
                            <p class="text-sm font-medium text-indigo-600">
                                <?= $item->username ?>
                            </p>
                        </div>

                        <!-- Email -->
                        <div class="mb-4 text-xs text-slate-500 flex items-center gap-1.5 truncate">
                            <svg class="w-4 h-4 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="truncate"><?= $item->email ?></span>
                        </div>

                        <!-- Descripción -->
                        <p class="text-sm text-slate-600 line-clamp-3 mb-4 leading-relaxed">
                            <?= $item->descripcion ?>
                        </p>

                        <!-- Provincias (Badges) -->
                        <div class="space-y-1.5">
                            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider block">Provincias</span>
                            <div class="flex flex-wrap gap-1.5">
                                <?php foreach($item->provincias as $provincia): ?>
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-slate-100 text-slate-700">
                                    <?= $provincia ?>
                                </span>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>

                    <!-- Pie de la Card: Sueldo -->
                    <div class="bg-slate-50 px-5 py-3 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-xs font-medium text-slate-500">Sueldo anual</span>
                        <span class="text-sm font-bold text-emerald-600"><?= $item->sueldo ?> €</span>
                    </div>

                </article>
                <?php endforeach; ?>
                <!-- AQUÍ ACABA EL FOREACH                                   -->
                <!-- ======================================================== -->

            </div>
        </div>
    </main>
</body>


</html>