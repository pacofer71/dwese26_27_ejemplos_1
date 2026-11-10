<?php
    http_response_code(403);
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

<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">

    <main class="w-full max-w-lg">

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

            <!-- Cabecera -->
            <div class="bg-red-600 px-6 py-8 text-center">

                <div class="w-20 h-20 mx-auto bg-white/20 rounded-full flex items-center justify-center mb-4">
                    <i class="fa-solid fa-ban text-white text-4xl"></i>
                </div>

                <h1 class="text-3xl font-bold text-white">
                    Acceso denegado
                </h1>

                <p class="text-red-100 mt-2 text-sm">
                    Error 403 - Forbidden
                </p>

            </div>

            <!-- Contenido -->
            <div class="px-8 py-8 text-center">

                <h2 class="text-xl font-bold text-gray-800 mb-3">
                    No tienes permiso para realizar esta acción
                </h2>

                <p class="text-gray-500 leading-relaxed mb-6">
                    El post que intentas modificar o eliminar no te pertenece.
                    Por motivos de seguridad, no puedes realizar esta operación.
                </p>

                <!-- Aviso -->
                <div class="bg-red-50 border border-red-100 rounded-xl p-4 mb-8 text-left flex gap-3">

                    <i class="fa-solid fa-shield-halved text-red-500 text-xl mt-1"></i>

                    <div>
                        <p class="text-sm font-semibold text-red-800">
                            Operación no permitida
                        </p>

                        <p class="text-xs text-red-600 mt-1">
                            Si crees que se trata de un error, contacta con el administrador.
                        </p>
                    </div>

                </div>

                <!-- Botón volver -->
                <a href="admin.php"
                    class="inline-flex items-center justify-center gap-2 w-full bg-gray-900 hover:bg-gray-700 text-white font-semibold py-3 px-6 rounded-xl transition duration-200 shadow-md">

                    <i class="fa-solid fa-arrow-left"></i>
                    Volver al panel de administración

                </a>

                <p class="text-xs text-gray-400 mt-6">
                    <i class="fa-solid fa-lock mr-1"></i>
                    Acceso protegido por permisos de usuario
                </p>

            </div>

        </div>

        <p class="text-center text-xs text-gray-400 mt-6">
            &copy; <?php echo date('Y'); ?> - Panel de administración
        </p>

    </main>

</body>

</html>