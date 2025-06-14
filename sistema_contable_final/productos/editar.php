<?php
require '../config/db.php';
include '../includes/header.php';

// Obtener ID del producto
$id = isset($_GET['id']) ? $_GET['id'] : null;
if (!$id) {
    echo "<p>ID de producto no válido.</p>";
    exit;
}

// Obtener datos actuales del producto
$stmt = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
$stmt->execute([$id]);
$producto = $stmt->fetch();

if (!$producto) {
    echo "<p>Producto no encontrado.</p>";
    exit;
}

// Si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $stmt = $pdo->prepare("UPDATE productos SET nombre = ?, descripcion = ? WHERE id = ?");
    $stmt->execute([$nombre, $descripcion, $id]);

    header("Location: index.php");
    exit;
}
?>

<h2>Editar Producto</h2>
<form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required><br><br>

    <label>Descripción:</label>
    <textarea name="descripcion" rows="4" cols="40"><?= htmlspecialchars($producto['descripcion']) ?></textarea><br><br>

    <button type="submit">Actualizar Producto</button>
</form>

<?php include '../includes/footer.php'; ?>