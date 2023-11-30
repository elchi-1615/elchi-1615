<!DOCTYPE html>
<html>
<head>
    <title>Resultados de la Búsqueda</title>
    <style>
          @import url('https://fonts.googleapis.com/css2?family=Dancing+Script&family=Nosifer&display=swap');
         body {
            font-family: 'Nosifer', sans-serif;
            background-image: url(img/zombie5.jpg);
        }

        h1 {
            text-align: center;
            color: red;
            background-color: rgba(255, 255, 255, 0.7);
             border-radius:30px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #709389;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }
        .regresar {
            text-align: center;
            margin: 20px;
        }

        .regresar a {
            display: inline-block;
            padding: 10px 20px;
            background: radial-gradient(100% 100% at 100% 0, #353434 0, #d61818 100%);
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .regresar a:hover {
            background:green;
            box-shadow: rgba(45, 35, 66, .4) 0 4px 8px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset;
  transform: translateY(-2px);

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
    $sql = "SELECT * FROM reserva1 WHERE email LIKE '%$busqueda%' OR telefono LIKE '%$busqueda%' OR fecha LIKE '%$busqueda%' OR sillas LIKE '%$busqueda'";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Mostrar los resultados en una tabla
        echo "<table border='1'>";
        echo "<tr><th>Email</th><th>Teléfono</th><th>Fecha</th><th>Número de Sillas</th><th>Acciones</th></tr>";
       
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['telefono'] . "</td>";
            echo "<td>" . $row['fecha'] . "</td>";
            echo "<td>" . $row['sillas'] . "</td>";
            echo "<td><a href='editar.php?id=" . $row['id'] . "'>Editar</a></td>";
            // Agregar botones para eliminar
            echo "<td><a href='eliminar.php?id=" . $row['id'] . "'>Eliminar</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo '<div class="regresar"><a href="index4.html">Regresar</a></div>';
        
    } else {
        echo "No se encontraron resultados para: " . $busqueda;
    }
    
    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
    
</body>
</html>
