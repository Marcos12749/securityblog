<?php

$host = 'localhost';
$dbname = 'datos';
$user = 'postgres';
$password = 'curso';

$dsn = "pgsql:host=$host;dbname=$dbname;user=$user;password=$password";

$pdo = new PDO($dsn);
echo "Conexión exitosa a la base de datos.";
