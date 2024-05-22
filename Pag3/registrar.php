<?php

// Conexión a la base de datos
$db = new mysqli('localhost', 'root', '', 'gestorproyectos');

// Comprobar la conexión
if ($db->connect_error) {
    die('Error de conexión: ' . $db->connect_error);
}

// Recibir los datos del formulario
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$fechaInicio = $_POST['fechaInicio'];
$fechaFin = $_POST['fechaFin'];
$objetivoGeneral = $_POST['objetivoGeneral'];
$objetivosEspecificos = $_POST['objetivosEspecificos'];

// Consulta SQL para insertar datos en la base de datos
$sql = "INSERT INTO proyectos (nombre, descripcion, fecha_inicio, fecha_fin, objetivo_general, objetivos_especificos) VALUES ('$nombre', '$descripcion', '$fechaInicio', '$fechaFin', '$objetivoGeneral', '$objetivosEspecificos')";

// Ejecutar la consulta SQL
if ($db->query($sql) === TRUE) {
    echo "Proyecto registrado correctamente.";
} else {
    echo "Error al registrar el proyecto: " . $db->error;
}

// Cerrar la conexión a la base de datos
$db->close();

?>
