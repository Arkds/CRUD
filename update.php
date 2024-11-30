<?php
require 'db.php';

// Verificar si los datos están disponibles
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Validar los datos
    if (!$id || !$name || !$email) {
        echo "<p class='alert alert-danger text-center'>Todos los campos son obligatorios. <a href='edit.php?id=$id'>Volver</a></p>";
        exit;
    }

    // Actualizar en la base de datos
    $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
    $stmt->execute([$name, $email, $id]);

    // Redirigir a la lista
    header("Location: index.php");
    exit;
} else {
    echo "<p class='alert alert-danger text-center'>Método no permitido. <a href='index.php'>Volver a la lista</a></p>";
}
?>
