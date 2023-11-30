<!DOCTYPE html>
<html>
<head>
    <title>Editar Registro</title>
    <style>

  @import url('https://fonts.googleapis.com/css2?family=Dancing+Script&family=Nosifer&display=swap');

    body {
    
font-family: 'Nosifer', sans-serif;
        background-color: #f0f0f0;
        color:red;
    }

    h1 {
        text-align: center;
        color:green;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    form input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    form input[type="submit"] {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    form input[type="submit"]:hover {
        background-color: #555;
    }


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
    <h1>Editar Registro</h1>
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
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        // Obtener los datos del registro a editar
        $sql = "SELECT * FROM reserva1 WHERE id = $id";
        $result = $conn->query($sql);
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            
            // Aquí puedes mostrar un formulario prellenado con los datos del registro para permitir la edición
            echo "<form method='post' action='guardar.php' onsubmit='return validarFormulario();'>";
            
            echo "Email: <input type='text' name='email' value='" . $row['email'] . "'><br>";
            echo "Teléfono: <input type='text' name='telefono' value='" . $row['telefono'] . "'><br>";
            echo "Fecha: <input type='text' name='fecha' value='" . $row['fecha'] . "'><br>";
            echo "Número de Sillas: <input type='text' name='sillas' value='" . $row['sillas'] . "'><br>";
            echo "<input type='hidden' name='id' value='" . $id . "'>";
            echo "<input type='submit' value='Guardar Cambios'>";
            echo "</form>";
        } else {
            echo "Registro no encontrado.";
        }
    } else {
        echo "ID de registro no proporcionado.";
    }
    
    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
</body>
</html>
