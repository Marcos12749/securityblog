<?php
// post.php

// Incluye la conexión a la base de datos
global $conn;
include 'conexion.php';  // Ajusta el nombre del archivo según tu configuración

// Recupera el ID del post de la URL
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $post_id = $_GET['id'];

    // Consulta para obtener el post específico
    // (ajusta según tu configuración y estructura de base de datos)
    $sql = "SELECT fecha, titulo, noticia, imagen FROM contenido WHERE id = $post_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar el post completo
        $row = $result->fetch_assoc();
        echo '<h2>' . $row["titulo"] . '</h2>';
        echo '<p>' . $row["noticia"] . '</p>';
        echo '<a href="index.php">Volver a la lista de posts</a>';
    } else {
        echo "Post no encontrado.";
    }
} else {
    echo "ID de post no válido.";
}
?>

