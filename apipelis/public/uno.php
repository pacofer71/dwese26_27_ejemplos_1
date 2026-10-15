<?php

use App\ApiUtils;

require __DIR__ . "/../vendor/autoload.php";

$peliculas = ApiUtils::getPeliculas();
//var_dump($peliculas);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN TAILWIND CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>

<body class="min-h-screen bg-slate-950 text-white">

    <!-- ========================================= -->
    <!-- CONTENEDOR PRINCIPAL                     -->
    <!-- ========================================= -->

    <main class="mx-auto max-w-7xl px-6 py-12">

        <!-- CABECERA -->
        <header class="mb-10 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl">
                🎬 <span class="text-indigo-400">Películas</span>
            </h1>

            <p class="mt-3 text-slate-400">
                Descubre nuestra selección de películas
            </p>
        </header>


        <!-- ========================================= -->
        <!-- ABRIR FOREACH AQUÍ                       -->
        <!-- ========================================= -->

        <!--
            foreach ($peliculas as $pelicula) {
        -->


        <!-- ========================================= -->
        <!-- GRID DE PELÍCULAS                         -->
        <!-- ========================================= -->

        <section class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
            <?php foreach ($peliculas as $item): ?>
                <!-- ========================================= -->
                <!-- CARD DE UNA PELÍCULA                      -->
                <!-- ========================================= -->

                <article
                    class="group overflow-hidden rounded-2xl border border-slate-800
                       bg-slate-900 shadow-lg shadow-black/20
                       transition duration-300
                       hover:-translate-y-2 hover:border-indigo-500/50
                       hover:shadow-2xl hover:shadow-indigo-500/10">

                    <!-- POSTER -->
                    <div class="relative aspect-[2/3] overflow-hidden">

                        <img
                            src="<?= $item->imagen ?>"
                            alt="Título de la película"
                            class="h-full w-full object-cover
                               transition duration-500
                               group-hover:scale-105">

                        <!-- GRADIENTE SOBRE EL POSTER -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t
                               from-slate-950 via-transparent to-transparent
                               opacity-80"></div>


                        <!-- PUNTUACIÓN -->
                        <div
                            class="absolute right-3 top-3 flex items-center gap-1
                               rounded-full bg-black/70 px-3 py-1.5
                               text-sm font-bold text-yellow-400
                               backdrop-blur-sm">
                            <span>★</span>
                            <span><?=round($item->puntuacion, 1) ?></span>
                            <span class="font-normal text-slate-400">/10</span>
                        </div>

                    </div>


                    <!-- INFORMACIÓN -->
                    <div class="p-5">

                        <!-- TÍTULO -->
                        <h2
                            class="mb-3 line-clamp-1 text-xl font-bold
                               text-white transition
                               group-hover:text-indigo-400">
                            <?= $item->titulo ?>
                        </h2>


                        <!-- SINOPSIS -->
                        <p
                            class="line-clamp-4 text-sm leading-6 text-slate-400">
                            <?= $item->sinopsis ?>
                        </p>


                        <!-- PARTE INFERIOR -->
                        <div
                            class="mt-5 flex items-center justify-between
                               border-t border-slate-800 pt-4">

                            <span class="text-xs font-medium uppercase
                                     tracking-wider text-slate-500">
                                Puntuación
                            </span>

                            <span
                                class="rounded-lg bg-indigo-500/10 px-3 py-1
                                   text-sm font-bold text-indigo-400">
                                <?= round($item->puntuacion, 1) . "/10" ?>
                            </span>

                        </div>

                    </div>

                </article>


                <!-- ========================================= -->
                <!-- FIN DE LA CARD                            -->
                <!-- ========================================= -->

            <?php endforeach; ?>
        </section>


        <!-- ========================================= -->
        <!-- CERRAR FOREACH AQUÍ                      -->
        <!-- ========================================= -->

        <!--
      


    </main>

</body>

</html>