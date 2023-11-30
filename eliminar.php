<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "owo";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Realiza la eliminación en la base de datos
    $sql = "DELETE FROM reserva1 WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado con éxito.";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }

    $conn->close();
}
?>
