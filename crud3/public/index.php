<?php

use App\Bd\Post;
use App\Utils\Navegacion;

    session_start();
    require __DIR__."/../vendor/autoload.php";
    $posts=Post::recuperarPostsInicio();
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
    <title>Posts</title>
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- BARRA DE NAVEGACIÓN -->
   <?php Navegacion::pintarBarraNavegacion(); ?>


    <!-- CONTENIDO PRINCIPAL -->
    <main class="max-w-2xl mx-auto px-4 py-8">

        <!-- TÍTULO DE LA PÁGINA -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">
                Publicaciones
            </h2>

            <p class="text-gray-500 text-sm mt-1">
                Descubre las últimas publicaciones de la comunidad.
            </p>
        </div>


   

        <?php foreach($posts as $item): ?>
        <!-- CARD DE PUBLICACIÓN -->
        <article class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden mb-6 hover:shadow-md transition">

            <!-- IMAGEN DEL POST -->
            <div class="w-full h-64 sm:h-80 overflow-hidden">
                <img
                    src=".<?= $item->imagen ?>"
                    alt="Imagen de la publicación"
                    class="w-full h-full object-cover">
            </div>

            <!-- CONTENIDO DEL POST -->
            <div class="p-5">

                <!-- CATEGORÍA -->
                <div class="mb-3">
                    <span class="inline-block bg-[<?= $item->color ?>] text-white text-xs font-bold px-3 py-1 rounded-full">
                        <?= $item->nombre ?>
                    </span>
                </div>

                <!-- TÍTULO -->
                <h3 class="text-xl font-bold text-gray-900 mb-3">
                    <?= $item->titulo ?>
                </h3>

                <!-- CONTENIDO -->
                <p class="text-gray-600 text-sm leading-relaxed mb-5">
                    <?= $item->contenido ?>    
                
                </p>

                <!-- AUTOR -->
                <div class="border-t border-gray-100 pt-4 flex items-center gap-3">

                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                        <i class="fa-solid fa-user text-blue-600"></i>
                    </div>

                    <div>
                        <p class="text-xs text-gray-400 font-medium">
                            Publicado por
                        </p>

                        <p class="text-sm font-semibold text-gray-700">
                            <?= $item->email ?>
                        </p>
                    </div>

                </div>

            </div>
        </article>
        <?php endforeach; ?>


        <!-- FIN DEL FOREACH -->

    </main>

</body>

</html>