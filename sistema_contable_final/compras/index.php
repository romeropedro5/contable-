<?php
require '../config/db.php';
include '../includes/header.php';

$stmt = $pdo->query("SELECT c.id, p.nombre AS producto, c.cantidad, c.precio, c.fecha 
                     FROM compras c 
                     JOIN productos p ON c.producto_id = p.id 
                     ORDER BY c.fecha DESC");
$compras = $stmt->fetchAll();
?>

<h2>Compras Registradas</h2>
<a href="agregar.php">Registrar nueva compra</a>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Fecha</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($compras as $compra): ?>
        <tr>
            <td><?= $compra['id'] ?></td>
            <td><?= $compra['producto'] ?></td>
            <td><?= $compra['cantidad'] ?></td>
            <td>$<?= number_format($compra['precio'], 2) ?></td>
            <td><?= $compra['fecha'] ?></td>
            <td>
                <a href="eliminar.php?id=<?= $compra['id'] ?>" onclick="return confirm('¿Eliminar esta compra?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include '../includes/footer.php'; ?>