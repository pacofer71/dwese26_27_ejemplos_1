<?php

use App\Utils\Validacion;

    session_start();
    require __DIR__."/../vendor/autoload.php";
    $email="";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $email=Validacion::sanearCadena($_POST['email']);
        $password=Validacion::sanearCadena($_POST['password']);
        if(Validacion::loginValido($email, $password)){
            session_regenerate_id(true);
            $_SESSION['email']=$email;
            header("Location:admin.php");
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
    <title>Posts</title>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

   


    <!-- CONTENIDO PRINCIPAL -->
    <main class="flex-1 flex items-center justify-center px-4 py-10">

        <!-- TARJETA LOGIN -->
        <div class="bg-white w-full max-w-md rounded-2xl shadow-sm border border-gray-200 p-8">

            <!-- CABECERA -->
            <div class="text-center mb-8">

                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fa-solid fa-user-lock text-blue-600 text-2xl"></i>
                </div>

                <h2 class="text-2xl font-bold text-gray-800">
                    Bienvenido de nuevo
                </h2>

                <p class="text-sm text-gray-500 mt-2">
                    Accede a tu cuenta de SocialNet
                </p>

            </div>


            <!-- FORMULARIO -->
            <form action="login.php" method="POST" class="space-y-5">

                <!-- EMAIL -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        Email
                    </label>

                    <div class="relative">
                        <i class="fa-solid fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="<?= $email ?>"
                            placeholder="usuario@email.com"
                            class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl text-sm text-gray-700 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition"
                        >
                    </div>
                </div>


                <!-- PASSWORD -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        Password
                    </label>

                    <div class="relative">
                        <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Introduce tu contraseña"
                            class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl text-sm text-gray-700 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition"
                        >
                    </div>
                </div>


                <!-- BOTONES -->
                <div class="flex gap-3 pt-3">

                    <a href="index.php"
                       class="flex-1 flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 rounded-xl transition text-sm">

                        <i class="fa-solid fa-xmark"></i>
                        Cancelar

                    </a>

                    <button
                        type="submit"
                        class="flex-1 flex items-center justify-center gap-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 rounded-xl transition text-sm">

                        <i class="fa-solid fa-right-to-bracket"></i>
                        Login

                    </button>

                </div>

            </form>
            <?php Validacion::pintarError('err_login') ?>
        </div>

    </main>

</body>
</html>