<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "post";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("La conexión a MySQL falló: " . mysqli_connect_error());
}

echo "Conexión exitosa a MySQL";

mysqli_close($conn);

