<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location:login.php");
    exit;
}

$email = $_SESSION['email'];

$id=filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if(!$id){
    header("Location:admin.php");
    exit;
}

require __DIR__ . "/../vendor/autoload.php";

use App\Bd\{Categoria, Post, Usuario};

use App\Utils\{Validacion, Navegacion};

if(!Post::postPerteneceUsuario($email, $id)){
    header("location:prohibido.php");
    exit;
}



$categorias = Categoria::read();
$post=Post::findPostById($id);

$titulo = $post->titulo;
$contenido = $post->contenido;
$estado = $post->estado;
$categoria = $post->category_id;
$imagenVieja=$post->imagen;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $titulo = Validacion::sanearCadena($_POST['titulo']);
    $contenido = Validacion::sanearCadena($_POST['contenido']);
    $categoria = (int) $_POST['categoria'];
    $estado = $_POST['estado'] ?? "-1"; //Operador nuevo ??
    $estado = Validacion::sanearCadena($estado);

    $errores = false;
    if (!Validacion::longitudCadenaValida('titulo', $titulo, 5, 150)) {
        $errores = true;
    }

    if (!Validacion::longitudCadenaValida('contenido', $contenido, 15, 500)) {
        $errores = true;
    }
    if (!Validacion::estadoValido($estado)) {
        $errores = true;
    }
    if (!Validacion::categoriaValida($categoria)) {
        $errores = true;
    }

    //VAmos a procesar la imagen
    //var_dump($_FILES['imagen']);
    //die();

    $miImagen=$imagenVieja;
    if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
        // Si pasa esto el usuario ha subido un archivo
        //compruebo qua haya subido una imagen y que no exceda los 2mb en este caso
        if(Validacion::imagenValida($_FILES['imagen']['type'], $_FILES['imagen']['size'])){
            //si estoy aqui tipo y tamaño correctos
            //creo un nombre nuevo para no sobreescribir archivos
            //guardo la extension del archivo original jpg, png, ico la que sea
            $extension=strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
            $miImagen="/imagenes/".uniqid().".$extension"; // /imagenes/123564.jpg
            if(!move_uploaded_file($_FILES['imagen']['tmp_name'], ".$miImagen")){
                $_SESSION['err_imagen']="*** Error, no se pudo guardar la imagen";
                $errores=true;
            }else{
                //todo fue bien elimino el archivo antiguo si no es default.jpg
                if(basename($imagenVieja)!='default.jpg'){
                    unlink(".$imagenVieja");
                }
            }

        }else{
            $errores=true;
        }

    }
    if(!$errores){
       
        (new Post)
        ->setTitulo($titulo)
        ->setContenido($contenido)
        ->setEstado($estado)
        ->setCategory_id($categoria)
        ->setImagen($miImagen)
        ->update($id);
        $_SESSION['mensaje']="Post Editado con relativa suerte";
        header("Location:admin.php");
        exit;
    }

}
$checkedPublicado = ($estado == 'Publicado') ? "checked" : "";
$checkedBorrador = ($estado == 'Borrador') ? "checked" : "";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css" integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Editar Post</title>
</head>

<body class="bg-gray-50 min-h-screen text-gray-800">

    <!-- NAVBAR -->
    <?php Navegacion::pintarBarraNavegacion(); ?>
    <div class="max-w-3xl mx-auto px-6 py-10">

        <!-- Cabecera -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                Editar Post
            </h1>
            <p class="text-gray-500 mt-2">
                Completa los siguientes campos para editar el post.
            </p>
        </div>

        <!-- Formulario -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">

            <form action="editar.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">

                <!-- Título -->
                <div class="mb-6">
                    <label for="titulo"
                        class="block text-sm font-semibold text-gray-700 mb-2">
                        Título
                    </label>

                    <input type="text"
                        id="titulo"
                        name="titulo"
                        value="<?= $titulo ?>"
                        placeholder="Introduce el título del post"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                </div>
                <?php Validacion::pintarError('err_titulo'); ?>

                <!-- Descripción -->
                <div class="mb-6">
                    <label for="descripcion"
                        class="block text-sm font-semibold text-gray-700 mb-2">
                        Descripción
                    </label>

                    <textarea id="descripcion"
                        name="contenido"
                        rows="5"
                        placeholder="Escribe el contenido de tu publicación..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition resize-y"><?= $contenido ?></textarea>
                </div>
                <?php Validacion::pintarError('err_contenido'); ?>


                <!-- Categoría -->
                <div class="mb-6">
                    <label for="categoria"
                        class="block text-sm font-semibold text-gray-700 mb-2">
                        Categoría
                    </label>

                    <select id="categoria"
                        name="categoria"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">

                        <option value="-1" selected>Selecciona una categoría</option>
                        <?php foreach ($categorias as $cat):
                            $selected = $cat->id == $categoria ? "selected" : ""
                        ?>
                            <option value="<?= $cat->id ?>" <?= $selected ?>><?= $cat->nombre ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
                <?php Validacion::pintarError('err_categoria'); ?>


                <!-- Publicado -->
                <div class="mb-8">
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        ¿Publicar post?
                    </label>

                    <div class="flex items-center gap-8">

                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio"
                                name="estado"
                                value="Publicado"
                                <?= $checkedPublicado ?>

                                class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <span class="text-sm text-gray-700">Sí</span>
                        </label>

                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio"
                                name="estado"
                                value="Borrador"
                                <?= $checkedBorrador ?>
                                class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <span class="text-sm text-gray-700">No</span>
                        </label>

                    </div>
                </div>
                <?php Validacion::pintarError('err_estado'); ?>


                <!-- Imagen -->
                <label class="block text-sm font-semibold text-gray-700 mb-3">
                    Imagen
                </label>
                <div class="mb-8 w-full h-98 bg-gray-200 relative rounded-lg">
                    <label for="cpost" class='absolute p-2 bg-black text-white font-semibold bottom-2 right-2 rounded-xl'>SUBIR</label>
                    <input type='file' name='imagen' class="hidden" accept="image/*" id="cpost" />
                    <img src="<?= ".$imagenVieja" ?>" id="preview" class="w-full h-full bg-center bg-cover bg-no-repeat" />
                </div>
                <?php Validacion::pintarError('err_imagen'); ?>


                <!-- Botones -->
                <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-100">

                    <a href="admin.php"
                        class="inline-flex items-center gap-2 px-5 py-3 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 transition font-medium">
                        <i class="fa-solid fa-xmark"></i>
                        Cancelar
                    </a>

                    <button type="submit"
                        class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white shadow-sm transition font-medium">
                        <i class="fa-solid fa-paper-plane"></i>
                        Enviar
                    </button>

                </div>

            </form>

        </div>

    </div>
    <script>
        const input = document.getElementById('cpost');
        const preview = document.getElementById('preview');

        input.addEventListener('change', function() {

            if (this.files && this.files[0]) {
                preview.src = URL.createObjectURL(this.files[0]);
            }

        });
    </script>
</body>

</html>