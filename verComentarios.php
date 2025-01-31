<?php
require_once 'config/Conexion.php';

$conexion = new Conexion();
$conn = $conexion->getConexion();

$stmt = $conn->prepare("SELECT usuario, comentario, fecha FROM comentarios ORDER BY fecha DESC");
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo '<div class="card mb-3">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . htmlspecialchars($row['usuario']) . '</h5>';
    echo '<p class="card-text">' . htmlspecialchars($row['comentario']) . '</p>';
    echo '<p class="card-text"><small class="text-muted">' . htmlspecialchars($row['fecha']) . '</small></p>';
    echo '</div>';
    echo '</div>';
}

$stmt->close();
$conn->close();
?>
