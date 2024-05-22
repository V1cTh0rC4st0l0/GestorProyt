<?php
require_once 'db.php'; // Include the db.php file for the connection

// Validate user credentials
if (isset($_POST['usuario']) && isset($_POST['contraseña'])) {
    $usuario = $_POST['usuario'];
    $contraseñaIngresada = $_POST['contraseña'];

    // Retrieve the hashed password from the database
    $consulta = "SELECT password FROM usuarios WHERE email = '$usuario'";
    $resultado = $db->query($consulta);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $contraseñaHash = $fila['password'];

        // Verify the entered password against the hashed password
        if (password_verify($contraseñaIngresada, $contraseñaHash)) {
            // Start session
            session_start();
            $_SESSION['usuario'] = $usuario;

            // Redirect to the protected page
            header('Location: pagina_protegida.php');
            exit;
        } else {
            echo 'Contraseña incorrecta';
        }
    } else {
        echo 'Usuario o correo electrónico incorrecto';
    }
}

?>
