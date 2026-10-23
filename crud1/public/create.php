<?php
session_start();
use App\Bbdd\Articulo;
use App\Utils\Validacion;

require __DIR__."/../vendor/autoload.php";
    //creamos una var por cada compo
    $nombre="";
    $descripcion="";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        //1.- recogemos y saneamos los datos que me llegan por post en este caso
        $nombre=Validacion::limpiarCadenas($_POST['nombre']);
        $descripcion=Validacion::limpiarCadenas($_POST['descripcion']);
        //2.- Hago las validaciones que toquen
        $errores=false;
        if(!Validacion::esLongitudCadenaValida('nombre', $nombre, 3, 40)){
            $errores=true;
        }else{
            //la loongitud del nombre es correcta
            //comprobemos si esta o no duplicado
            if(Validacion::existeNombre($nombre)){
                $errores=true;
            }
        }
        if(!Validacion::esLongitudCadenaValida('descripcion', $descripcion, 10, 250)){
            $errores=true;
        }
        //3.- Si no hay errores gyardo el registro
        if(!$errores){
            //Guardo el articulo
            (new Articulo())
            ->setNombre($nombre)
            ->setDescripcion($descripcion)
            ->create();
            $_SESSION['mensaje']="Se guardó el artículo";
            header("Location:inicio.php");
            exit; //die();
        }

    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN TAilwind cSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Crear Articulo</title>
</head>

<body class="bg-slate-100 min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-2xl">

        <!-- Cabecera -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-slate-800">
                Nuevo artículo
            </h1>
            <p class="text-slate-500 mt-2">
                Completa los datos para crear un nuevo artículo.
            </p>
        </div>

        <!-- Formulario -->
        <form
            action="<?= $_SERVER['PHP_SELF'] ?>"
            method="POST"
            class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">

            <!-- Nombre del artículo -->
            <div class="mb-6">
                <label
                    for="nombre"
                    class="block text-sm font-semibold text-slate-700 mb-2">
                    Nombre del artículo
                </label>

                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    placeholder="Introduce el nombre del artículo"
                    value="<?= $nombre ?>"
                    class="w-full px-4 py-3 rounded-xl border border-slate-300
                           text-slate-800 placeholder-slate-400
                           focus:outline-none focus:ring-2 focus:ring-indigo-500
                           focus:border-indigo-500 transition">
                <?php Validacion::pintarError('err_nombre'); ?>
            </div>

            <!-- Descripción -->
            <div class="mb-8">
                <label
                    for="descripcion"
                    class="block text-sm font-semibold text-slate-700 mb-2">
                    Descripción
                </label>

                <textarea
                    id="descripcion"
                    name="descripcion"
                    rows="6"
                    placeholder="Escribe una descripción del artículo..."
                    class="w-full px-4 py-3 rounded-xl border border-slate-300
                           text-slate-800 placeholder-slate-400 resize-none
                           focus:outline-none focus:ring-2 focus:ring-indigo-500
                           focus:border-indigo-500 transition"><?= $descripcion ?></textarea>
                <?php Validacion::pintarError('err_descripcion'); ?>
            </div>

            <!-- Botones -->
            <div class="flex flex-col sm:flex-row items-center justify-end gap-3">

                <!-- Cancelar -->
                <a
                    href="inicio.php"
                    class="w-full sm:w-auto px-5 py-3 rounded-xl
                           text-sm font-semibold text-slate-600
                           bg-slate-100 hover:bg-slate-200
                           transition text-center">
                    Cancelar
                </a>

                <!-- Reset -->
                <button
                    type="reset"
                    class="w-full sm:w-auto px-5 py-3 rounded-xl
                           text-sm font-semibold text-slate-700
                           border border-slate-300
                           hover:bg-slate-50 transition">
                    Limpiar
                </button>

                <!-- Enviar -->
                <button
                    type="submit"
                    class="w-full sm:w-auto px-6 py-3 rounded-xl
                           text-sm font-semibold text-white
                           bg-indigo-600 hover:bg-indigo-700
                           shadow-sm hover:shadow
                           transition">
                    Crear artículo
                </button>

            </div>

        </form>

    </div>

</body>

</html>