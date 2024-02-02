<?php
$host = 'localhost';
$dbname = 'datos';
$user = 'postgres';
$password = 'curso';

$dsn = "pgsql:host=$host;dbname=$dbname;user=$user;password=$password";

$pdo = new PDO($dsn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];
    $confirmarcontraseña = $_POST["confirmar_contraseña"];

    // Validar que las contraseñas coincidan
    if ($contraseña != $confirmarcontraseña) {
        echo "Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
    } else {
        // Contraseñas coinciden, proceder con el registro en la base de datos
        $hashedcontraseña = password_hash($contraseña, PASSWORD_DEFAULT);

        // Preparar la consulta SQL para insertar en la base de datos
        $sql = "INSERT INTO usuarios (correo, contraseña) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$correo, $hashedcontraseña]);

        header("Location: index.php");
        exit();
    }
}
include 'header.php'
?>

<body class="bg-gray-100">

<div class="container mx-auto p-4 mt-8">
    <form action="" method="post" class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md">
        <h2 class="text-2xl font-bold mb-6">Registro</h2>

        <div class="mb-4">
            <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" class="w-full p-2 border border-gray-300 rounded">
        </div>

        <!-- Campo de contraseña -->
        <div class="mb-4">
            <label for="contraseña" class="block text-gray-700 text-sm font-bold mb-2">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" class="w-full p-2 border border-gray-300 rounded">
        </div>

        <!-- Campo de confirmación de contraseña -->
        <div class="mb-6">
            <label for="confirmar_contraseña" class="block text-gray-700 text-sm font-bold mb-2">Confirmar Contraseña:</label>
            <input type="password" id="confirmar_contraseña" name="confirmar_contraseña" class="w-full p-2 border border-gray-300 rounded">
        </div>

        <!-- Botón de enviar -->
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline-green active:bg-green-800">
                Registrarse
            </button>
        </div>
    </form>
</div>

<?php
include 'footer.php';