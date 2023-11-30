<?php
// Configuración de la base de datos
$servername = "localhost"; // Cambia esto a la dirección del servidor de tu base de datos
$username = "root"; // Cambia esto a tu nombre de usuario de la base de datos
$password = ""; // Cambia esto a tu contraseña de la base de datos
$database = "owo"; // Cambia esto al nombre de tu base de datos

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Inicializa una respuesta como un array
$response = array();

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["fullname"];
    $email = $_POST["email"];
    $contrasena = $_POST["password"];
    $confirmacion = $_POST["confirmpassword"];
    
    // Aquí puedes realizar validaciones y comprobar que los datos sean correctos antes de insertar en la base de datos
    
    // Insertar datos en la base de datos
    $sql = "INSERT INTO persona (nombre, email, contrasena) VALUES ('$nombre', '$email', '$contrasena')";
    
    if ($conn->query($sql) === TRUE) {
        // Registro exitoso
        $response["success"] = true;
        $response["message"] = "Registro exitoso. ¡Gracias por registrarte!";
    } else {
        // Error en el registro
        $response["success"] = false;
        $response["message"] = "Error al registrar: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos cuando hayas terminado
$conn->close();

// Enviar la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
