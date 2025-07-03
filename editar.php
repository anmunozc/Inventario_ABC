<!-- editar.php -->
<?php
session_start();
require "conexion.php";

// comprobacion si la clave idproducto existe en la matriz $_GET
if (isset($_GET['idproducto'])) {
    // Recuperar la información del producto de la base de datos
    $idproducto = intval($_GET['idproducto']); // Convertir a entero para seguridad
    $sql = "SELECT * FROM inventario WHERE idproducto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idproducto);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verificar si la consulta fue exitosa
    if ($resultado && $resultado->num_rows > 0) {
        $producto = $resultado->fetch_assoc();
    } else {
        echo "Error: Producto no encontrado.";
        $producto = null;
    }

    $stmt->close();
} else {
    echo "Error: La clave 'idproducto' no se encontró en la URL.";
    $producto = null;
}
