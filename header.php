<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Blog</title>
    <!-- Enlace al archivo de estilos de Tailwind CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="flex flex-col min-h-screen bg-gray-100">

<header class="bg-black text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo con enlace a la página principal -->
        <a href="index.php" class="text-2xl font-bold text-green-500 transition duration-300 transform hover:text-gray-800 hover:scale-105">Security Blog</a>

        <!-- Botón de login -->
        <a href="login.php">
            <button class="bg-green-500 text-white px-4 py-2 rounded transition duration-300 hover:scale-105">Login</button>
        </a>
    </div>
</header>

<nav class="bg-gray-800 text-white p-4">
    <div class="container mx-auto flex justify-center">
        <!-- Enlace a los posts públicos -->
        <a href="#" class="mx-4 transition text-green-300 duration-300 transform hover:text-gray-300 hover:scale-105">Posts Públicos</a>

        <!-- Enlace para crear un nuevo post (privado) -->
        <a href="#" class="mx-4 transition text-green-300 duration-300 transform hover:text-gray-300 hover:scale-105">Crear Post</a>
    </div>
</nav>