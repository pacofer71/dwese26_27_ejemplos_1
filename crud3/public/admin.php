<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location:index.php");
    exit;
}
require __DIR__ . "/../vendor/autoload.php";

use App\Bd\Post;
use App\Utils\Navegacion;
$email=$_SESSION['email'];
$posts=Post::recuperarPostsUsuario($email);
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

    <body class="bg-gray-100 min-h-screen">

        <div class="max-w-7xl mx-auto px-6 py-10">

            <!-- Cabecera -->
            <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">

                <div>
                    <h1 class="text-3xl font-bold text-gray-800">
                        Gestión de publicaciones
                    </h1>
                    <p class="text-gray-500 mt-1">
                        Administra tus publicaciones y contenidos.
                    </p>
                </div>

                <!-- Crear post -->
                <a href="crear.php"
                    class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700
                      text-white font-semibold px-5 py-3 rounded-lg shadow-md
                      transition duration-200">

                    <i class="fa-solid fa-plus"></i>
                    Crear nuevo post

                </a>

            </div>

            <!-- Tabla -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="w-full text-sm text-left text-gray-600">

                        <!-- Cabecera de la tabla -->
                        <thead class="bg-gray-800 text-white uppercase text-xs">

                            <tr>
                                <th class="px-6 py-4">Título</th>
                                <th class="px-6 py-4">Contenido</th>
                                <th class="px-6 py-4">Imagen</th>
                                <th class="px-6 py-4">Categoría</th>
                                <th class="px-6 py-4">Estado</th>
                                <th class="px-6 py-4 text-center">Acciones</th>
                            </tr>

                        </thead>

                        <!-- Cuerpo de la tabla -->
                        <tbody class="divide-y divide-gray-200">

                           
                             <?php foreach($posts as $item):
                                $estiloEstado=($item->estado)=='Publicado' ? "bg-green-100 text-green-700" : "bg-red-100 text-red-700"; 
                            ?>
                            <tr class="hover:bg-gray-50 transition">

                                <!-- Título y código -->
                                <td class="px-6 py-5">
                                    <div class="font-semibold text-gray-800">
                                        <?= $item->titulo ?>
                                    </div>
                                    <div class="text-xs text-gray-400 mt-1">
                                        Código: <?= $item->id ?>
                                    </div>
                                </td>

                                <!-- Contenido -->
                                <td class="px-6 py-5 max-w-xs">
                                    <p>
                                       <?= $item->contenido ?>
                                    </p>
                                </td>

                                <!-- Imagen -->
                                <td class="px-6 py-5">
                                    <img src=".<?= $item->imagen ?>"
                                        alt="Imagen del post"
                                        class="w-20 h-14 object-cover rounded-lg shadow-sm">
                                </td>

                                <!-- Categoría -->
                                <td class="px-6 py-5">
                                    <span class="bg-[<?= $item->color ?>] text-white px-3 py-1
                                             rounded-full text-xs font-semibold whitespace-nowrap">
                                        <?= $item->nombre ?>
                                    </span>
                                </td>

                                <!-- Estado -->
                                <td class="px-6 py-5">
                                    <span class="inline-flex items-center gap-1.5
                                            <?= $estiloEstado ?>
                                             px-3 py-1 rounded-full text-xs font-semibold">
                                        <i class="fa-solid fa-circle-check"></i>
                                        <?= $item->estado ?>
                                    </span>
                                </td>

                                <!-- Acciones -->
                                <td class="px-6 py-5">
                                    <div class="flex justify-center items-center gap-3">

                                        <!-- Editar -->
                                        <a href="editar.php?id=1"
                                            title="Editar"
                                            class="text-blue-600 hover:text-blue-800
                                              bg-blue-50 hover:bg-blue-100
                                              p-2 rounded-lg transition">

                                            <i class="fa-solid fa-pen-to-square"></i>

                                        </a>

                                        <!-- Borrar -->
                                        <a href="borrar.php?id=1"
                                            title="Borrar"
                                            class="text-red-600 hover:text-red-800
                                              bg-red-50 hover:bg-red-100
                                              p-2 rounded-lg transition">

                                            <i class="fa-solid fa-trash"></i>

                                        </a>

                                    </div>
                                </td>

                            </tr>
                            <?php endforeach; ?>
                           

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </body>

</body>

</html>