<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'hotel');

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recoger datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$celular = $_POST['celular'];

// Crear el usuario
$query = "INSERT INTO usuarios   (nombre, apellido, dni, celular) 
        VALUES ('$nombre', '$apellido', '$dni', '$celular')";
if ($conn->query($query) === TRUE) {
    echo "Usuario creado exitosamente.";
} else {
    echo "Error al crear el usuario: " . $conn->error;
}

$conn->close();
?>