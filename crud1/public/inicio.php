<?php
session_start();
use App\Bbdd\Articulo;

require __DIR__ . "/../vendor/autoload.php";

$articulos = Articulo::devolverTodo();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN TAilwind cSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CDN SweetAlert2 -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Articulos</title>
</head>

<body class="bg-slate-100 p-6">

    <div class="max-w-6xl mx-auto">

        <!-- Cabecera de la sección -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-800">
                Listado de elementos
            </h1>
            <p class="text-sm text-slate-500 mt-1">
                Gestiona y consulta todos los elementos registrados.
            </p>
        </div>

        <!-- Contenedor de la tabla -->
        <div class="flex flex-row-reverse mb-2">
            <a href="create.php" class="rounded-xl p-2 bg-green-600 hover:bg-green-800 text-white font-bold">Crear Articulo</a>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200">
            <div class="">
                <table class="w-full text-left">

                    <!-- CABECERA -->
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="px-6 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">
                                ID
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">
                                Nombre
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">
                                Descripción
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider text-right">
                                Acciones
                            </th>
                        </tr>
                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        <? foreach ($articulos as $item): ?>
                            <tr class="hover:bg-slate-50 transition-colors duration-150">

                                <!-- ID -->
                                <td class="px-6 py-5">
                                    <span class="inline-flex items-center justify-center
                                             w-9 h-9 rounded-lg
                                             bg-indigo-50 text-indigo-600
                                             font-semibold text-sm">
                                        <?= $item->id ?>
                                    </span>
                                </td>

                                <!-- NOMBRE -->
                                <td class="px-6 py-5">
                                    <div class="font-semibold text-slate-800">
                                        <?= $item->nombre ?>
                                    </div>

                                </td>

                                <!-- DESCRIPCIÓN -->
                                <td class="px-6 py-5 max-w-md">
                                    <p class="text-sm text-slate-600 line-clamp-2">
                                        <?= $item->descripcion ?>
                                    </p>
                                </td>

                                <!-- ACCIONES -->
                                <td class="px-6 py-5">
                                    <div class="flex items-center justify-end gap-2">

                                        <!-- Editar -->
                                        <button
                                            class="inline-flex items-center gap-2
                                               px-3 py-2 rounded-lg
                                               text-sm font-medium
                                               text-indigo-600
                                               bg-indigo-50
                                               hover:bg-indigo-100
                                               transition-colors">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>

                                            Editar
                                        </button>

                                        <!-- Eliminar -->
                                        <button
                                            class="inline-flex items-center gap-2
                                               px-3 py-2 rounded-lg
                                               text-sm font-medium
                                               text-red-600
                                               bg-red-50
                                               hover:bg-red-100
                                               transition-colors">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>

                                            Eliminar
                                        </button>

                                    </div>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>

        </div>

    </div>
<?php
    if(isset($_SESSION['mensaje'])){
        echo <<< MANOLO
            <script>
                Swal.fire({
                    icon: "success",
                    title: "{$_SESSION['mensaje']}",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        MANOLO;
        unset($_SESSION['mensaje']);
    }
?>
</body>

</html>