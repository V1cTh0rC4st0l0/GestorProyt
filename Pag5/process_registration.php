<?php
// Conexión a la base de datos
require '../Pag2/conexion.php';

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data (sanitize and validate as needed)
$nombre = $_POST['nombre'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$email = $_POST['email'];
$password = $_POST['password'];  // Note: password hashing is crucial for security

// Prepare SQL statement (using prepared statements for security)
$sql = "INSERT INTO usuarios (nombre, apellido_paterno, apellido_materno, email, password) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// **Crucial: Hash the password before storing in the database**
$hashed_password = password_hash($password, PASSWORD_DEFAULT);  // Use a strong hashing algorithm

// Bind parameters (prepared statements only)
$stmt->bind_param("sssss", $nombre, $apellido_paterno, $apellido_materno, $email, $hashed_password);

// Execute the prepared statement
if ($stmt->execute()) {
  echo "Registration successful!";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>
