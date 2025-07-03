<?php
session_start();
require "conexion.php";

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Prepare and bind
$stmt = $conn->prepare("SELECT contrasena FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$stmt->store_result();

// Check if user exists
if ($stmt->num_rows > 0) {
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    // Verify password
    if (password_verify($contrasena, $hashed_password)) {
        // Password is correct, start session
        $_SESSION['usuario'] = $usuario;
        header("Location: ingresar_producto.php"); 
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Usuario no encontrado.";
}

$stmt->close();
$conn->close();
