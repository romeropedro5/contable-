<?php
require '../config/db.php';
include '../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $stmt = $pdo->prepare("INSERT INTO productos (nombre, descripcion) VALUES (?, ?)");
    $stmt->execute([$nombre, $descripcion]);

    header("Location: index.php");
    exit;
}
?>

<h2>Agregar Nuevo Producto</h2>
<form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" required><br><br>

    <label>Descripción:</label>
    <textarea name="descripcion" rows="4" cols="40"></textarea><br><br>

    <button type="submit">Guardar Producto</button>
</form>

<?php include '../includes/footer.php'; ?>