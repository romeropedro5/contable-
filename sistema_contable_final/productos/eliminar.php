<?php
require '../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar el producto de la base de datos
    $stmt = $pdo->prepare("DELETE FROM productos WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;