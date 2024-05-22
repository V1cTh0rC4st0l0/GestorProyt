<?php
// Creando una nueva conexión a la base de datos.
$conn = new mysqli("127.0.0.1", "root", "", "gestorproyectos");

// Comprobando si hay un error de conexión.
if ($conn->connect_error) {
    echo 'Error de conexion ' . $conn->connect_error;
    exit;
}

/*/ Establish database connection
$db = new mysqli('localhost', 'root', '', 'gestorproyectos');

// Function to return the connection object
function get_db_connection() {
  global $db; // Access the global $db variable
  return $db;
}*/