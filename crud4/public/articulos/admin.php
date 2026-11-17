<?php

use App\Bd\Articulo;
use App\Utils\Navegacion;
use Carbon\Carbon;

session_start();
if (!isset($_SESSION['email'])) {
    header("Location:./../login.php");
    exit;
}
require __DIR__ . "/../../vendor/autoload.php";
$email = $_SESSION['email'];
$articulos = Articulo::getArticulosByEmail($email);

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
    <!-- CDN PARA DIALOGX -->
    <link rel="stylesheet"
        href="https://unpkg.com/@constantine256/dialogx/dist/dialogx.css">

    <script src="https://unpkg.com/@constantine256/dialogx/dist/dialogx.iife.js"></script>
    <title>Login</title>
</head>


<body class="bg-gray-50 min-h-screen text-gray-800">
    <?php Navegacion::pintarBarraNavegacion()  ?>

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
            <div class="flex gap-2">
                <?php if($_SESSION['perfil']==1): ?>
                <div>
                    <a href="./../categorias/admin.php"
                        class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-lg font-semibold text-sm shadow-sm transition">
                        <i class="fas fa-gears"></i>
                        Administrar Categorias
                    </a>
                </div>
                <?php endif; ?>
                <div>
                    <a href="crear.php"
                        class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-lg font-semibold text-sm shadow-sm transition">
                        <i class="fas fa-plus"></i>
                        Crear artículo
                    </a>
                </div>
            </div>
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

                        <?php foreach ($articulos as $item):
                            $fecha_creacion = Carbon::parse($item->created_at);
                            $fecha_actualizacion = Carbon::parse($item->updated_at);
                            $color = ($item->publicado == 'Si') ? "bg-green-100 text-green-700" :
                                "bg-red-100 text-red-700";
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
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-[<?= $item->color ?>] text-white">
                                        <?= $item->nombre ?>
                                    </span>
                                </td>

                                <!-- Estado -->
                                <td class="px-5 py-4 text-center">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold <?= $color ?> ">
                                        <i class="fas fa-check-circle"></i>
                                        <?= $item->publicado ?>
                                    </span>
                                </td>

                                <!-- Imagen -->
                                <td class="px-5 py-4">
                                    <img
                                        src="<?= "./../" . $item->imagen ?>"
                                        alt="Imagen del artículo"
                                        class="w-20 h-14 object-cover rounded-lg border border-gray-200">
                                </td>

                                <!-- Fecha creación -->
                                <td class="px-5 py-4 whitespace-nowrap">
                                    <div class="text-gray-700">
                                        <i class="far fa-calendar-plus text-gray-400 mr-1"></i>
                                        <?= $fecha_creacion->format('d/m/Y') ?>
                                    </div>
                                    <span class="text-xs text-gray-400"><?= $fecha_creacion->format('h:i') ?></span>
                                </td>

                                <!-- Fecha actualización -->
                                <td class="px-5 py-4 whitespace-nowrap">
                                    <div class="text-gray-700">
                                        <i class="far fa-clock text-gray-400 mr-1"></i>
                                        <?= $fecha_actualizacion->format('d/m/Y') ?>
                                    </div>
                                    <span class="text-xs text-gray-400"><?= $fecha_actualizacion->format('h:i') ?></span>
                                </td>

                                <!-- Acciones -->
                                <td class="px-5 py-4">
                                    <form action="borrar.php" method='POST'>
                                        <input type="hidden" name="id" value="<?= $item->id ?>" />
                                        <div class="flex items-center justify-center gap-3">

                                            <a href="editar.php?id=<?= $item->id ?>"
                                                title="Editar artículo"
                                                class="text-indigo-600 hover:text-indigo-800 transition">
                                                <i class="fas fa-edit text-lg"></i>
                                            </a>

                                            <button type='submit' onclick="confirm('¿Borrar definitivamene articulo?')"
                                                title="Eliminar artículo"
                                                class="text-red-500 hover:text-red-700 transition">
                                                <i class="fas fa-trash-alt text-lg"></i>
                                            </button>

                                        </div>
                                    </form>
                                </td>

                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>

    </main>
    <?php
    if (isset($_SESSION['mensaje'])) {
        echo <<< TXT
                <script>
                    Dialogx.notify.success('{$_SESSION['mensaje']}');
                </script>
        TXT;
        unset($_SESSION['mensaje']);
    }
    ?>
</body>

</html>