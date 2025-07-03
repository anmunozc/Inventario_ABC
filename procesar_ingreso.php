<?php
// Incluir archivo de conexión a la base de datos
require "conexion.php";

// Verificar si el formulario fue enviado mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Capturar los datos enviados por el formulario
    $nombre_producto = isset($_POST['producto']) ? $_POST['producto'] : '';
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : '';
    $ubicacion = isset($_POST['Ubicacion']) ? $_POST['Ubicacion'] : '';
    $fecha_ingreso = isset($_POST['fecha']) ? $_POST['fecha'] : '';
    $fecha_salida = isset($_POST['salida']) ? $_POST['salida'] : '';
    $num_tracker = isset($_POST['num_tracker']) ? $_POST['num_tracker'] : '';

    // Validar que los campos obligatorios no estén vacíos
    if (empty($nombre_producto) || empty($cantidad) || empty($ubicacion) || empty($fecha_ingreso)) {
        echo "Todos los campos obligatorios deben ser completados.";
    } else {
        // Preparar la consulta SQL para insertar los datos en la tabla
        $sql = "INSERT INTO Inventario (nombre_producto, cantidad, ubicacion, fecha_ingreso, fecha_salida, num_tracker)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);        
        $stmt->bind_param("sissss", $nombre_producto, $cantidad, $ubicacion, $fecha_ingreso, $fecha_salida, $num_tracker);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Producto ingresado correctamente en el inventario.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Cerrar la declaración
        $stmt->close();
    }
} else {
    echo "No se recibieron los datos del formulario.";
}

// Cerrar la conexión
$conn->close();

    // Si la información es válida, redirigir al usuario a la siguiente página
    header("Location: ver_registro.php");
    exit;

