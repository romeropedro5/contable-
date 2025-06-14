<?php
session_start();
require '../config/db.php';
include '../includes/header.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.php");
    exit;
}

// Obtener los datos del usuario
$id = $_SESSION['usuario_id'];
$stmt = $pdo->prepare("SELECT nombre, email, rol FROM usuarios WHERE id = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch();

?>

<h2>Perfil del Usuario</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Nombre</th>
        <td><?= htmlspecialchars($usuario['nombre']) ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?= htmlspecialchars($usuario['email']) ?></td>
    </tr>
    <tr>
        <th>Rol</th>
        <td><?= htmlspecialchars($usuario['rol']) ?></td>
    </tr>
</table>

<br>
<a href="../dashboard.php">Volver al panel</a>

<?php include '../includes/footer.php'; ?>