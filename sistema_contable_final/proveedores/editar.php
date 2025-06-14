<?php
require '../config/db.php';
include '../includes/header.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM proveedores WHERE id = ?");
$stmt->execute([$id]);
$proveedor = $stmt->fetch();

if (!$proveedor) {
    echo "<p>Proveedor no encontrado.</p>";
    include '../includes/footer.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];

    $stmt = $pdo->prepare("UPDATE proveedores SET nombre = ?, telefono = ?, email = ?, direccion = ? WHERE id = ?");
    $stmt->execute([$nombre, $telefono, $email, $direccion, $id]);

    header("Location: index.php");
    exit;
}
?>

<h2>Editar Proveedor</h2>
<form method="POST">
    <label>Nombre: <input type="text" name="nombre" value="<?= $proveedor['nombre'] ?>" required></label><br><br>
    <label>Teléfono: <input type="text" name="telefono" value="<?= $proveedor['telefono'] ?>" required></label><br><br>
    <label>Email: <input type="email" name="email" value="<?= $proveedor['email'] ?>" required></label><br><br>
    <label>Dirección: <input type="text" name="direccion" value="<?= $proveedor['direccion'] ?>" required></label><br><br>
    <button type="submit">Actualizar</button>
</form>

<?php include '../includes/footer.php'; ?>