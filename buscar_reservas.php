<!DOCTYPE html>
<html>
<head>
    <title>Resultados de la Búsqueda</title>
    <style>
        @import url(' https://www.fontspace.com/speeding-brush-font-f25752');
        body {
           font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-image: url(img/zombie5.jpg);
    background-repeat: no-repeat;
background-size: cover;
background-attachment: fixed;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        table, th, td {
            border: 1.5px solid #ffffff9e;
        }
        th, td {
            padding: 10px;
            text-align: left;
            background:red;
        }
        th {
   color:#fff;
   background-color: rgba(10, 240, 240, 1.5);
        }
        h1 {
            text-align: center;
  -webkit-text-stroke: 1.5px white;
  color: #214602;
  font-size: 40px;
        }
        .no-results {
            text-align: center;
            margin-top: 20px;
            color: #FF0000;
        }
    </style>
</head>
<body>
    <h1>Resultados de la Búsqueda</h1>
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
    
    // Obtener el término de búsqueda del formulario
    $busqueda = $_POST['busqueda'];
    
    // Realizar la búsqueda en la base de datos
    $sql = "SELECT * FROM reserva WHERE email LIKE '%$busqueda%' OR telefono LIKE '%$busqueda%' OR fecha LIKE '%$busqueda%' OR sillas LIKE '%$busqueda'";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Mostrar los resultados en una tabla
        echo "<table border='1'>";
        echo "<tr><th>Email</th><th>Teléfono</th><th>Fecha</th><th>Número de Sillas</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['email'] . "</td><td>" . $row['telefono'] . "</td><td>" . $row['fecha'] . "</td><td>" . $row['sillas'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron resultados para: " . $busqueda;
    }
    
    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
    
</body>
</html>
