<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN TAilwind css -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center p-6">

    <div class="w-full max-w-3xl bg-white rounded-2xl shadow-xl p-8">

        <!-- TÍTULO -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                Formulario de Registro
            </h1>
            <p class="text-gray-500 mt-2">
                Completa tus datos para registrarte
            </p>
        </div>

        <form action="action1.php" method="GET" class="space-y-6">

            <!-- NOMBRE Y EMAIL -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- NOMBRE -->
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">
                        Nombre
                    </label>

                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        maxlength="10"
                        placeholder="Introduce tu nombre"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg
                               focus:outline-none focus:ring-2 focus:ring-blue-500
                               focus:border-blue-500">
                </div>

                <!-- EMAIL -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="ejemplo@email.com"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg
                               focus:outline-none focus:ring-2 focus:ring-blue-500
                               focus:border-blue-500">
                </div>

            </div>


            <!-- DESCRIPCIÓN -->
            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">
                    Descripción
                </label>

                <textarea
                    id="descripcion"
                    name="descripcion"
                    rows="4"
                    placeholder="Cuéntanos algo sobre ti..."
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg
                           focus:outline-none focus:ring-2 focus:ring-blue-500
                           focus:border-blue-500 resize-none"></textarea>
            </div>


            <!-- CATEGORÍA Y SUELDO -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- CATEGORÍA -->
                <div>
                    <label for="categoria" class="block text-sm font-medium text-gray-700 mb-2">
                        Categoría
                    </label>

                    <select
                        id="categoria"
                        name="categoria"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg
                               bg-white focus:outline-none focus:ring-2
                               focus:ring-blue-500 focus:border-blue-500">
                        <option value="" selected>Selecciona una categoría</option>
                        <option value="informatica">Informática</option>
                        <option value="administracion">Administración</option>
                        <option value="marketing">Marketing</option>
                        <option value="ventas">Ventas</option>
                    </select>
                </div>


                <!-- SUELDO -->
                <div>
                    <label for="sueldo" class="block text-sm font-medium text-gray-700 mb-2">
                        Sueldo (€)
                    </label>

                    <input
                        type="number"
                        id="sueldo"
                        name="sueldo"
                        min="0"
                        step="0.01"
                        placeholder="25000"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg
                               focus:outline-none focus:ring-2 focus:ring-blue-500
                               focus:border-blue-500">
                </div>

            </div>


            <!-- AFICIONES -->
            <div>
                <span class="block text-sm font-medium text-gray-700 mb-3">
                    Aficiones
                </span>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">

                    <label class="flex items-center gap-3 p-3 border border-gray-200
                                  rounded-lg cursor-pointer hover:bg-gray-50">

                        <input
                            type="checkbox"
                            name="aficiones[]"
                            value="deporte"
                            class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">

                        <span class="text-gray-700">
                            Deporte
                        </span>

                    </label>


                    <label class="flex items-center gap-3 p-3 border border-gray-200
                                  rounded-lg cursor-pointer hover:bg-gray-50">

                        <input
                            type="checkbox"
                            name="aficiones[]"
                            value="musica"
                            class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">

                        <span class="text-gray-700">
                            Música
                        </span>

                    </label>


                    <label class="flex items-center gap-3 p-3 border border-gray-200
                                  rounded-lg cursor-pointer hover:bg-gray-50">

                        <input
                            type="checkbox"
                            name="aficiones[]"
                            value="videojuegos"
                            class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">

                        <span class="text-gray-700">
                            Videojuegos
                        </span>

                    </label>

                </div>
            </div>


            <!-- RADIO BUTTON -->
            <div>
                <span class="block text-sm font-medium text-gray-700 mb-3">
                    ¿Deseas recibir información?
                </span>

                <div class="flex gap-6">

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input
                            type="radio"
                            name="informacion"
                            value="si"
                            class="w-4 h-4 text-blue-600 focus:ring-blue-500">

                        <span class="text-gray-700">
                            Sí
                        </span>
                    </label>


                    <label class="flex items-center gap-2 cursor-pointer">
                        <input
                            type="radio"
                            name="informacion"
                            value="no"
                            class="w-4 h-4 text-blue-600 focus:ring-blue-500">

                        <span class="text-gray-700">
                            No
                        </span>
                    </label>

                </div>
            </div>


            <!-- BOTONES -->
            <div class="flex flex-col sm:flex-row gap-4 pt-4">

                <!-- ENVIAR -->
                <button
                    type="submit"
                    class="flex-1 bg-blue-600 text-white py-3 px-6 rounded-lg
                           font-semibold hover:bg-blue-700
                           focus:outline-none focus:ring-2 focus:ring-blue-500
                           focus:ring-offset-2 transition">
                    Enviar
                </button>

                <!-- RESET -->
                <button
                    type="reset"
                    class="flex-1 bg-gray-200 text-gray-700 py-3 px-6 rounded-lg
                           font-semibold hover:bg-gray-300
                           focus:outline-none focus:ring-2 focus:ring-gray-400
                           focus:ring-offset-2 transition">
                    Limpiar formulario
                </button>

            </div>

        </form>

    </div>

</body>

</html>