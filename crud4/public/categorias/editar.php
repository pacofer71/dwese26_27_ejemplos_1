<?php

use App\Bd\Categoria;
use App\Utils\Navegacion;
use App\Utils\Validacion;

session_start();
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] != 1) {
    header("Location:./../");
    exit;
}
$id=filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if(!$id){
    header("Location:admin.php");
    exit;
}
require __DIR__ . "/../../vendor/autoload.php";
$arrayCategoria=Categoria::getCategoriaById($id);
if(count($arrayCategoria)==0){
     header("Location:admin.php");
    exit;
}

$nombre=$arrayCategoria[0]->nombre;
$color=$arrayCategoria[0]->color;

if($_SERVER['REQUEST_METHOD']=='POST'){
    $nombre=Validacion::sanearCadena($_POST['nombre']);
    $color=Validacion::sanearCadena($_POST['color']);

    $errores=false;
    if(!Validacion::longitudCadenaValida('nombre', $nombre, 3, 50)){
        $errores=true;
    }else{
        if(Validacion::existeCategoria($nombre, $id)){
            $errores=true;
        }
    }
    if(!Validacion::colorValido($color)){
        $errores=true;
    }
    if(!$errores){
        (new Categoria)
        ->setNombre($nombre)
        ->setColor($color)
        ->update($id);
        $_SESSION['mensaje']="Categoria modificada";
        header("Location:admin.php");
        die();
    }
}

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
    <title>Editar Categoria</title>
</head>

<body class="">
    <?php Navegacion::pintarBarraNavegacion() ?>
    <div class="mt-4 w-1/3 mx-auto bg-white rounded-2xl shadow-xl overflow-hidden">

        <!-- Cabecera -->
        <div class="bg-indigo-600 px-6 py-5 text-white">
            <h1 class="text-2xl font-bold">
                <i class="fa-solid fa-tags mr-2"></i>
                Editar categoría
            </h1>
            <p class="text-indigo-100 text-sm mt-1">
                Edita los distintos campos.
            </p>
        </div>

        <!-- Formulario -->
        <form action="editar.php?id=<?= $id ?>" method="POST" class="p-6 space-y-6">

            <!-- Nombre -->
            <div>
                <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fa-solid fa-tag text-indigo-500 mr-2"></i>
                    Nombre de la categoría
                </label>

                <input
                    type="text"
                    name="nombre"
                    id="nombre"
                    value="<?= $nombre ?>"
                    placeholder="Ej. Tecnología"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl
                           focus:outline-none focus:ring-2 focus:ring-indigo-500
                           focus:border-indigo-500 transition">
            </div>
            <?php Validacion::pintarError('err_nombre') ?>

            <!-- Color -->
            <div>
                <label for="color" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fa-solid fa-palette text-indigo-500 mr-2"></i>
                    Color de la categoría
                </label>

                <div class="flex items-center gap-3">
                    <input
                        type="color"
                        name="color"
                        id="color"
                        value="<?= $color ?>"
                        class="h-14 w-20 cursor-pointer rounded-lg border border-gray-300 p-1">

                    <span class="text-sm text-gray-500">
                        Selecciona el color que identificará esta categoría.
                    </span>
                </div>
            </div>
            <?php Validacion::pintarError('err_color') ?>

            <!-- Botones -->
            <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-100">

                <a href="admin.php"
                    class="flex-1 flex justify-center items-center gap-2 px-5 py-3
                          rounded-xl border border-gray-300 text-gray-700 font-semibold
                          hover:bg-gray-100 transition">
                    <i class="fa-solid fa-arrow-left"></i>
                    Cancelar
                </a>

                <button type="submit"
                    class="flex-1 flex justify-center items-center gap-2 px-5 py-3
                               rounded-xl bg-indigo-600 text-white font-semibold
                               hover:bg-indigo-700 transition shadow-md shadow-indigo-200">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Enviar
                </button>

            </div>

        </form>

    </div>

</body>

</html>