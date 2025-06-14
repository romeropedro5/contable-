<?php
session_start();

if (isset($_SESSION['usuario_id'])) {
    header("Location: dashboard.php");
    exit;
}
?>

<?php include 'includes/header.php'; ?>

<div class="container">
    <h2>Bienvenido al Sistema Contable</h2>
    <p>Gestiona compras, ventas, proveedores y usuarios de forma eficiente.</p>

    <div style="margin-top: 2rem;">
        <a href="login.php">
            <button style="padding: 10px 20px; margin-right: 10px;">Iniciar Sesión</button>
        </a>
        <a href="register.php">
            <button style="padding: 10px 20px;">Registrarse</button>
        </a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>