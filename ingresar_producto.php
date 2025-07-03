<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Logistica - Ingresar producto</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Ingresar producto</h1>
    <form method="POST" action="procesar_ingreso.php">

        <label>Nombre de producto:</label>
        <input type="text" name="producto"><br>

        <label>Cantidad:</label>
        <input type="number" name="cantidad" min="1"><br>

        Ubicacion:<br>
        <select name="Ubicacion">
        <option value="" disabled selected>Seleccione una ubicación</option>
        <option value="Bodega 1">Zona de Carga</option>
        <option value="Bodega 2">Recepcion y Control </option>
        <option value="Bodega 3">Almacenaje 1</option>
        <option value="Bodega 4">Almacenaje 2</option>
        <option value="Bodega 5">Preparacion</option>
        <option value="Bodega 6">Despacho</option>
        </select><br>

        <label>Fecha de ingreso:</label>
        <input type="date" name="fecha"><br>

        <label>Fecha de despacho:</label>
        <input type="date" name="salida"><br>

        <label>N° de Seguimiento :</label>
        <input type="num_tracker" name="num_tracker">
        <br><br>

        <input type="submit" name="ingresar" value="Ingresar producto">

    </form>
</body>
</html>


<?php
require "conexion.php";

   // Procesar el formulario
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar la información ingresada
   
    // Si la información es válida, redirigir al usuario a la siguiente página
    header("Location: ver_registro.php");
    exit;
}
?>
