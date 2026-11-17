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
    <title>No Autorizado</title>
</head>

<body class="min-h-screen bg-slate-100 flex items-center justify-center p-6">

    <main class="w-full max-w-lg bg-white rounded-2xl shadow-xl p-10 text-center">

        <!-- Icono -->
        <div class="mx-auto flex items-center justify-center w-20 h-20 rounded-full bg-red-100 mb-6">
            <i class="fa-solid fa-lock text-4xl text-red-500"></i>
        </div>

        <!-- Código de error -->
        <h1 class="text-8xl font-extrabold text-slate-800 tracking-tight">
            403
        </h1>

        <h2 class="text-2xl font-bold text-slate-800 mt-4">
            Acceso denegado
        </h2>

        <p class="text-slate-500 mt-3 leading-relaxed">
            Lo sentimos, no tienes permisos suficientes para acceder
            a esta página. Si crees que se trata de un error,
            contacta con el administrador.
        </p>

        <!-- Separador -->
        <div class="border-t border-slate-100 my-8"></div>

        <!-- Botón volver -->
        <a href="admin.php"
           class="inline-flex items-center justify-center gap-2 w-full
                  bg-indigo-600 hover:bg-indigo-700 text-white
                  font-semibold py-3 px-6 rounded-xl
                  transition duration-200 shadow-md shadow-indigo-200">

            <i class="fa-solid fa-arrow-left"></i>
            Volver al panel de administración

        </a>

        <p class="text-xs text-slate-400 mt-6">
            Error HTTP 403 · Forbidden
        </p>

    </main>

</body>
</html>
