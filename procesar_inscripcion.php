<?php 
// Conexión a la base de datos
include('conexion.php');

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    $direccion = mysqli_real_escape_string($conn, $_POST['direccion']);
    $curso_id = $_POST['curso'];

    // Insertar los datos del estudiante
    $query_estudiante = "INSERT INTO estudiantes (nombre, correo, direccion) VALUES ('$nombre', '$correo', '$direccion')";
    if (mysqli_query($conn, $query_estudiante)) {
        $estudiante_id = mysqli_insert_id($conn); // Obtener el ID del estudiante insertado

        // Insertar la inscripción
        $query_inscripcion = "INSERT INTO inscripciones (estudiante_id, curso_id) VALUES ('$estudiante_id', '$curso_id')";
        if (mysqli_query($conn, $query_inscripcion)) {
            echo "Inscripción realizada con éxito!";
            // Botón para regresar a la página de cursos disponibles
            echo '<br><br>';
            echo '<a href="http://localhost/APEB130/cusos_disponibles.html" style="text-decoration: none;">
                    <button style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
                        Regresar a Cursos Disponibles
                    </button>
                  </a>';
        } else {
            echo "Error al inscribir al estudiante: " . mysqli_error($conn);
        }
    } else {
        echo "Error al registrar el estudiante: " . mysqli_error($conn);
    }
}
?>


