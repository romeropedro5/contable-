<?php
require 'config/db.php';

$mensaje = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);
    $rol = 'usuario'; // Por defecto

    // Verificar si el email ya existe
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        $error = 'El correo ya está registrado.';
    } else {
        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, clave, rol) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nombre, $email, $clave, $rol]);
        $mensaje = 'Usuario registrado correctamente. Ahora puedes <a href="login.php">iniciar sesión</a>.';
    }
}
?>

<?php include 'includes/header.php'; ?>

<h2>Registro de Usuario</h2>
<form method="POST">
    <?php if ($mensaje): ?>
        <p style="color: green;"><?= $mensaje ?></p>
    <?php elseif ($error): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>

    <label>Nombre:</label>
    <input type="text" name="nombre" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" required><br><br>

    <label>Contraseña:</label>
    <input type="password" name="clave" required><br><br>

    <button type="submit">Registrarse</button>
</form>

<p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>

<?php include 'includes/footer.php'; ?>