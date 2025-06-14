<?php
require '../config/db.php';
include '../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];

    $stmt = $pdo->prepare("INSERT INTO proveedores (nombre, telefono, email, direccion) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nombre, $telefono, $email, $direccion]);

    header("Location: index.php");
    exit;
}
?>

<h2>Agregar Proveedor</h2>
<form method="POST">
    <label>Nombre: <input type="text" name="nombre" required></label><br><br>
    <label>Teléfono: <input type="text" name="telefono" required></label><br><br>
    <label>Email: <input type="email" name="email" required></label><br><br>
    <label>Dirección: <input type="text" name="direccion" required></label><br><br>
    <button type="submit">Guardar</button>
</form>

<?php include '../includes/footer.php'; ?>