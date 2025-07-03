<?php
$servername = "localhost";  // Cambia si tu servidor es diferente
$username = "root";         // El usuario de tu base de datos
$password = "";             // La contraseña, déjala vacía si no tienes
$dbname = "inventario_db";  // El nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
