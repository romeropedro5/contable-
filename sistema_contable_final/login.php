<?php
session_start();
require 'config/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $clave = $_POST['clave'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($clave, $usuario['clave'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nombre'] = $usuario['nombre'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = 'Correo o contraseña incorrectos';
    }
}
?>

<?php include 'includes/header.php'; ?>

<h2>Iniciar Sesión</h2>
<form method="POST">
    <?php if ($error): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <label>Email:</label>
    <input type="email" name="email" required><br><br>

    <label>Contraseña:</label>
    <input type="password" name="clave" required><br><br>

    <button type="submit">Ingresar</button>
</form>

<p>¿No tienes cuenta? <a href="register.php">Regístrate aquí</a></p>

<?php include 'includes/footer.php'; ?>