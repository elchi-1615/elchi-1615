<?php
// Configuración de la base de datos
$servername = "localhost"; // Cambia esto a la dirección del servidor de tu base de datos
$username = "root"; // Cambia esto a tu nombre de usuario de la base de datos
$password = ""; // Cambia esto a tu contraseña de la base de datos
$database = "tu_base_de_datos"; // Cambia esto al nombre de tu base de datos

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Realizar consultas o manipular la base de datos aquí
// Por ejemplo, para seleccionar datos de una tabla:

$sql = "SELECT columna1, columna2 FROM tabla WHERE condición";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Procesar los resultados
    while($row = $result->fetch_assoc()) {
        // Hacer algo con los datos
        echo "Columna 1: " . $row["columna1"]. " - Columna 2: " . $row["columna2"]. "<br>";
    }
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión a la base de datos cuando hayas terminado
$conn->close();
?>
