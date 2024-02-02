<?php
include 'header.php';

// Conexión a la base de datos (ajusta los detalles según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "post";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los posts
$sql = "SELECT id, fecha, titulo, noticia, imagen FROM contenido";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los posts
    while($row = $result->fetch_assoc()) {
        echo '<div class="post">';
        echo '<img src="' . $row["imagen"] . '" alt="' . $row["titulo"] . '">';
        echo '<h2>' . $row["titulo"] . '</h2>';
        echo '<p>' . substr($row["noticia"], 0, 100) . '...</p>';
        echo '<a href="post.php?id=' . $row["id"] . '" class="read-more-btn">Leer más</a>';
        echo '</div>';
    }
} else {
    echo "No se encontraron posts.";
}

$conn->close();

include 'footer.php';
