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
    $contrasena = $_POST["contrasena"];
    $confirmarContrasena = $_POST["confirmar_contrasena"];

    // Validar que las contraseñas coincidan
    if ($contrasena != $confirmarContrasena) {
        echo "Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
    } else {
        // Contraseñas coinciden, proceder con el registro en la base de datos
        $hashedContrasena = password_hash($contrasena, PASSWORD_DEFAULT);

        // Preparar la consulta SQL para insertar en la base de datos
        $sql = "INSERT INTO usuarios (correo, contrasena) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$correo, $hashedContrasena]);

        // Redirigir al usuario a la página de inicio después del registro
        header("Location: index.php");
        exit();
    }
}
?>
