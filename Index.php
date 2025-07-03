<!-- Index.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Logistica</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <h1>Bienvenido a ABC Logistica</h1>

    <br>
    
    <h2> Portal Registro ABC</h2>
    <form action="register.php" method="post">

        <label for="nombre">Usuario:</label>
        <input type="text" name="usuario" placeholder="nombre de usuario"><br>
        <br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contrasena"><br>
        <br>

        <!-- Botón para registrar -->
        <input type="submit" name="enviar" value="REGISTRAR">

        <!-- Botón para borrar el formulario -->
        <input type="reset" value="BORRAR">

    </form>

</body>
</html>
