<?php
// Conexión a la base de datos
include('conexion.php');

// Consulta para obtener los cursos disponibles
$query = "SELECT * FROM cursos";
$result = mysqli_query($conn, $query);

// Comprobar si la consulta tuvo éxito
if (!$result) {
    die('Error en la consulta: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inscripción</title>
    <link rel="stylesheet" href="CSS/estilos.css"> <!-- Tu archivo CSS -->
</head>
<body>
    <div class="container">
        <h2>Formulario de Inscripción</h2>
        <form action="procesar_inscripcion.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" required><br><br>

            <label for="direccion">Dirección:</label>
            <textarea id="direccion" name="direccion" required></textarea><br><br>

            <label for="curso">Selecciona un curso:</label>
            <select id="curso" name="curso" required>
                <option value="">-- Selecciona un curso --</option>
                <?php
                // Mostrar los cursos en el menú desplegable
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                }
                ?>
            </select><br><br>

            <input type="submit" value="Inscribirse">
            
        </form>
       
        
    </div>
</body>
</html>
