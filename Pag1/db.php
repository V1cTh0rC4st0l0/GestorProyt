<?php

// Database connection details
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "gestorproyectos";

// Create a connection to the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check the connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Function to verify the connection
function verify_connection() {
    global $db; // Access the global $db variable

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
}

// Call the function to verify the connection
verify_connection();
