<?php

use App\Bd\Articulo;
use App\Utils\Navegacion;

session_start();
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
    exit;
}
require __DIR__ . "/../vendor/autoload.php";
$articulos = Articulo::read();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN TAILWIND CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- CDN De sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Articulos</title>
</head>

<body class="bg-slate-100 min-h-screen">
    <?php
    Navegacion::pintarNavegacion($_SESSION['username'], $_SESSION['perfil']);
    ?>
    <div class="max-w-7xl mx-auto px-6 py-10">

        <!-- Cabecera -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-slate-800">
                Gestión de artículos
            </h1>
            <p class="text-slate-500 mt-1">
                Administra tus artículos, precios y descripciones.
            </p>
        </div>

        <!-- Botón crear -->
        <?php if ($_SESSION['perfil'] == 1): ?>
            <div class="mb-5 flex flex-row-reverse">
                <a href="crear.php"
                    class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 
                      text-white font-semibold px-5 py-3 rounded-lg shadow-sm 
                      transition duration-200">

                    <!-- Icono + -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 4v16m8-8H4" />
                    </svg>

                    Crear artículo
                </a>
            </div>
        <?php endif; ?>
        <!-- Contenedor de la tabla -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">

            <!-- Tabla responsive -->
            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <!-- Cabecera -->
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="px-6 py-4 text-sm font-semibold text-slate-600">
                                ID
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-slate-600">
                                Nombre
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-slate-600">
                                Descripción
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-slate-600">
                                Precio
                            </th>
                            <?php if ($_SESSION['perfil'] == 1): ?>
                                <th class="px-6 py-4 text-sm font-semibold text-slate-600 text-center">
                                    Acciones
                                </th>
                            <?php endif; ?>
                        </tr>
                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        <!-- Fila de ejemplo -->
                        <?php foreach ($articulos as $item): ?>
                            <tr class="hover:bg-slate-50 transition duration-150">

                                <!-- ID -->
                                <td class="px-6 py-5 text-sm font-medium text-slate-700">
                                    <?= $item->id ?>
                                </td>

                                <!-- Nombre -->
                                <td class="px-6 py-5">
                                    <span class="font-semibold text-slate-800">
                                        <?= $item->nombre ?>
                                    </span>
                                </td>

                                <!-- Descripción -->
                                <td class="px-6 py-5 text-sm text-slate-500 max-w-md">
                                    <?= $item->descripcion ?>
                                </td>

                                <!-- Precio -->
                                <td class="px-6 py-5">
                                    <span class="font-bold text-slate-800">
                                        <?= $item->precio ?> €
                                    </span>
                                </td>
                                <?php if ($_SESSION['perfil'] == 1): ?>
                                    <!-- Acciones -->
                                    <td class="px-6 py-5">
                                        <form action="borrar.php" method="POST">
                                            <input type="hidden" name="codigo" value="<?= $item->id  ?>" />
                                            <div class="flex items-center justify-center gap-2">

                                                <!-- Editar -->
                                                <a href="editar.php?codigo=<?= $item->id ?>"
                                                    class="px-3 py-2 text-sm font-medium text-indigo-600
                                              bg-indigo-50 hover:bg-indigo-100
                                              rounded-lg transition duration-200">
                                                    Editar
                                                </a>

                                                <!-- Eliminar -->
                                                <button type="submit" onclick="return confirm('¿Eliminar Articulo?')"
                                                    class="px-3 py-2 text-sm font-medium text-red-600
                                              bg-red-50 hover:bg-red-100
                                              rounded-lg transition duration-200">
                                                    Eliminar
                                                </button>

                                            </div>
                                        </form>
                                    </td>
                                <?php endif; ?>

                            </tr>
                        <?php endforeach; ?>

                    </tbody>



                </table>
            </div>
        </div>

    </div>
    <?php
    if (isset($_SESSION['mensaje'])) {
        echo <<<TXT
        <script>
            Swal.fire({
                icon: "success",
                title: "{$_SESSION['mensaje']}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    TXT;
        unset($_SESSION['mensaje']);
    }
    ?>
</body>

</html>