<!DOCTYPE html>
<html>
<head>
    <title>Editar Registro</title>
    </style>
    
    <script>
// Función para validar el formulario antes del envío
function validarFormulario() {
    var email = document.getElementById('email').value;
    var telefono = document.getElementById('telefono').value;
    var fecha = document.getElementById('fecha').value;
    var sillas = document.getElementById('sillas').value;

    if (email === '' || telefono === '' || fecha === '' || sillas === '') {
        alert('Por favor, complete todos los campos antes de enviar el formulario.');
        return false;
    }

    return true;
}

    </script>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $id = $_POST['id'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $fecha = $_POST['fecha'];
    $sillas = $_POST['sillas'];

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

    // Actualiza el registro en la base de datos
    $sql = "UPDATE reserva1 SET email = '$email', telefono = '$telefono', fecha = '$fecha', sillas = '$sillas' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<form method='post' action='guardar.php' onsubmit='return validarFormulario();'>";
        echo "Registro actualizado con éxito.";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }

    // Cierra la conexión a la base de datos
    $conn->close();
} else {
    echo "Acceso no válido.";
}
?>
