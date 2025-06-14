<?php
$host = 'localhost';
$db = 'sistema_contable';
$user = 'root';
$pass = ''; // tu clave si tienes

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar: " . $e->getMessage());
}
?>