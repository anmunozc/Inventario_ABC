<?php
// register.php
require "conexion.php";

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar y sanitizar los datos del formulario
    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);
    $errores = [];

    // Validar los campos
    if (empty($usuario)) {
        $errores[] = "El nombre de usuario es obligatorio.";
    }

    if (empty($contrasena)) {
        $errores[] = "La contraseña es obligatoria.";
    }

    if (empty($errores)) {
        // NO se encripta la contraseña, se guarda en texto plano
        $hashed_password = $contrasena;

        // Preparar la consulta SQL para prevenir inyecciones SQL
        $stmt = $conn->prepare("INSERT INTO usuarios (usuario, contrasena) VALUES (?, ?)");
        $stmt->bind_param("ss", $usuario, $hashed_password);

        if ($stmt->execute()) {
            echo "<p>¡Registro completado con éxito!</p>";
            // Redirigir al formulario de inicio de sesión o a otra página
            header("Location: login.php");
            exit();
        } else {
            // Verificar si el usuario ya existe
            if ($conn->errno === 1062) { // Código de error para duplicados
                echo "<p>El nombre de usuario ya está en uso. Por favor, elige otro.</p>";
            } else {
                echo "<p>Error al registrar el usuario: " . $conn->error . "</p>";
            }
        }

        $stmt->close();
    } else {
        // Mostrar errores
        foreach ($errores as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}

// Cerrar la conexión
$conn->close();
