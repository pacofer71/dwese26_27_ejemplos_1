<?php

use App\Bd\Articulo;
use App\Utils\Navegacion;
use \Carbon\Carbon;
    session_start();
    require __DIR__."/../vendor/autoload.php";
    $articulos=Articulo::devolverArticulosInicio();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN Tailwind css -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- CDN Iconos FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css" integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <title>Articulos</title>
</head>

<body class="bg-gray-100 min-h-screen">
    <?php Navegacion::pintarBarraNavegacion() ?>
    <main class="max-w-7xl mx-auto px-4 py-10">

        <!-- Cabecera -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                <i class="fa-solid fa-newspaper text-indigo-600 mr-2"></i>
                Artículos
            </h1>
            <p class="text-gray-500 mt-2">
                Descubre las últimas publicaciones de nuestra comunidad.
            </p>
        </div>

        <!-- Grid de artículos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- INICIO FOREACH ARTICULOS -->

            <?php foreach($articulos as $item): 
                $fecha=Carbon::parse($item->created_at);
            ?>
            <article class="bg-white rounded-2xl shadow-md overflow-hidden
                            hover:shadow-xl transition duration-300
                            border border-gray-100">

                <!-- Imagen -->
                <div class="relative h-56 overflow-hidden">
                    <img
                        src="<?= ".$item->imagen" ?>"
                        alt="Imagen del artículo"
                        class="w-full h-full object-cover hover:scale-105
                               transition duration-500"
                    >

                    <!-- Categoría -->
                    <span class="absolute top-4 left-4 bg-[<?= $item->color ?>]
                                 text-white text-xs font-bold px-3 py-1.5
                                 rounded-full shadow">
                        <?= $item->nombre ?>
                    </span>
                </div>

                <!-- Contenido -->
                <div class="p-5">

                    <!-- Autor y fecha -->
                    <div class="flex items-center justify-between mb-4">

                        <div class="flex items-center gap-2 min-w-0">
                            <div class="w-9 h-9 rounded-full bg-indigo-100
                                        flex items-center justify-center
                                        text-indigo-600 shrink-0">
                                <i class="fa-solid fa-user"></i>
                            </div>

                            <span class="text-sm font-medium text-gray-600
                                         truncate">
                                <?= $item->email ?>
                            </span>
                        </div>

                        <span class="text-xs text-gray-400 whitespace-nowrap">
                            <i class="fa-regular fa-clock mr-1"></i>
                            <?= $fecha->diffForHumans() ?>
                        </span>

                    </div>

                    <!-- Título -->
                    <h2 class="text-xl font-bold text-gray-800 mb-3
                               hover:text-indigo-600 transition">
                        <?= $item->titulo ?>
                    </h2>

                    <!-- Descripción -->
                    <p class="text-gray-600 text-sm leading-relaxed">
                        <?= $item->contenido ?>
                    </p>

                    <!-- Separador -->
                    <div class="border-t border-gray-100 mt-5 pt-4">

                        <div class="flex items-center justify-between">

                            <span class="text-xs text-gray-400">
                                <i class="fa-solid fa-calendar-days mr-1"></i>
                                Publicación reciente
                            </span>

                        </div>

                    </div>

                </div>

            </article>
            <?php endforeach; ?>
            

        </div>

    </main>

</body>

</html>