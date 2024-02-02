<?php
include 'header.php';
?>
    <div class="container mx-auto p-4 mt-8">
        <form action="login-action.php" method="post" class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md">
            <h2 class="text-2xl font-bold mb-6">Iniciar Sesión</h2>

            <!-- Campo de correo electrónico -->
            <div class="mb-4">
                <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" class="w-full p-2 border border-gray-300 rounded">
            </div>

            <!-- Campo de contraseña -->
            <div class="mb-6">
                <label for="contrasena" class="block text-gray-700 text-sm font-bold mb-2">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" class="w-full p-2 border border-gray-300 rounded">
            </div>

            <!-- Botón de enviar -->
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline-green active:bg-green-800">
                    Iniciar Sesión
                </button>
            </div>
        </form>
    </div>
<?php
include 'footer.php';
?>