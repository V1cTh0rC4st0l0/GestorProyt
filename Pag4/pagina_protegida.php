<?php
// Conexión a la base de datos
$db = new mysqli('localhost', 'root', '', 'gestorproyectos');
// Verificar si el usuario está loggeado
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

// Obtener el ID del usuario loggeado
$usuario = $_SESSION['usuario'];

// Consultar la base de datos para obtener la información a la que tiene permiso el usuario
$consulta = "SELECT * FROM proyectos WHERE miembros = '$usuario'";
$resultado = $db->query($consulta);

if ($resultado->num_rows > 0) {
    // Crear enlace a la página de información del usuario
    while ($fila = $resultado->fetch_assoc()) {
        $id = $fila['id'];
        $nombre = $fila['nombre'];
        $email = $fila['email'];

        $url = "informacion_usuario.html?id=$id&nombre=$nombre&email=$email";
        echo '<a href="' . $url . '">Ver información del usuario</a><br>';
    }
} else {
    echo 'No hay información disponible para este usuario';
}

?>
