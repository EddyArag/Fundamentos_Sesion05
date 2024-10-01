<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'hotel');

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recoger datos del formulario
$dni = $_POST['dni'];
$fecha_reserva = $_POST['fecha_reserva'];
$huespedes = $_POST['huespedes'];
$habitacion = $_POST['habitacion'];
$noches = $_POST['noches'];

// Verificar si el usuario ya está registrado
$query = "SELECT id FROM usuarios WHERE dni = '$dni'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Usuario ya existe, obtener su ID
    $row = $result->fetch_assoc();
    $id_usuario = $row['id'];

    // Crear la reserva
    $query = "INSERT INTO reservas (id_usuario, fecha_reserva, huespedes, habitacion, noches) 
            VALUES ('$id_usuario', '$fecha_reserva', '$huespedes', '$habitacion', '$noches')";
    
    if ($conn->query($query) === TRUE) {
        echo 'Reserva creada exitosamente.';
    } else {
        echo 'Error al crear la reserva: ' . $conn->error;
    }
} else {
    echo 'El usuario no está registrado. Redirija a crear un nuevo usuario.';
}

$conn->close();
?>
