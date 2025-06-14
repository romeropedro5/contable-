<?php
session_start();
require 'config/db.php';
include 'includes/header.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>

<div class="container">
    <h2>Panel de Control</h2>
    <p>Bienvenido, <?= htmlspecialchars($_SESSION['usuario_nombre']) ?>.</p>

    <div style="display: flex; flex-wrap: wrap; justify-content: space-around; margin-top: 2rem;">
        <div style="background: #e1eaff; padding: 20px; border-radius: 10px; width: 250px; margin: 10px;">
            <h3>Compras</h3>
            <p>Ver y registrar compras.</p>
            <a href="compras/index.php">Ir a Compras</a>
        </div>

        <div style="background: #e1eaff; padding: 20px; border-radius: 10px; width: 250px; margin: 10px;">
            <h3>Ventas</h3>
            <p>Control de ventas realizadas.</p>
            <a href="ventas/index.php">Ir a Ventas</a>
        </div>

        <div style="background: #e1eaff; padding: 20px; border-radius: 10px; width: 250px; margin: 10px;">
            <h3>Proveedores</h3>
            <p>Gestión de proveedores.</p>
            <a href="proveedores/index.php">Ir a Proveedores</a>
        </div>

        <div style="background: #e1eaff; padding: 20px; border-radius: 10px; width: 250px; margin: 10px;">
            <h3>Productos</h3>
            <p>Administrar productos disponibles.</p>
            <a href="productos/index.php">Ir a Productos</a>
        </div>

        <div style="background: #e1eaff; padding: 20px; border-radius: 10px; width: 250px; margin: 10px;">
            <h3>Perfil</h3>
            <p>Ver información del usuario.</p>
            <a href="usuarios/perfil.php">Ver Perfil</a>
        </div>

        <div style="background: #f8d7da; padding: 20px; border-radius: 10px; width: 250px; margin: 10px;">
            <h3>Salir</h3>
            <p>Cerrar sesión actual.</p>
            <a href="logout.php">Cerrar Sesión</a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

