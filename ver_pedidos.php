<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hamburguesas_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM pedidos ORDER BY fecha DESC";
$result = $conn->query($sql);

echo "<h1>Lista de Pedidos</h1>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Hamburguesa</th><th>Precio</th><th>Cantidad</th><th>Total</th><th>Fecha</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['nombre_hamburguesa'] . "</td>";
    echo "<td>$" . $row['precio'] . " UYU</td>";
    echo "<td>" . $row['cantidad'] . "</td>";
    echo "<td>$" . $row['total'] . " UYU</td>";
    echo "<td>" . $row['fecha'] . "</td>";
    echo "</tr>";
}

echo "</table>";

$conn->close();
?>

