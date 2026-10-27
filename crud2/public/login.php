<?php

use App\Utils\Validacion;


    session_start();
    require __DIR__."/../vendor/autoload.php";
    $username="";
    $password="";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $username=Validacion::sanearCadena($_POST['username']);
        $password=Validacion::sanearCadena($_POST['password']);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN TAILWIND CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-950 via-slate-900 to-indigo-950 flex items-center justify-center px-4">

    <div class="w-full max-w-md">

        <!-- Logo / Cabecera -->
        <div class="text-center mb-8">
            <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-indigo-600 shadow-lg shadow-indigo-600/30">
                <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v2h8z" />
                </svg>
            </div>

            <h1 class="text-3xl font-bold text-white">
                Bienvenido
            </h1>

            <p class="mt-2 text-sm text-slate-400">
                Inicia sesión para continuar
            </p>
        </div>

        <!-- Tarjeta del formulario -->
        <div class="rounded-2xl border border-white/10 bg-white/10 p-8 shadow-2xl backdrop-blur-xl">

            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class="space-y-6">

                <!-- Username -->
                <div>
                    <label for="username" class="mb-2 block text-sm font-medium text-slate-200">
                        Usuario
                    </label>

                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            placeholder="Introduce tu usuario"
                            required
                            class="w-full rounded-xl border border-white/10 bg-slate-900/60 py-3.5 pl-12 pr-4 text-white placeholder-slate-500 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="mb-2 block text-sm font-medium text-slate-200">
                        Contraseña
                    </label>

                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v2h8z" />
                            </svg>
                        </div>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Introduce tu contraseña"
                            required
                            class="w-full rounded-xl border border-white/10 bg-slate-900/60 py-3.5 pl-12 pr-4 text-white placeholder-slate-500 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30">
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex gap-3 pt-2">

                    <button
                        type="submit"
                        class="flex-1 rounded-xl bg-indigo-600 px-5 py-3.5 font-semibold text-white shadow-lg shadow-indigo-600/25 transition hover:bg-indigo-500 hover:shadow-indigo-500/30 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-slate-900">
                        Login
                    </button>

                    <button
                        type="reset"
                        class="rounded-xl border border-white/10 bg-white/5 px-5 py-3.5 font-semibold text-slate-300 transition hover:bg-white/10 hover:text-white focus:outline-none focus:ring-2 focus:ring-slate-500">
                        Limpiar
                    </button>

                </div>

            </form>

        </div>

        <!-- Pie -->
        <p class="mt-6 text-center text-xs text-slate-500">
            Acceso seguro al sistema
        </p>

    </div>

</body>

</html>