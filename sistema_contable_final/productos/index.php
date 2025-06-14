<?php
require '../config/db.php';
include '../includes/header.php';

// Consultar productos
$stmt = $pdo->query("SELECT * FROM productos ORDER BY id DESC");
$productos = $stmt->fetchAll();
?>

<h2>Lista de Productos</h2>
<a href="agregar.php">Agregar nuevo producto</a>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?= $producto['id'] ?></td>
            <td><?= $producto['nombre'] ?></td>
            <td><?= $producto['descripcion'] ?></td>
            <td>
                <a href="editar.php?id=<?= $producto['id'] ?>">Editar</a> |
                <a href="eliminar.php?id=<?= $producto['id'] ?>" onclick="return confirm('¿Eliminar este producto?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include '../includes/footer.php'; ?>