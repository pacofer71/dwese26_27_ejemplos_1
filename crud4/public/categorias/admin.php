<?php

use App\Bd\Categoria;
use App\Utils\Navegacion;

    session_start();
    if(!isset($_SESSION['perfil']) || $_SESSION['perfil']!=1){
        header("Location:./../");
        exit;
    }
    require __DIR__."/../../vendor/autoload.php";
    $categorias=Categoria::read();
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
    <title>Categorias</title>
</head>

<body class="">
    <?php Navegacion::pintarBarraNavegacion() ?>

    <div class="max-w-5xl mx-auto mt-4">
        <div class="flex flex-row-reverse mb-2">
            <a href="crear.php" class="p-2 rounded-lg text-white font-semibold bg-green-500 hover:bg-green-700">
                <i class="fas fa-add mr-2"></i>Nueva
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">

            <!-- Cabecera de la tabla -->
            <div class="px-6 py-5 border-b border-slate-200">
                <h1 class="text-xl font-bold text-slate-800">
                    <i class="fa-solid fa-palette text-indigo-600 mr-2"></i>
                    Gestión de categorias
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Listado de categorias disponibles
                </p>
            </div>

            <!-- Tabla -->
            <div class="overflow-x-auto">
                <table class="w-full text-left">

                    <thead class="bg-slate-50 text-xs uppercase text-slate-500 font-semibold">
                        <tr>
                            <th class="px-6 py-4">ID</th>
                            <th class="px-6 py-4">Nombre</th>
                            <th class="px-6 py-4">Color</th>
                            <th class="px-6 py-4 text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        <?php foreach($categorias as $item): ?>
                        <tr class="hover:bg-slate-50 transition">

                            <td class="px-6 py-5 text-sm font-semibold text-slate-500">
                                #<?= $item->id ?>
                            </td>

                            <td class="px-6 py-5">
                                <span class="font-semibold text-slate-800">
                                    <?= $item->nombre ?>
                                </span>
                            </td>

                            <td class="px-6 py-5">
                                <span class="inline-flex items-center px-4 py-2 rounded-lg text-white text-sm font-bold shadow-sm"
                                      style="background-color: <?= $item->color ?>;">
                                    <?= $item->color ?>
                                </span>
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex items-center justify-center gap-2">

                                    <a href="editar.php"
                                       class="inline-flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-semibold text-indigo-600 bg-indigo-50 hover:bg-indigo-100 transition">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Editar
                                    </a>

                                    <button type="button"
                                            class="inline-flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-semibold text-red-600 bg-red-50 hover:bg-red-100 transition">
                                        <i class="fa-solid fa-trash"></i>
                                        Borrar
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

</body>

</html>