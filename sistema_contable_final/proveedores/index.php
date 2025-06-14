<?php
require '../config/db.php';
include '../includes/header.php';

$stmt = $pdo->query("SELECT * FROM proveedores ORDER BY nombre ASC");
$proveedores = $stmt->fetchAll();
?>

<h2>Listado de Proveedores</h2>
<a href="agregar.php">Agregar nuevo proveedor</a>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Dirección</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($proveedores as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= $p['nombre'] ?></td>
            <td><?= $p['telefono'] ?></td>
            <td><?= $p['email'] ?></td>
            <td><?= $p['direccion'] ?></td>
            <td>
                <a href="editar.php?id=<?= $p['id'] ?>">Editar</a> |
                <a href="eliminar.php?id=<?= $p['id'] ?>" onclick="return confirm('¿Eliminar proveedor?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include '../includes/footer.php'; ?>
