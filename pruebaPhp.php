<?php

// Configuración de la base de datos
$nombre_del_servidor = "nombre_del_servidor";
$nombre_de_usuario = "nombre_de_usuario";
$contraseña = "contraseña";
$nombre_de_la_base_de_datos = "nombre_de_la_base_de_datos";

// Crear la conexión a la base de datos
$conn = new mysqli($nombre_del_servidor, $nombre_de_usuario, $contraseña, $nombre_de_la_base_de_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];

    $sql = "INSERT INTO Datos_personales (Nombre, Apellidos, Dirección, Teléfono) VALUES ('$nombre', '$apellidos', '$direccion', '$telefono')";
  
}

$sql = "SELECT * FROM Datos_personales";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Dirección</th><th>Teléfono</th></tr>";

    foreach ($result as $row) {
        echo "<tr><td>" . $row["Id"] . "</td><td>" . $row["Nombre"] . "</td><td>" . $row["Apellidos"] . "</td><td>" . $row["Dirección"] . "</td><td>" . $row["Teléfono"] . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "No se encontraron registros.";
}

$sql = "SELECT Nombre, Teléfono FROM Datos_personales WHERE Id = 2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Nombre</th><th>Teléfono</th></tr>";

    foreach ($result as $row) {
        echo "<tr><td>" . $row["Nombre"] . "</td><td>" . $row["Teléfono"] . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "No se encontraron datos para la segunda inserción.";
}


// Cerrar la conexión a la base de datos
$conn->close();
?>
