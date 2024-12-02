<?php
// Conexión a la base de datos
include('conexion.php');

// Consulta para obtener los datos de los inscritos
$query = "SELECT 
            estudiantes.id AS estudiante_id,
            estudiantes.nombre,
            estudiantes.correo,
            estudiantes.direccion,
            cursos.nombre AS nombre_curso 
          FROM inscripciones
          INNER JOIN estudiantes ON inscripciones.estudiante_id = estudiantes.id
          INNER JOIN cursos ON inscripciones.curso_id = cursos.id";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Inscritos</title>
    <link rel="stylesheet" href="CSS/estilos.css">
</head>
<body>
    <header>
        <h1>Sistema de Inscripciones</h1>
    </header>
    <main id="consulta-inscritos">
        <h2>Lista de Inscritos</h2>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Dirección</th>
                        <th>Curso Inscrito</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['estudiante_id']); ?></td>
                            <td><?= htmlspecialchars($row['nombre']); ?></td>
                            <td><?= htmlspecialchars($row['correo']); ?></td>
                            <td><?= htmlspecialchars($row['direccion']); ?></td>
                            <td><?= htmlspecialchars($row['nombre_curso']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay estudiantes inscritos.</p>
        <?php endif; ?>

        <!-- Botón para regresar -->
        <a href="http://localhost/APEB130/cusos_disponibles.html" class="boton-regresar">Regresar a Cursos Disponibles</a>
    </main>
    <footer>
        <p>&copy; 2024 Sistema de Inscripciones</p>
    </footer>
</body>
</html>
