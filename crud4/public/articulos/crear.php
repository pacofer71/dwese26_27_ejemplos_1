<?php

use App\Bd\Categoria;
use App\Bd\Usuario;
use App\Bd\Articulo;
use App\Utils\Navegacion;
use App\Utils\Validacion;

session_start();
if(!isset($_SESSION['email'])){
    header("Location:admin.php");
    exit;
}
require __DIR__ . "/../../vendor/autoload.php";
$categorias = Categoria::read();

$titulo = "";
$contenido = "";
$publicado = "";
$categoria_id = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = Validacion::sanearCadena($_POST['titulo']);
    $contenido = Validacion::sanearCadena($_POST['contenido']);
    $categoria_id = (int) $_POST['categoria'];
    $publicado = $_POST['publicado'] ?? "error";
    $publicado = Validacion::sanearCadena($publicado);

    $errores = false;

    if (!Validacion::longitudCadenaValida('titulo', $titulo, 3, 200)) {
        $errores = true;
    }
    if (!Validacion::longitudCadenaValida('contenido', $contenido, 10, 250)) {
        $errores = true;
    }
    if (!Validacion::categoriaValida($categoria_id)) {
        $errores = true;
    }
    if (!Validacion::publicadoValido($publicado)) {
        $errores = true;
    }

    //vamos a procesar la imagen
    $imagen="/imagenes/default.jpg";
    if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
        $file=$_FILES['imagen'];
        //Nos han subido un fichero vamos a validarlo
        if(Validacion::imagenValida($file['type'], $file['size'])){
            //el archivo esta correcto, es una imagenn y se ajusta al tamaño permitido
            $extension=strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $imagen="/imagenes/".uniqid().".$extension"; // /imagenes/12345asf.ico
            //movemos la imagen desde tempora a su ubicacion definitiva
            if(!move_uploaded_file($file['tmp_name'], "./..$imagen")){
                $_SESSION['err_imagen']="Error, no se pudo guardar la imagen";
            }

        }else{
            $errores=true;
        }
    }

    if (!$errores) {
        //insertamos
        $user_id=Usuario::getIdUserByEmail($_SESSION['email']);
        (new Articulo)
            ->setTitulo($titulo)
            ->setCategoria_id($categoria_id)
            ->setUsuario_id($user_id)
            ->setContenido($contenido)
            ->setPublicado($publicado)
            ->setImagen($imagen)
            ->create();
        $_SESSION['mensaje']="Artículo guardado";
        header("Location:admin.php");
        exit;
    }
}
//para que recuerde si he marcado Si o No
$ckSi = ($publicado == 'Si') ? "checked" : "";
$ckNo = ($publicado == 'No') ? "checked" : "";



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
    <title>Crear Articulo</title>
</head>

<body>
    <?php Navegacion::pintarBarraNavegacion() ?>
    <form action="crear.php" method="POST" enctype="multipart/form-data" class="mt-4 max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-lg border border-gray-100">

        <div class="mb-6">
            <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-heading text-indigo-500 mr-2"></i>
                Título del artículo
            </label>
            <input
                type="text"
                name="titulo"
                id="nombre"
                value="<?= $titulo ?>"
                placeholder="Introduce el título del artículo"
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
        </div>
        <?php Validacion::pintarError('err_titulo'); ?>

        <div class="mb-6">
            <label for="contenido" class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-align-left text-indigo-500 mr-2"></i>
                Contenido
            </label>
            <textarea
                name="contenido"
                id="contenido"
                rows="6"
                placeholder="Escribe el contenido del artículo..."
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition resize-y"><?= $contenido ?></textarea>
        </div>
        <?php Validacion::pintarError('err_contenido'); ?>

        <div class="mb-6">
            <label for="categoria" class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-tags text-indigo-500 mr-2"></i>
                Categoría
            </label>
            <select
                name="categoria"
                id="categoria"
                class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
                <option value="">Selecciona una categoría</option>
                <?php foreach ($categorias as $cat):
                    $seleccionado = ($cat->id == $categoria_id) ? "selected" : "";
                ?>
                    <option value="<?= $cat->id ?>" <?= $seleccionado ?>><?= $cat->nombre ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php Validacion::pintarError('err_categoria'); ?>

        <div class="mb-8">
            <span class="block text-sm font-semibold text-gray-700 mb-3">
                <i class="fas fa-globe text-indigo-500 mr-2"></i>
                ¿Publicar artículo?
            </span>

            <div class="flex items-center gap-8">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input
                        type="radio"
                        name="publicado"
                        value="Si"
                        <?= $ckSi ?>
                        class="w-4 h-4 text-indigo-600 focus:ring-indigo-500">
                    <span class="text-sm text-gray-700">
                        <i class="fas fa-check-circle text-green-500 mr-1"></i>
                        Sí
                    </span>
                </label>

                <label class="flex items-center gap-2 cursor-pointer">
                    <input
                        type="radio"
                        name="publicado"
                        value="No"
                        <?= $ckNo ?>
                        class="w-4 h-4 text-indigo-600 focus:ring-indigo-500">
                    <span class="text-sm text-gray-700">
                        <i class="fas fa-eye-slash text-gray-400 mr-1"></i>
                        No
                    </span>
                </label>
            </div>
        </div>
        <?php Validacion::pintarError('err_publicado'); ?>
        <!-- Imagen -->
        <label for="" class="block text-sm font-semibold text-gray-700 mb-2">
            <i class="fas fa-image text-indigo-500 mr-2"></i>
            Imagen
        </label>
        <div class="w-full h-96 rounded bg-blue-100 relative">
            <input type="file" name="imagen" accept="image/*" id="nimagen" class="hidden" />
            <label for="nimagen" class="absolute bottom-2 right-2 rounded-lg p-2 text-white bg-black font-semibold">
                <i class="fa-solid fa-upload mr-2"></i>SUBIR
            </label>
            <img src="" class="w-full h-full object-cover rounded" id="preview" />

        </div>
        <?php Validacion::pintarError('err_imagen') ?>


        <div class="flex flex-col sm:flex-row justify-end gap-3 border-t border-gray-100 pt-6">

            <a
                href="admin.php"
                class="px-6 py-3 rounded-lg border border-gray-300 text-gray-600 font-semibold text-center hover:bg-gray-100 transition">
                <i class="fas fa-times mr-2"></i>
                Cancelar
            </a>

            <button
                type="submit"
                class="px-6 py-3 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700 shadow-md shadow-indigo-200 transition">
                <i class="fas fa-plus-circle mr-2"></i>
                Crear artículo
            </button>

        </div>

    </form>
    <script>
        const input = document.getElementById('nimagen');
        const preview = document.getElementById('preview');

        input.addEventListener('change', function() {
            const reader = new FileReader();

            reader.onload = function() {
                preview.src = reader.result;
            };

            reader.readAsDataURL(input.files[0]);
        });
    </script>
</body>

</html>