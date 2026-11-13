<?php

use App\Bd\Articulo;
use Carbon\Carbon;

    session_start();
    if(!isset($_SESSION['email'])){
        header("Location:./../login.php");
        exit;
    }
    require __DIR__."/../../vendor/autoload.php";
    $email=$_SESSION['email'];
    $articulos=Articulo::getArticulosByEmail($email);
    
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
    <title>Login</title>
</head>


<body class="bg-gray-50 min-h-screen text-gray-800">

    <main class="max-w-7xl mx-auto px-6 py-10">

        <!-- Cabecera y botón crear -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    <i class="fas fa-newspaper text-indigo-600 mr-2"></i>
                    Gestión de artículos
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Administra tus artículos publicados
                </p>
            </div>

            <a href="crear.php"
                class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-lg font-semibold text-sm shadow-sm transition">
                <i class="fas fa-plus"></i>
                Crear artículo
            </a>
        </div>

        <!-- Tabla -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">

                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="px-5 py-4">Título / ID</th>
                            <th class="px-5 py-4">Contenido</th>
                            <th class="px-5 py-4">Categoría</th>
                            <th class="px-5 py-4 text-center">Publicado</th>
                            <th class="px-5 py-4">Imagen</th>
                            <th class="px-5 py-4">Creación</th>
                            <th class="px-5 py-4">Actualización</th>
                            <th class="px-5 py-4 text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        <?php foreach($articulos as $item): 
                            $fecha_creacion=Carbon::parse($item->created_at);
                            $fecha_actualizacion=Carbon::parse($item->updated_at);
                        ?>
                        <tr class="hover:bg-gray-50 transition">

                            <!-- Título e ID -->
                            <td class="px-5 py-4">
                                <div class="font-semibold text-gray-800">
                                    <?= $item->titulo ?>
                                </div>
                                <span class="text-xs text-gray-400">
                                    #<?= $item->id ?>
                                </span>
                            </td>

                            <!-- Contenido -->
                            <td class="px-5 py-4 max-w-xs">
                                <p class="text-gray-600">
                                    <?= $item->contenido ?>
                                </p>
                            </td>

                            <!-- Categoría -->
                            <td class="px-5 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                    <?= $item->nombre ?>
                                </span>
                            </td>

                            <!-- Estado -->
                            <td class="px-5 py-4 text-center">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                    <i class="fas fa-check-circle"></i>
                                    <?= $item->publicado ?>
                                </span>
                            </td>

                            <!-- Imagen -->
                            <td class="px-5 py-4">
                                <img
                                    src="<?= "./../".$item->imagen ?>"
                                    alt="Imagen del artículo"
                                    class="w-20 h-14 object-cover rounded-lg border border-gray-200">
                            </td>

                            <!-- Fecha creación -->
                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="text-gray-700">
                                    <i class="far fa-calendar-plus text-gray-400 mr-1"></i>
                                    <?= $item->created_at ?>
                                </div>
                                <span class="text-xs text-gray-400">09:30</span>
                            </td>

                            <!-- Fecha actualización -->
                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="text-gray-700">
                                    <i class="far fa-clock text-gray-400 mr-1"></i>
                                    12/11/2026
                                </div>
                                <span class="text-xs text-gray-400">11:45</span>
                            </td>

                            <!-- Acciones -->
                            <td class="px-5 py-4">
                                <div class="flex items-center justify-center gap-3">

                                    <a href="editar.php?id=1"
                                        title="Editar artículo"
                                        class="text-indigo-600 hover:text-indigo-800 transition">
                                        <i class="fas fa-edit text-lg"></i>
                                    </a>

                                    <a href="borrar.php?id=1"
                                        title="Eliminar artículo"
                                        class="text-red-500 hover:text-red-700 transition">
                                        <i class="fas fa-trash-alt text-lg"></i>
                                    </a>

                                </div>
                            </td>

                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>

    </main>

</body>

</html>