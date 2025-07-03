<!-- ver_registro.php -->
<?php
require "conexion.php";

// Consulta para recuperar todos los datos de la tabla inventario
$sql = "SELECT * FROM inventario";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Logística - Registro de productos</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Registro de productos</h1>
    
    <?php if ($result->num_rows > 0): ?>
        <table border="1">
            <tr>
                <th>Nombre de producto</th>
                <th>Cantidad</th>
                <th>Ubicación</th>
                <th>Fecha de ingreso</th>
                <th>Fecha de salida</th>
                <th>N° de Seguimiento</th>
                <th>Acciones</th> <!-- Nueva columna para las acciones -->
            </tr>
            <?php
           
            // Recorrer los resultados y mostrar cada fila
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nombre_producto']) . "</td>";
                echo "<td>" . htmlspecialchars($row['cantidad']) . "</td>";
                echo "<td>" . htmlspecialchars($row['ubicacion']) . "</td>";
                echo "<td>" . htmlspecialchars($row['fecha_ingreso']) . "</td>";
                echo "<td>" . htmlspecialchars($row['fecha_salida']) . "</td>";
                echo "<td>" . htmlspecialchars($row['num_tracker']) . "</td>";
                
                // Asegúrate de que el parámetro sea 'idproducto'
                echo "<td><a href='editar.php?idproducto=" . htmlspecialchars($row['idproducto']) . "'>Editar</a></td>";
                echo "</tr>";
            }
                 
            ?>
        </table>
    <?php else: ?>
        <p>No se encontraron registros en la base de datos.</p>
    <?php endif; ?>

    <br>
    <a href="ingresar_producto.php">Volver a Ingresar Producto</a>
    
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();