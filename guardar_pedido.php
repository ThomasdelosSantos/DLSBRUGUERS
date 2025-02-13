<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hamburguesas_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);

foreach ($data as $item) {
    $nombre = $item['nombre'];
    $precio = $item['precio'];
    $cantidad = $item['cantidad'];
    $total = $precio * $cantidad;

    $sql = "INSERT INTO pedidos (nombre_hamburguesa, precio, cantidad, total) VALUES ('$nombre', '$precio', '$cantidad', '$total')";

    if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

echo "Pedido guardado con éxito";

$conn->close();
?>

