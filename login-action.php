<?php
$host = 'localhost';
$dbname = 'datos';
$user = 'postgres';
$password = 'curso';

$dsn = "pgsql:host=$host;dbname=$dbname;user=$user;password=$password";

try {
    $pdo = new PDO($dsn);
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario de inicio de sesión
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // Consultar la base de datos para obtener la contraseña almacenada del usuario
    $sql = "SELECT correo, contrasena FROM usuarios WHERE correo = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$correo]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si el usuario existe y la contraseña es correcta
    if ($usuario && password_verify($contrasena, $usuario["contrasena"])) {
        // Inicio de sesión exitoso
        // Puedes almacenar información del usuario en la sesión si es necesario
        session_start();
        $_SESSION["correo"] = $usuario["correo"];

        // Redirigir al usuario a la página de inicio después del inicio de sesión
        header("Location: index.php");
        exit();
    } else {
        // Credenciales incorrectas, mostrar mensaje de error o redirigir a página de inicio de sesión
        echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
    }
}

// Si llegamos aquí, significa que se intentó acceder a login-action.php directamente sin enviar datos de formulario
// Puedes manejar esto según tus necesidades, por ejemplo, redirigir al usuario a la página de inicio de sesión.
?>
