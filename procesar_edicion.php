<?php
require "conexion.php";

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $idProducto = $_POST['IDproducto'];
    $nombreProducto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $ubicacion = $_POST['ubicacion'];
    $fechaIngreso = $_POST['fecha'];
    $fechaSalida = $_POST['salida'];
    $numTracker = $_POST['num_tracker'];

    // Validar la información ingresada
    if (empty($nombreProducto) || empty($cantidad) || empty($ubicacion) || empty($fechaIngreso)) {
        echo "Todos los campos obligatorios deben ser completados.";
        exit;
    }

    // Preparar y ejecutar la consulta de actualización
    $sql = "UPDATE inventario SET nombre_producto = ?, cantidad = ?, ubicacion = ?, fecha_ingreso = ?, fecha_salida = ?, num_tracker = ? WHERE IDproducto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissssi", $nombreProducto, $cantidad, $ubicacion, $fechaIngreso, $fechaSalida, $numTracker, $idProducto);
    
    if ($stmt->execute()) {
        echo "Producto actualizado con éxito.";
        header("Location: ver_registro.php"); // Redirigir a la página de visualización
        exit;
    } else {
        echo "Error al actualizar el producto: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();

