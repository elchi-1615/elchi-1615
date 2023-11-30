<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "owo";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$id= $_POST['id'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$fecha = $_POST['fecha'];
$sillas = $_POST['sillas'];

// Insertar datos en la base de datos
$sql = "INSERT INTO reserva1 (id,email, telefono, fecha, sillas) VALUES ('$id','$email', '$telefono', '$fecha', $sillas)";

if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Reserva exitosa. Gracias por tu reserva.");</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
