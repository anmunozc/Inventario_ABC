<?php
require "conexion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Logistica - Iniciar sesión</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Iniciar sesión</h1>
    <form method="POST" action="login.php">
        <label>Usuario:</label>
        <input type="text" name="usuario"><br>
        <label>Contraseña:</label>
        <input type="password" name="contrasena"><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>

<?php

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar la información ingresada
   
    // Si la información es válida, redirigir al usuario a la siguiente página
    header("Location: ingresar_producto.php");
    exit;
}
