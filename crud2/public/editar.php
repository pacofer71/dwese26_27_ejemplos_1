<?php

use App\Bd\Articulo;
use App\Utils\Navegacion;
use App\Utils\Validacion;

require __DIR__ . "/../vendor/autoload.php";
session_start();
// Comprobamos que estamos loogeados y somos admin
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] != 1) {
    header("Location:sitio.php");
    exit;
}
//comprobamos que me llega por get codigo y que guarda un valor entero
$id = filter_input(INPUT_GET, 'codigo', FILTER_VALIDATE_INT);
if (!$id) {
    header("Location:sitio.php");
    exit;
}
//VaMos a recuperart el articulo del id que sea;
$arrayArticulo = Articulo::devolverArticulo($id);
// si no lo encuentro nos vamos
if (count($arrayArticulo) == 0) {
    header("Location:sitio.php");
    exit;
}
$articulo=$arrayArticulo[0];

//
$nombre = $articulo->nombre;
$descripcion = $articulo->descripcion;
$precio = $articulo->precio;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Recojo y limpio lo que nos llega del form
    $nombre = Validacion::sanearCadena($_POST['nombre']);
    $descripcion = Validacion::sanearCadena($_POST['descripcion']);
    $precio = (float) trim($_POST['precio']);

    $errores = false;
    if (!Validacion::longitudCadenaValida('nombre', $nombre, 3, 40)) {
        $errores = true;
    } else {
        if (Validacion::existeNombre($nombre, $id)) $errores = true;
    }

    if (!Validacion::longitudCadenaValida('descripcion', $descripcion, 10, 500)) {
        $errores = true;
    }

    if (!Validacion::esPrecioValido($precio, 3, 9999.99)) {
        $errores = true;
    }
    if (!$errores) {
        //si no hay erroresd guardo el articulo
        (new Articulo)
            ->setNombre($nombre)
            ->setDescripcion($descripcion)
            ->setPrecio($precio)
            ->update($id);
        $_SESSION['mensaje'] = "Artículo actualizado con exito.";
        header("Location:sitio.php");
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN TAILWIND CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Articulos</title>
</head>

<body class="">

    <?php Navegacion::pintarNavegacion($_SESSION['username'], $_SESSION['perfil']); ?>

    <div class="p-8 w-256 mx-auto">

        <!-- Título -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                Editar artículo
            </h1>

        </div>

        <form action="editar.php?codigo=<?= $id ?>" method="post" class="space-y-6">

            <!-- Nombre -->
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">
                    Nombre
                </label>

                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    value="<?= $nombre ?>"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg
                           focus:outline-none focus:ring-2 focus:ring-blue-500
                           focus:border-blue-500 transition"
                    placeholder="Introduce el nombre del artículo">
                <?php Validacion::pintarError('err_nombre') ?>
            </div>

            <!-- Descripción -->
            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">
                    Descripción
                </label>

                <textarea
                    id="descripcion"
                    name="descripcion"
                    rows="5"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg
                           resize-none focus:outline-none focus:ring-2
                           focus:ring-blue-500 focus:border-blue-500 transition"
                    placeholder="Escribe una descripción del artículo..."><?= $descripcion ?></textarea>
                <?php Validacion::pintarError('err_descripcion') ?>
            </div>

            <!-- Precio -->
            <div>
                <label for="precio" class="block text-sm font-medium text-gray-700 mb-2">
                    Precio
                </label>

                <div class="relative">
                    <input
                        type="number"
                        id="precio"
                        name="precio"
                        step="0.01"
                        min="0"
                        value="<?= $precio ?>"
                        class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg
                               focus:outline-none focus:ring-2 focus:ring-blue-500
                               focus:border-blue-500 transition"
                        placeholder="0.00">

                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400">
                        €
                    </span>
                    <?php Validacion::pintarError('err_precio') ?>
                </div>
            </div>

            <!-- Botones -->
            <div class="flex flex-col sm:flex-row gap-3 pt-4">

                <!-- Cancelar -->
                <a
                    href="sitio.php"
                    class="flex-1 text-center px-6 py-3 rounded-lg
                           border border-gray-300 text-gray-700
                           hover:bg-gray-100 transition font-medium">
                    Cancelar
                </a>

                <!-- Limpiar -->
                <button
                    type="reset"
                    class="flex-1 px-6 py-3 rounded-lg
                           border border-gray-300 text-gray-700
                           hover:bg-gray-100 transition font-medium">
                    Limpiar
                </button>

                <!-- Enviar -->
                <button
                    type="submit"
                    class="flex-1 px-6 py-3 rounded-lg
                           bg-blue-600 text-white font-medium
                           hover:bg-blue-700 transition
                           focus:outline-none focus:ring-2
                           focus:ring-blue-500 focus:ring-offset-2">
                    Enviar
                </button>

            </div>

        </form>

    </div>

</body>

</html>