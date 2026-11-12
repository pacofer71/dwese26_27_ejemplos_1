<?php

use App\Utils\Validacion;

    session_start();
    require __DIR__."/../vendor/autoload.php";
    $email="";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $email=Validacion::sanearCadena($_POST['email']);
        $password=Validacion::sanearCadena($_POST['password']);

        $perfil=Validacion::loginValido($email, $password);
        if($perfil!=-1){
            session_regenerate_id(true);
            $_SESSION['email']=$email;
            $_SESSION['perfil']=$perfil;
            header("Location:articulos/admin.php");
            exit;
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
    <title>Login</title>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">

    <main class="w-full max-w-md">

        <!-- Cabecera -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-indigo-600 rounded-2xl shadow-lg shadow-indigo-200 mb-4">
                <i class="fa-solid fa-book-open text-white text-2xl"></i>
            </div>

            <h1 class="text-3xl font-bold text-gray-800">
                Bienvenido de nuevo
            </h1>

            <p class="text-gray-500 mt-2">
                Accede a tu cuenta y descubre nuevos artículos.
            </p>
        </div>

        <!-- Formulario -->
        <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/60 p-8 border border-gray-100">

            <h2 class="text-xl font-semibold text-gray-800 mb-2">
                Iniciar sesión
            </h2>

            <p class="text-sm text-gray-500 mb-7">
                Introduce tus credenciales para continuar.
            </p>

            <form action="login.php" method="POST" class="space-y-5">

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        Correo electrónico
                    </label>

                    <div class="relative">
                        <i class="fa-solid fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                        <input
                            type="email"
                            name="email"
                            id="email"
                            value="<?= $email ?>"
                            placeholder="usuario@ejemplo.com"
                            autocomplete="email"
                            class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-800 placeholder-gray-400 outline-none transition focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 focus:bg-white">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        Contraseña
                    </label>

                    <div class="relative">
                        <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Introduce tu contraseña"
                            required
                            autocomplete="current-password"
                            class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-800 placeholder-gray-400 outline-none transition focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 focus:bg-white">
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex flex-col gap-3 pt-3">

                    <button
                        type="submit"
                        class="w-full flex items-center justify-center gap-2 py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-md shadow-indigo-200 transition duration-200">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Iniciar sesión
                    </button>

                    <a
                        href="index.php"
                        class="w-full flex items-center justify-center gap-2 py-3 px-4 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition duration-200">
                        <i class="fa-solid fa-arrow-left"></i>
                        Cancelar
                    </a>

                </div>
                <?php Validacion::pintarError('err_login') ?>

            </form>

        </div>

        <!-- Pie -->
        <p class="text-center text-sm text-gray-400 mt-7">
            <i class="fa-solid fa-pen-to-square mr-1"></i>
            Tu espacio para compartir ideas y artículos.
        </p>

    </main>

</body>
</html>