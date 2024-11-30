<?php
require 'db.php';
include 'includes/header.php';

// Obtener el ID del usuario desde la URL
$id = $_GET['id'] ?? null;

if (!$id) {
    echo "<p class='alert alert-danger text-center'>ID no proporcionado. <a href='index.php'>Volver a la lista</a></p>";
    include 'includes/footer.php';
    exit;
}

// Consultar los datos del usuario
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if (!$user) {
    echo "<p class='alert alert-danger text-center'>Usuario no encontrado. <a href='index.php'>Volver a la lista</a></p>";
    include 'includes/footer.php';
    exit;
}
?>

<h1 class="text-center mb-4">Editar Usuario</h1>
<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">
    <div class="mb-3">
        <label for="name" class="form-label">Nombre:</label>
        <input type="text" name="name" id="name" value="<?= $user['name'] ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" id="email" value="<?= $user['email'] ?>" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
</form>

<?php include 'includes/footer.php'; ?>
